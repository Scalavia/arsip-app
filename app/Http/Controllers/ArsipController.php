<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'arsip.index',
            ['arsips' => Arsip::paginate(10)]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arsip.create');
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
            'nomor_surat' => 'required|numeric',
            'kategori' => 'required',
            'judul' => 'required',
            'file_arsip' => 'required|mimes:pdf'
        ]);

        $file_arsip = $request->file('file_arsip');
        $file_arsip->move('public/arsip', $file_arsip->getClientOriginalName());

        $arsip = new Arsip();
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori = $request->kategori;
        $arsip->judul = $request->judul;
        $arsip->nama_file = $file_arsip->getClientOriginalName();
        $arsip->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function show(Arsip $arsip)
    {
        return view('arsip.show', ['arsip' => $arsip]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function edit(Arsip $arsip)
    {
        return view('view.edit', ['arsip' => $arsip]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arsip $arsip)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
        ]);

        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori = $request->kategori;
        $arsip->judul = $request->judul;

        if (!empty($request->file('file_arsip'))) {
            $request->validate(['file_arsip' => 'required|mimes:pdf']);
            $file_arsip = $request->file('file_arsip');
            $file_arsip->move('public/arsip', $file_arsip->getClientOriginalName());

            $arsip->nama_file = $file_arsip->getClientOriginalName();
        }
        $arsip->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arsip $arsip)
    {
        $arsip->delete();

        return redirect()->back();
    }
}
