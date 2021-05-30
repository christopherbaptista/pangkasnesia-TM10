<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMember;

class memberController extends Controller
{
    public function data() 
    {
        $member = DB::table('member')->get();

        return view('member.data', ['member' => $member]);
    }

    public function add()
    {
        return view('member.add');
    }

    public function addProcess(StoreMember $request) 
    {
        // $validatedData = $request->validate();

        DB::table('member')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'nohp' => $request->nohp,
        ]);
        return redirect('member')->with('status', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $member = DB::table('member')->where('id', $id)->first();
        return view('member/edit', compact('member'));
    }

    public function editProcess(StoreMember $request, $id) 
    {
        // $validatedData = $request->validate();
        
        DB::table('member')->where('id', $id)
            ->update([
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'nohp' => $request->nohp,
            ]);
        return redirect('member')->with('status', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('member')->where('id', $id)->delete();
        return redirect('member')->with('status', 'Data berhasil dihapus!');
    }
}
