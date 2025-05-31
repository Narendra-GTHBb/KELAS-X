@extends('Backend.back')

@section('admincontent')
<div class="row">
    <div class="col-12">
        <div class="card admin-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-user-friends me-2"></i>Data Pelanggan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggans as $pelanggan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pelanggan->pelanggan }}</td>
                                <td>{{ $pelanggan->alamat }}</td>
                                <td>{{ $pelanggan->telp }}</td>
                                <td>{{ $pelanggan->email }}</td>
                                <td>
                                    @if ($pelanggan->aktif == 1)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Non-Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if ($pelanggan->aktif == 0)
                                            <form action="{{ url('admin/pelanggan/'.$pelanggan->idpelanggan) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ url('admin/pelanggan/'.$pelanggan->idpelanggan) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $pelanggans->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection