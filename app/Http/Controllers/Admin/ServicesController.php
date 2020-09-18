<?php


namespace App\Http\Controllers\Admin;


use App\Models\Service\Service;

class ServicesController
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', [
            'services' => $services
        ]);
    }

    public function add()
    {
        return view('admin.services.new');
    }

    public function store()
    {
        return redirect()->route('admin.services');
    }
}
