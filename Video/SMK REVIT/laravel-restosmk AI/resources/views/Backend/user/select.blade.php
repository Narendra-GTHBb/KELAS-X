@extends('Backend.back')
@section('admincontent')
<div class="row">
    <div class="col-12">
        <div class="card admin-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-users me-2"></i>Data User</h4>
                <a class="btn btn-primary" href="{{ url('admin/user/create') }}">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge {{ $user->level == 'admin' ? 'bg-danger' : ($user->level == 'manager' ? 'bg-success' : 'bg-info') }}">
                                        {{ $user->level }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ url('admin/user/'.$user->id) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data?')">
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
                
                {{-- Pagination yang kompatibel dengan Laravel versi lama --}}
                @if(method_exists($users, 'links'))
                    {{ $users->links() }}
                @endif
                
                {{-- Atau jika masih error, gunakan ini sebagai pengganti --}}
                {{-- 
                @if(isset($users) && $users instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $users->appends(request()->query())->links() }}
                @endif
                --}}
            </div>
        </div>
    </div>
</div>
@endsection