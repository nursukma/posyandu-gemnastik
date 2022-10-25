<?php

namespace App\Http\Controllers;

use App\Models\AnakPosyandu;
use App\Models\DataAnak;
use App\Models\DataVisitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if (auth()->user()->role_id == 3) {
            $variable = auth()->user()->id;
            $data = [];
            $quer = DB::table('anak_posyandu')
                ->join('anak', 'anak.id', '=', 'anak_posyandu.anak_id')
                ->join('visitor', 'visitor.id', '=', 'anak.visitor_id')
                ->join('user', 'visitor.user_id', '=', 'user.id')
                ->where('visitor.user_id', '=', $variable)
                // ->groupBy('visitor.user_id')
                // ->orderByDesc('anak_posyandu.created_at')
                ->get();
            array_push($data, $quer);
            // dd($data);
            return view('kunjungan.index', compact('data'));
        } else {
            $data = AnakPosyandu::with('anak')->get();
            // dd($data);
            return view('kunjungan.index', compact('data'));
        }
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

        notify()->success('Berhasil Tambah Data!');
        return redirect('/kunjungan');
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