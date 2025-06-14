@extends('Backend.back')

@section('admincontent')
<div class="row">
    <div class="col-6">
        <form action="{{ url('admin/kategori') }}" method="post">
            @csrf

            @if (Session::has('pesan'))
                <div class="alert alert-danger">
                    {{ Session::get('pesan') }}
                </div>
            @endif
           
            <div class="mt-2">
                <label class="form-label" for="">Kategori</label>
                <input class="form-control"  value="{{ old('kategori') }}" type="text" name="kategori" id="">
                <span class="text-danger">
                    @error('kategori')
                        {{$message}}
                    @enderror
                </span>
            </div>
            
            <div class="mt-4">
            
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>


        </form>
    </div>
</div>
@endsection