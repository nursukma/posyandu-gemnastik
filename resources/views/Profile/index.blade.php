@extends('layouts.default')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Halaman Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-5">
                    {{-- <div class="row">
                        <div class="col-12"> --}}
                    <div class="card">
                        <div class="row-g1 m-3">
                            <h5 class="card-title">Data Pengguna</h5>
                            <div class="col-12">
                                <label for="user_nama" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" id="user_nama" name="user_nama" readonly>
                            </div>
                            <div class="col-12">
                                <label for="passwordLama" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" id="passwordLama" name="passwordLama">
                            </div>
                            <button class="btn btn-success d-block w-100 mt-3" data-bs-toggle="modal"
                                data-bs-target="#renewPassword">
                                <span class="btn-icon-label">
                                    <i data-feather="unlock" class="me-2"></i>
                                    <span> Perbarui Kata Sandi </span>
                                </span>
                            </button>
                        </div>
                    </div>
                    {{-- </div>
                    </div> --}}
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-7">
                    {{-- <div class="row"> --}}
                    <div class="card">
                        <div class="row g-1 m-3">
                            <h5 class="card-title">Data Visitor</h5>
                            <div class="col-12">
                                <label for="visitor_nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="visitor_nama" name="visitor_nama" required>
                            </div>
                            <div class="col-12">
                                <label for="visitor_alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="visitor_alamat" name="visitor_alamat"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="visitor_telp" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" id="visitor_telp" name="visitor_telp" required>
                            </div>
                            <div class="col-12">
                                <label for="visitor_email" class="form-label">Surel</label>
                                <input type="email" class="form-control" id="visitor_email" name="visitor_email" required>
                            </div>
                            <button class="btn btn-primary d-block w-100 mt-3">
                                <span class="btn-icon-label">
                                    <i data-feather="unlock" class="me-2"></i>
                                    <span> Simpan </span>
                                </span>
                            </button>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div><!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('page-script')
@endsection
