<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePartner;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function data() 
    {
        $partner = DB::table('partner')->get();

        return view('partner.data', ['partner' => $partner]);
    }

    public function add()
    {
        return view('partner.add');
    }

    public function addProcess(StorePartner $request) 
    {
        // $validatedData = $request->validate();

        DB::table('partner')->insert([
            'name' => $request->name,
            'category' => $request->category,
            'address' => $request->address,
            'email' => $request->email,
            'nohp' => $request->nohp,
        ]);
        return redirect('partner')->with('status', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $partner = DB::table('partner')->where('id', $id)->first();
        return view('partner/edit', compact('partner'));
    }

    public function editProcess(StorePartner $request, $id) 
    {
        // $validatedData = $request->validate();
        
        DB::table('partner')->where('id', $id)
            ->update([
                'name' => $request->name,
                'category' => $request->category,
                'address' => $request->address,
                'email' => $request->email,
                'nohp' => $request->nohp,
            ]);
        return redirect('partner')->with('status', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('partner')->where('id', $id)->delete();
        return redirect('partner')->with('status', 'Data berhasil dihapus!');
    }
}
