@extends('Backend.back')

@section('admincontent')
<div class="row">
    <div class="col-12">
        <div class="card admin-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-tags me-2"></i>Data Kategori</h4>
                <a class="btn btn-primary" href="{{ url('admin/kategori/create') }}">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategori->kategori }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('admin/kategori/'.$kategori->idkategori.'/edit') }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ url('admin/kategori/'.$kategori->idkategori) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $kategoris->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection