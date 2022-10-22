<?php

namespace App\Http\Controllers;

use App\Models\AnakPosyandu;
use Illuminate\Http\Request;

class AnakPosyanduController extends Controller
{
    const DATA_INPUT = [
        'berat_kini',
        'lingkar_kepala_kini',
        'tgl_posyandu',
        'riwayat_vitamin',
        'riwayat_imunisasi',
        'tinggi_kini',
        'anak_id'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->only(self::DATA_INPUT);
        $data['anak_id'] = $id;
        AnakPosyandu::create($data);
        return redirect('/data-anak')->with('success', 'Berhasil Tambah Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnakPosyandu  $anakPosyandu
     * @return \Illuminate\Http\Response
     */
    public function show(AnakPosyandu $anakPosyandu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnakPosyandu  $anakPosyandu
     * @return \Illuminate\Http\Response
     */
    public function edit(AnakPosyandu $anakPosyandu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnakPosyandu  $anakPosyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnakPosyandu $anakPosyandu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnakPosyandu  $anakPosyandu
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnakPosyandu $anakPosyandu)
    {
        //
    }
}