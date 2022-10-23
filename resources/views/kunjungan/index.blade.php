@extends('layouts.default')

@section('content')
    <?php
    $id = request()->route('id');
    ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Kunjungan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Kunjungan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="row">
            <div class="col-12">
                {{-- table data absen --}}
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between mb-0">
                        <h5 class="card-title">Tabel Data Kunjungan</h5>
                    </div>
                    <div class="card-body">
                        <table class="table datatable" id="projekTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Posyandu</th>
                                    <th scope="col">Nama Ibu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <a class="text-info fw-bold detailkunjungan" href="javascript:void(0)"
                                                data-id="{{ $item }}">
                                                {{ \Carbon\Carbon::parse($item->tgl_posyandu)->format('d-m-Y') }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $item->anak->visitor->visitor_nama }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- detail modal --}}
                <div class="modal fade" id="detailModal" tabindex="-1">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Data Kunjungan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-1">
                                    <div class="col-12">
                                        <label for="berat_kini" class="form-label">Berat Sekarang</label>
                                        <span class="d-block fw-bold" id="berat_kini"> </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="lingkar_kepala_kini" class="form-label">Lingkar Kepala
                                            Sekarang</label>
                                        <span class="d-block fw-bold" id="lingkar_kepala_kini"> </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="tinggi_kini" class="form-label">Tinggi Sekarang</label>
                                        <span class="d-block fw-bold" id="tinggi_kini"> </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="riwayat_vitamin" class="form-label">Riwayat Vitamin</label>
                                        <div class="alert alert-secondary alert-dashed mt-2" id="riwayat_vitamin"> </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="riwayat_imunisasi" class="form-label">Riwayat Imunisasi</label>
                                        <div class="alert alert-secondary alert-dashed mt-2" id="riwayat_imunisasi"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('page-script')
    <script>
        $(function() {
            // detail modal
            $('a.detailkunjungan').click(function() {
                var data = $(this).data('id');
                $('#detailModal').modal('show');
                $('#berat_kini').html(data.berat_kini);
                $('#lingkar_kepala_kini').html(data.lingkar_kepala_kini);
                $('#tinggi_kini').html(data.tinggi_kini);
                $('#tgl_posyandu').html(data.tgl_posyandu);
                $('#riwayat_vitamin').html(data.riwayat_vitamin);
                $('#riwayat_imunisasi').html(data.riwayat_imunisasi);
                // $('a#perbarui').attr("href", 'organization/' + data.id + '/edit')
            });

        });
    </script>
@endsection
