<?php

namespace App\Http\Controllers;

use App\Models\GuruM;
use Illuminate\Http\Request;

class GuruR extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GuruM = GuruM::all();
        return view('guru', compact('GuruM'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "NIP" => 'required',
            "namaguru" => 'required',
            "mapel" => 'required',
        ]);

        GuruM::create($request->post());
        return redirect()->route('guru.index')-> with('success', 'data berhasil di masukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = GuruM::find($id);
        return view('guru_edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "NIP" => 'required',
            "namaguru" => 'required',
            "mapel" => 'required',
        ]);
        $data = request()->except(['_token', '_method', 'submit']);

        GuruM::where('id',$id)->update($data);
        return redirect()->route('guru.index')-> with('success', 'peserta didik berhasil di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GuruM::where('id',$id)->delete();
        return redirect()->route('guru.index')-> with('success', 'guru berhasil di hapus');
    }
}
