@extends('layouts.default')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Pengguna</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Pengguna</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="row">
            <div class="col-12">
                {{-- table data absen --}}
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between mb-0">
                        <h5 class="card-title">Tabel Data Pengguna</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                            Tambah
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table datatable" id="projekTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Surel</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            {{ $item->user_nama }}
                                        </td>
                                        <td>
                                            {{ $item->user_telp }}
                                        </td>
                                        <td>
                                            {{ $item->user_email }}
                                        </td>
                                        <td>
                                            {{ $item->user_keterangan }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-light rounded-pill" title="Ubah"
                                                id='edit' name='edit' data-bs-toggle="modal"
                                                data-bs-target="#editModal"
                                                data-bs-act="{{ route('users.update', $item->id) }}" {{-- data-bs-akta="{{ $item->no_aktaLahir }}"
                                                data-bs-nama="{{ $item->anak_nama }}"
                                                data-bs-lingkar="{{ $item->anak_lingkar_kepala }}"
                                                data-bs-berat="{{ $item->anak_berat_lahir }}"
                                                data-bs-tanggal="{{ $item->anak_tgl_lahir }}"
                                                data-bs-tinggi="{{ $item->anak_tinggi_lahir }}"
                                                data-bs-ibu="{{ $item->visitor_id }}" --}}>
                                                <i class="ri-edit-2-line"></i></button>
                                            <button type="button" class="btn btn-light rounded-pill" title="Hapus"
                                                id="hapus" name="hapus" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" {{-- data-bs-act="{{ route('data-anak.destroy', $item->id) }}"
                                                data-bs-nama="{{ $item->anak_nama }}" --}}>
                                                <i class="ri-delete-bin-line"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Modal tambah --}}
                <div class="modal fade" id="addModal" tabindex="-1">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Pengguna</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="row g-3 needs-validation" action="{{ route('users.store') }}" method="post"
                                novalidate>
                                @csrf
                                <div class="modal-body">
                                    {{-- <div class="row g-1">
                                        <div class="col-12">
                                            <label for="no_aktaLahir" class="form-label">Nomor Akta</label>
                                            <input type="text" class="form-control" id="no_aktaLahir"
                                                name="no_aktaLahir">
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="anak_nama" name="anak_nama">
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_lingkar_kepala" class="form-label">Lingkar Kepala</label>
                                            <input type="number" class="form-control" id="anak_lingkar_kepala"
                                                name="anak_lingkar_kepala">
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_berat_lahir" class="form-label">Berat Badan</label>
                                            <input type="number" class="form-control" id="anak_berat_lahir"
                                                name="anak_berat_lahir">
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_tgl_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="anak_tgl_lahir"
                                                name="anak_tgl_lahir">
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_tinggi_lahir" class="form-label">Tinggi Badan</label>
                                            <input type="number" class="form-control" id="anak_tinggi_lahir"
                                                name="anak_tinggi_lahir">
                                        </div>
                                        <div class="col-12">
                                            <label for="visitor_id" class="form-label">Nama Ibu</label>
                                            <select class="form-select" aria-label="Nama Ibu" name="visitor_id"
                                                id="visitor_id">
                                                <option selected disabled>Pilih salah satu</option>
                                                @foreach ($visitor as $item)
                                                    <option value="{{ $item->id }}">{{ $item->visitor_nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                                <h5 class="modal-title">Ubah Data Pengguna</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="row g-3 needs-validation" id="update-form" action="/" method="post"
                                novalidate>
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    {{-- <div class="row g-1">
                                        <div class="col-12">
                                            <label for="no_aktaLahir" class="form-label">Nomor Akta</label>
                                            <input type="text" class="form-control" id="no_aktaLahir" name="no_aktaLahir"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="anak_nama" name="anak_nama"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_lingkar_kepala" class="form-label">Lingkar Kepala</label>
                                            <input type="number" class="form-control" id="anak_lingkar_kepala"
                                                name="anak_lingkar_kepala" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_berat_lahir" class="form-label">Berat Badan</label>
                                            <input type="number" class="form-control" id="anak_berat_lahir"
                                                name="anak_berat_lahir" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_tgl_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="anak_tgl_lahir"
                                                name="anak_tgl_lahir" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="anak_tinggi_lahir" class="form-label">Tinggi Badan</label>
                                            <input type="number" class="form-control" id="anak_tinggi_lahir"
                                                name="anak_tinggi_lahir" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="visitor_id" class="form-label">Nama Ibu</label>
                                            <select class="form-select" aria-label="Nama Ibu" name="visitor_id"
                                                id="visitor_id" required>
                                                <option selected disabled>Pilih salah satu</option>
                                                @foreach ($visitor as $item)
                                                    <option value="{{ $item->id }}">{{ $item->visitor_nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                                        Yakin untuk menghapus pengguna dengan nama <strong
                                            class="badge border-danger border-1 text-danger" id="nama-anak"> </strong>?
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
            // modal edit
            $('#editModal').bind('show.bs.modal', event => {
                const updateForm = $('form#update-form');
                const updateButton = $(event.relatedTarget);

                updateForm.attr('action', updateButton.attr('data-bs-act'));
                updateForm.find('#no_aktaLahir').val(updateButton.attr('data-bs-akta'));
                updateForm.find('#anak_nama').val(updateButton.attr('data-bs-nama'));
                updateForm.find('#anak_lingkar_kepala').val(updateButton.attr('data-bs-lingkar'));
                updateForm.find('#anak_berat_lahir').val(updateButton.attr('data-bs-berat'));
                updateForm.find('#anak_tgl_lahir').val(updateButton.attr('data-bs-tanggal'));
                updateForm.find('#anak_tinggi_lahir').val(updateButton.attr('data-bs-tinggi'));
                updateForm.find('#visitor_id').val(updateButton.attr('data-bs-ibu'));
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
                delForm.find('#nama-anak').text('"' + delButton.attr('data-bs-nama') + '"')
            })

        });
    </script>
@endsection
