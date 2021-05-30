<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
{
    public function data() 
    {
        $product = DB::table('product')->get();

        return view('product.data', ['product' => $product]);
    }

    public function add()
    {
        return view('product.add');
    }

    public function addProcess(StoreProduct $request) 
    {
        // $validated = $request->validate();

        DB::table('product')->insert([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect('product')->with('status', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        return view('product/edit', compact('product'));
    }

    public function editProcess(StoreProduct $request, $id) 
    {
        // $validated = $request->validate();
        
        DB::table('product')->where('id', $id)
            ->update([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        return redirect('product')->with('status', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('product')->where('id', $id)->delete();
        return redirect('product')->with('status', 'Data berhasil dihapus!');
    }
}
