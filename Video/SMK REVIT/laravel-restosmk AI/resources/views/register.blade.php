@extends('front')

@section ('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center py-3">
                <h3 class="mb-0"><i class="fas fa-user-plus me-2"></i>Daftar Akun</h3>
            </div>
            <div class="card-body p-4">
                <form action="{{ url('/postregister') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="pelanggan"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                        <input class="form-control" value="{{ old('pelanggan') }}" type="text" name="pelanggan" id="pelanggan" placeholder="Masukkan nama lengkap Anda">
                        <span class="text-danger">
                            @error('pelanggan')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="alamat"><i class="fas fa-map-marker-alt me-2"></i>Alamat</label>
                        <input class="form-control" value="{{ old('alamat') }}" type="text" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap Anda">
                        <span class="text-danger">
                            @error('alamat')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="telp"><i class="fas fa-phone me-2"></i>Nomor Telepon</label>
                        <input class="form-control" value="{{ old('telp') }}" type="text" name="telp" id="telp" placeholder="Masukkan nomor telepon Anda">
                        <span class="text-danger">
                            @error('telp')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="jeniskelamin"><i class="fas fa-venus-mars me-2"></i>Jenis Kelamin</label>
                        <select class="form-select" name="jeniskelamin" id="jeniskelamin">
                            <option value="l">Laki-laki</option>
                            <option value="p" selected>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                        <input class="form-control" value="{{ old('email') }}" type="email" name="email" id="email" placeholder="Masukkan email Anda">
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password"><i class="fas fa-lock me-2"></i>Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Masukkan password Anda">
                        <span class="text-danger">
                            @error('password')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <p>Sudah punya akun? <a href="{{ url('login') }}" class="text-decoration-none">Login sekarang</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection