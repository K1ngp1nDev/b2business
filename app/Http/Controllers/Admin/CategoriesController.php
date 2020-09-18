<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(Request $request)
    {
        $category = Category::find($request->id);

        if (empty($category)) return abort(404);

        $subcategories = $category->subcategories;
        $categories = Category::where('parent_id', '!=', $category->id)->get();
        return view('admin.categories.show', [
            'category' => $category,
            'subcategories' => $subcategories,
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $parent_id = $request->id;
        $categories = Category::all();
        return view('admin.categories.create', [
            'categories' => $categories,
            'parent_id' => $parent_id
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'unique:categories'
        ]);

        if ($validator->fails()) {
            return redirect('admin/categories/add')
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();

        $category->name = $request->name;
        $category->parent_id = 1;

        $category->save();

        if ($request->parent_id == 0) {
            $category->parent_id = $category->id;
        }
        else {
            $category->parent_id = $request->parent_id;
        }

        $category->update();

        return redirect()->route('admin.categories');
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;

        if ($request->parent_id == 0) {
            $category->parent_id = $category->id;
        }
        else {
            $category->parent_id = $request->parent_id;
        }

        $category->update();

        return redirect()->route('admin.categories.show', [
            'id' => $request->id
        ]);
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('admin.categories');
    }
}
