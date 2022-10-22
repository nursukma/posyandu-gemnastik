@extends('layouts.default')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Visitor</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Visitor</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="row">
            <div class="col-12">
                {{-- table data absen --}}
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between mb-0">
                        <h5 class="card-title">Tabel Data Visitor</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                            Tambah
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table datatable" id="projekTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Surel</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            {{ $item->visitor_nama }}
                                        </td>
                                        <td>
                                            {{ $item->visitor_alamat }}
                                        </td>
                                        <td>
                                            {{ $item->visitor_telp }}
                                        </td>
                                        <td>
                                            {{ $item->visitor_email }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-light rounded-pill" title="Ubah"
                                                id='edit' name='edit' data-bs-toggle="modal"
                                                data-bs-target="#editModal"
                                                data-bs-act="{{ route('data-visitor.update', $item->id) }}"
                                                data-bs-nama="{{ $item->visitor_nama }}"
                                                data-bs-alamat="{{ $item->visitor_alamat }}"
                                                data-bs-telp="{{ $item->visitor_telp }}"
                                                data-bs-email="{{ $item->visitor_email }}">
                                                <i class="ri-edit-2-line"></i></button>
                                            <button type="button" class="btn btn-light rounded-pill" title="Hapus"
                                                id="hapus" name="hapus" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                data-bs-act="{{ route('data-visitor.destroy', $item->id) }}"
                                                data-bs-nama="{{ $item->visitor_nama }}">
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
                                <h5 class="modal-title">Tambah Data Visitor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="row g-3 needs-validation" action="{{ route('data-visitor.store') }}"
                                method="post" novalidate>
                                @csrf
                                <div class="modal-body">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <label for="visitor_nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="visitor_nama" name="visitor_nama"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="user_nama" class="form-label">Nama Pengguna</label>
                                            <input type="text" class="form-control" id="user_nama" name="user_nama"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Kata Sandi</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="visitor_alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="visitor_alamat"
                                                name="visitor_alamat" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="visitor_telp" class="form-label">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="visitor_telp" name="visitor_telp"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="visitor_email" class="form-label">Surel</label>
                                            <input type="email" class="form-control" id="visitor_email"
                                                name="visitor_email" required>
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
                                <h5 class="modal-title">Ubah Data Visitor</h5>
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
                                            <label for="visitor_nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="visitor_nama"
                                                name="visitor_nama" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="visitor_alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="visitor_alamat"
                                                name="visitor_alamat" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="visitor_telp" class="form-label">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="visitor_telp"
                                                name="visitor_telp" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="visitor_email" class="form-label">Surel</label>
                                            <input type="email" class="form-control" id="visitor_email"
                                                name="visitor_email" required>
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
                                        Yakin untuk menghapus data visitor dengan nama <strong
                                            class="badge border-danger border-1 text-danger" id="nama-visitor"> </strong>?
                                    </p>
                                    <div class="alert alert-danger text-center" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        <span class=""> Perhatian! Menghapus visitor juga berarti menghapus akun
                                            visitor.</span>
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
                updateForm.find('#visitor_nama').val(updateButton.attr('data-bs-nama'));
                updateForm.find('#visitor_telp').val(updateButton.attr('data-bs-telp'));
                updateForm.find('#visitor_alamat').val(updateButton.attr('data-bs-alamat'));
                updateForm.find('#visitor_email').val(updateButton.attr('data-bs-email'));
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
                delForm.find('#nama-visitor').text('"' + delButton.attr('data-bs-nama') + '"')
            })

        });
    </script>
@endsection
