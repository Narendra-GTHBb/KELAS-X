@extends('front')

@section ('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center py-3">
                <h3 class="mb-0"><i class="fas fa-sign-in-alt me-2"></i>Login</h3>
            </div>
            <div class="card-body p-4">
                <form action="{{ url('/postlogin') }}" method="post">
                    @csrf

                    @if (Session::has('pesan'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ Session::get('pesan') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                   
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
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <p>Belum punya akun? <a href="{{ url('register') }}" class="text-decoration-none">Daftar sekarang</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection