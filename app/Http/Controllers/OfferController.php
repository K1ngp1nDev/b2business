<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use App\Models\Offer\Handlers\CategoryHandler;
use App\Models\Chat\Chat;
use App\Models\Chat\Message;
use App\Models\Offer\Handlers\PriceMaxHandler;
use App\Models\Offer\Handlers\PriceMinHandler;
use App\Models\Offer\Handlers\RegionHandler;
use App\Models\Offer\Handlers\SearchHandler;
use App\Models\Offer\Handlers\SubcategoryHandler;
use App\Models\Offer\Offer;
use App\Models\Region\Region;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    protected $offerFilterHandlers = [
        SearchHandler::class,
        CategoryHandler::class,
        SubcategoryHandler::class,
        RegionHandler::class,
        PriceMinHandler::class,
        PriceMaxHandler::class
    ];

    public function index(Request $request, Pipeline $pipeline)
    {
        $offers = Offer::with('category');

        $pipeline->send(compact(['offers', 'request']))
            ->through($this->offerFilterHandlers)
            ->then(function ($offers) {
                return $offers['offers'];
            });

        $offers = $offers->paginate();

        $categories = Category::all();
        return view('offers.index', [
            'categories' => $categories,
            'offers' => $offers
        ]);
    }

    public function search(Request $request)
    {
//        dd($request);
    }

    public function add()
    {
        $categories = Category::all();
        $regions = Region::all();
        return view('offers.add', [
            'categories' => $categories,
            'regions' => $regions
        ]);
    }

    public function edit(Request $request)
    {
        $offer = Offer::find($request->id);
        $categories = Category::all();
        $regions = Region::all();
        $photos = $this->photos($offer);
        return view('offers.edit', [
            'offer' => $offer,
            'categories' => $categories,
            'regions' => $regions,
            'photos' => $photos
        ]);
    }

    public function store(Request $request)
    {
        $images = [];
        $main_image = null;
        if ($request->has('images')) {
            foreach ($request->images as $key => $image) {
                if ($key == 0) {
                    $main_image = '/storage/images/' . $image;
                }
                array_push($images, '/storage/images/' . $image);
            }
        }

        $offer = Offer::updateOrCreate([
            'id' => $request->id
            ],
            [
            'name' => $request->name,
            'creator_id' => auth()->user()->id,
            'company_id' => auth()->user()->company_id,
            'price' => $request->price,
            'count' => $request->count,
            'main_photo' => $main_image,
            'photos' => $images,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'text' => $request->text,
        ]);
        $offer->regions()->attach(1, array('offer_id' => $offer->id, 'region_id' => $request->region_id));
        $offer->save();
        return redirect()->route('offer.published', [
            'id' => $offer->id
        ]);
    }

    public function show(Request $request)
    {
        $offer = Offer::find($request->id);
        $offers = 1;    //$offer->companies->offers;
        $photos = $this->photos($offer);
        return view('offers.show', [
            'offer' => $offer,
            'photos' => $photos,
            'offers' => $offers
        ]);
    }


    public function published(Request $request)
    {
        $offer = Offer::find($request->id);
        return view('offers.published', [
            'offer' => $offer
        ]);
    }

    public function order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'max:2048'
        ]);

        if ($validator->fails()) {
            return redirect('/offer/' . $request->id);
        }

        $user = auth()->user();
        $offer = Offer::find($request->id);
        $chat = Chat::where('offer_id', $request->id)->where('customer_id', $user->company_id)->first();

        if (empty($chat)) {

            $chat = Chat::create([
                'offer_id' => $request->id,
                'seller_id' => $offer->company_id,
                'customer_id' => $user->company_id
            ]);

            $chat->user()->attach(1, array('chat_id' => $chat->id, 'user_id' => auth()->user()->id));

            $message = Message::create([
                'is_read' => false,
                'text' => $request->text,
                'chat_id' => $chat->id,
                'user_id' => $user->id
            ]);
            $message->save();
        }
        return redirect()->route('chat.index', [
            'id' => $chat->id
        ]);
    }

    protected function photos($offer)
    {
        $photos = [];
        if (isset($offer->photos)) {
            foreach ($offer->photos as $photo) {
                array_push($photos, $photo);
            }
        }
        return $photos;
    }

    public function subcategories(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::find($request->id)->subcategories()->get();
            $view = view('offers.subcategories', compact('categories'))->render();
//            dd($view);
        }
        return response()->json([
            'html' => $view
        ]);
    }
}
