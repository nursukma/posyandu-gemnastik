<?php

namespace App\Http\Controllers;

use App\Models\DataVisitor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataVisitorController extends Controller
{
    const DATA_VISITOR = [
        'visitor_nama',
        'visitor_telp',
        'visitor_alamat',
        'visitor_email',
        'user_id'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataVisitor::all();
        return view('DataVisitor.index', compact('data'));
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
    public function store(Request $request)
    {
        $addUser = User::create([
            'user_nama' => $request->user_nama,
            'user_telp' => $request->visitor_telp,
            'user_email' => $request->visitor_email,
            'password' => Hash::make($request->password),
            'user_keterangan' => 'Visitor',
            'role_id' => 3
        ]);

        if ($addUser) {
            $data = $request->only(self::DATA_VISITOR);
            $data['user_id'] = $addUser->id;
            DataVisitor::create($data);

            notify()->success('Berhasil Tambah Data!');
            return redirect('/data-visitor');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataVisitor  $dataVisitor
     * @return \Illuminate\Http\Response
     */
    public function show(DataVisitor $dataVisitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataVisitor  $dataVisitor
     * @return \Illuminate\Http\Response
     */
    public function edit(DataVisitor $dataVisitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataVisitor  $dataVisitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataVisitor $dataVisitor)
    {
        $data = $request->only(self::DATA_VISITOR);
        $dataVisitor->update($data);

        notify()->success('Berhasil Ubah Data!');
        return redirect('/data-visitor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataVisitor  $dataVisitor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataVisitor = DataVisitor::with('user')->where('id', $id)->first();
        $dataUser = User::where('id', $dataVisitor->user_id)->first();
        $del = $dataVisitor->delete();

        if ($del) {
            $dataUser->delete();

            notify()->success('Berhasil Hapus Data!');
            return redirect('/data-visitor');
        }
    }
}