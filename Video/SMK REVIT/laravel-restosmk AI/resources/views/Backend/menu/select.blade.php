@extends('Backend.back')

@section('admincontent')
<div class="row">
    <div class="col-12">
        <div class="card admin-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-utensils me-2"></i>Data Menu</h4>
                <div>
                    <a class="btn btn-primary" href="{{ url('admin/menu/create') }}">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <form action="{{ url('admin/select') }}" method="get" class="d-flex">
                            <select name="idkategori" class="form-select me-2">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->idkategori }}" {{ $idkategori == $kategori->idkategori ? 'selected' : '' }}>
                                        {{ $kategori->kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter me-2"></i>Filter
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Menu</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $menu->kategori }}</td>
                                <td>{{ $menu->menu }}</td>
                                <td>{{ $menu->deskripsi }}</td>
                                <td>
                                    <img src="{{ asset('gambar/'.$menu->gambar) }}" alt="{{ $menu->menu }}" width="100">
                                </td>
                                <td>{{ number_format($menu->harga) }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('admin/menu/'.$menu->idmenu.'/edit') }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ url('admin/menu/'.$menu->idmenu) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data?')">
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
                {{ $menus->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection