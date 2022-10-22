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
                    <li class="breadcrumb-item"><a href="/data-anak">Data Anak</a></li>
                    <li class="breadcrumb-item active">Kunjungan</li>
                    {{-- <li class="breadcrumb-item active">{{ $namaAnak }}</li> --}}
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="row">
            <div class="col-12">
                {{-- table data absen --}}
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between mb-0">
                        <h5 class="card-title">Tabel Data Anak</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                            Tambah
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table datatable" id="projekTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Posyandu</th>
                                    <th scope="col">Aksi</th>
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
                                            <button type="button" class="btn btn-light rounded-pill" title="Ubah"
                                                id='edit' name='edit' data-bs-toggle="modal"
                                                data-bs-target="#editModal"
                                                data-bs-act="{{ route('data-anak.upKunjungan', $item->id) }}"
                                                data-bs-lingkar="{{ $item->lingkar_kepala_kini }}"
                                                data-bs-berat="{{ $item->berat_kini }}"
                                                data-bs-tinggi="{{ $item->tinggi_kini }}"
                                                data-bs-imun="{{ $item->riwayat_vitamin }}"
                                                data-bs-vit="{{ $item->riwayat_imunisasi }}">
                                                <i class="ri-edit-2-line"></i></button>
                                            <button type="button" class="btn btn-light rounded-pill" title="Hapus"
                                                id="hapus" name="hapus" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                data-bs-act="{{ route('data-anak.desKunjungan', $item->id) }}"
                                                data-bs-tgl="{{ $item->tgl_posyandu }}">
                                                <i class="ri-delete-bin-line"></i></button>
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

                {{-- Modal tambah --}}
                <div class="modal fade" id="addModal" tabindex="-1">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Kunjungan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="row g-3 needs-validation" action="{{ route('data-anak.addKunjungan') }}"
                                method="post" novalidate>
                                @csrf
                                <div class="modal-body">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <label for="berat_kini" class="form-label">Berat Sekarang</label>
                                            <input type="number" class="form-control" id="berat_kini" name="berat_kini"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="lingkar_kepala_kini" class="form-label">Lingkar Kepala
                                                Sekarang</label>
                                            <input type="number" class="form-control" id="lingkar_kepala_kini"
                                                name="lingkar_kepala_kini" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="tinggi_kini" class="form-label">Tinggi Sekarang</label>
                                            <input type="number" class="form-control" id="tinggi_kini"
                                                name="tinggi_kini" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="riwayat_vitamin" class="form-label">Riwayat Vitamin</label>
                                            <textarea class="form-control" id="riwayat_vitamin" name="riwayat_vitamin"> </textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="riwayat_imunisasi" class="form-label">Riwayat Imunisasi</label>
                                            <textarea class="form-control" id="riwayat_imunisasi" name="riwayat_imunisasi"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal edit --}}
                <div class="modal fade" id="editModal" tabindex="-1">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data Kunjungan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="row g-3 needs-validation" id="update-form" action="/" method="post"
                                novalidate>
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <label for="berat_kini" class="form-label">Berat Sekarang</label>
                                            <input type="number" class="form-control" id="berat_kini" name="berat_kini"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="lingkar_kepala_kini" class="form-label">Lingkar Kepala
                                                Sekarang</label>
                                            <input type="number" class="form-control" id="lingkar_kepala_kini"
                                                name="lingkar_kepala_kini" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="tinggi_kini" class="form-label">Tinggi Sekarang</label>
                                            <input type="number" class="form-control" id="tinggi_kini"
                                                name="tinggi_kini" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="riwayat_vitamin" class="form-label">Riwayat Vitamin</label>
                                            <textarea class="form-control" id="riwayat_vitamin" name="riwayat_vitamin"> </textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="riwayat_imunisasi" class="form-label">Riwayat Imunisasi</label>
                                            <textarea class="form-control" id="riwayat_imunisasi" name="riwayat_imunisasi"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal hapus --}}
                <div class="modal fade" id="deleteModal" tabindex="-1">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="row g-3 needs-validation" id="delete-form" action="/" method="post"
                                novalidate>
                                @csrf
                                @method('delete')
                                <div class="modal-body">
                                    <p class="text-center">
                                        Yakin untuk menghapus data tanggal <strong
                                            class="badge border-danger border-1 text-danger" id="tgl-kunjungan">
                                        </strong>?
                                    </p>
                                    <div class="alert alert-danger text-center" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        <span class=""> Perhatian! Data tidak dapat dikembalikan.</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
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

            // modal edit
            $('#editModal').bind('show.bs.modal', event => {
                const updateForm = $('form#update-form');
                const updateButton = $(event.relatedTarget);

                updateForm.attr('action', updateButton.attr('data-bs-act'));
                updateForm.find('#lingkar_kepala_kini').val(updateButton.attr('data-bs-lingkar'));
                updateForm.find('#berat_kini').val(updateButton.attr('data-bs-berat'));
                updateForm.find('#tinggi_kini').val(updateButton.attr('data-bs-tinggi'));
                updateForm.find('#riwayat_vitamin').val(updateButton.attr('data-bs-vit'));
                updateForm.find('#riwayat_imunisasi').val(updateButton.attr('data-bs-imun'));
            }).bind('hide.bs.modal', e => {
                const updateForm = $('form#update-form');
                updateForm.attr('action', '/');
                updateForm[0].reset();
            });

            // delete modal
            $('#deleteModal').bind('show.bs.modal', event => {
                const delButton = $(event.relatedTarget);
                const delForm = $('form#delete-form');
                delForm.attr('action', delButton.attr('data-bs-act'));
                delForm.find('#tgl-kunjungan').text('"' + delButton.attr('data-bs-tgl') + '"')
            })

        });
    </script>
@endsection
