<?php

namespace App\Http\Controllers;

use App\Models\PersertadidikM;
use Illuminate\Http\Request;
use PDF;

class PersertadidikR extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$persertaM = PersertadidikM::all();
        $persertaM = PersertadidikM::search(request('search'))->paginate(10);
        $vcari = request('search');
        return view('pesertadidik', compact('persertaM', 'vcari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesertadidik_create');
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
            "nis" => 'required',
            "nama_lengkap" => 'required',
            "jk" => 'required',
            "nilai" => 'required',
        ]);

        PersertadidikM::create($request->post());
        return redirect()->route('pesertadidik.index')-> with('success', 'data berhasil di masukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peserta = PersertadidikM::find($id);
        return view('pesertadidik_edit', compact('peserta'));
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
            "nis" => 'required',
            "nama_lengkap" => 'required',
            "jk" => 'required',
            "nilai" => 'required',
        ]);
        $data = request()->except(['_token', '_method', 'submit']);

        PersertadidikM::where('id',$id)->update($data);
        return redirect()->route('pesertadidik.index')-> with('success', 'peserta didik berhasil di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PersertadidikM::where('id',$id)->delete();
        return redirect()->route('pesertadidik.index')-> with('success', 'peserta didik berhasil di hapus');
    }
    // public function pdf(){
    //     $pesertaM = PersertadidikM::all();
    //     //return view('pesertadidik_pdf', compact('pesertaM'));
    //      $pdf = PDF::loadview('pesertadidik_pdf', ['pesertaM' => $pesertaM]);
    //      return $pdf->stream('pesertadidik.pdf');
    // }

}

