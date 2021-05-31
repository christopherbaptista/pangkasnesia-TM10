<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreService;
use App\Models\Service;

class ServiceController extends Controller
{
    public function data() 
    {
        $service = DB::table('service')->get();

        return view('service.data', ['service' => $service]);
    }

    public function add()
    {
        return view('service.add');
    }

    public function addProcess(StoreService $request) 
    {
        // $validatedData = $request->validate();

        DB::table('service')->insert([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect('service')->with('status', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $service = DB::table('service')->where('id', $id)->first();
        return view('service/edit', compact('service'));
    }

    public function editProcess(StoreService $request, $id) 
    {
        // $validatedData = $request->validate();
        
        DB::table('service')->where('id', $id)
            ->update([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        return redirect('service')->with('status', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('service')->where('id', $id)->delete();
        return redirect('service')->with('status', 'Data berhasil dihapus!');
    }
}
