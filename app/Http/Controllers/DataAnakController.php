<?php

namespace App\Http\Controllers;

use App\Models\AnakPosyandu;
use App\Models\DataAnak;
use App\Models\DataVisitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;

class DataAnakController extends Controller
{
    const DATA_INPUT = [
        'no_aktaLahir',
        'anak_lingkar_kepala',
        'anak_berat_lahir',
        'anak_tgl_lahir',
        'anak_tinggi_lahir',
        'anak_nama',
        'visitor_id'
    ];

    const DATA_KUNJUNGAN = [
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
        $data = DataAnak::with('visitor')->get();
        $visitor = DataVisitor::all();

        return view('DataAnak.index', compact('data', 'visitor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visitor = DataVisitor::all();
        // $posyandu = Posyandu::all();
        return view('DataAnak.action', compact('visitor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(self::DATA_INPUT);
        $data['visitor_id'] = 1;
        DataAnak::create($data);
        return redirect('/data-anak')->with('success', 'Berhasil Tambah Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataAnak  $dataAnak
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = AnakPosyandu::with('anak')->where('anak_id', $id)->get();
        // $nama = AnakPosyandu::with('anak')->where('anak_id', $id)->first();
        // $namaAnak = $nama->anak->nama_anak;
        return view('DataAnak.action', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataAnak  $dataAnak
     * @return \Illuminate\Http\Response
     */
    public function edit(DataAnak $dataAnak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAnak  $dataAnak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataAnak $dataAnak)
    {
        $data = $request->only(self::DATA_INPUT);
        $dataAnak->update($data);
        return redirect('/data-anak')->with('success', 'Berhasil Ubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAnak  $dataAnak
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataAnak $dataAnak)
    {
        $dataAnak->delete();
        return redirect('/data-anak')->with('success', 'Berhasil Hapus Data!');
    }

    public function addKunjungan(Request $request)
    {
        $data = $request->only(self::DATA_KUNJUNGAN);
        $data['anak_id'] = 1;
        $data['tgl_posyandu'] = Carbon::now()->format('Y-m-d');
        AnakPosyandu::create($data);

        return back()->with('success', 'Berhasil Tambah Data!');
    }

    public function showKunjungan(AnakPosyandu $data)
    {
        return Response::json($data);
    }

    public function upKunjungan(Request $request, $id)
    {
        $data = $request->only(self::DATA_KUNJUNGAN);
        $dataAnak = AnakPosyandu::where('id', $id)->first();
        $dataAnak->update($data);
        return back()->with('success', 'Berhasil Ubah Data!');
    }

    public function desKunjungan($id)
    {
        $data = AnakPosyandu::where('id', $id)->first();
        $data->delete();
        return back()->with('success', 'Berhasil Hapus Data!');
    }
}