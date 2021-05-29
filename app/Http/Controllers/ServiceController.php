<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function data() 
    {
        $service = DB::table('service')->get();

        // return $layanan;
        return view('service.data', ['service' => $service]);
        // return view('service.data', compact('service'));
    }

    public function add()
    {
        return view('service.add');
    }

    public function addProcess(Request $request) 
    {
        DB::table('service')->insert([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect('service')->with('status', 'Data berhasil ditambahkan!');
    }
}
