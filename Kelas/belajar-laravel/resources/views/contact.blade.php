@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <h2 class="page-title">Kontak Kami</h2>
    
    <div class="profile-section">
        <h3>Informasi Kontak</h3>
        <p><strong>Alamat:</strong> Jl. Contoh No. 123, Kota, Indonesia</p>
        <p><strong>Telepon:</strong> (021) 123-4567</p>
        <p><strong>Email:</strong> info@example.com</p>
    </div>
    
    <div class="contact-form">
        <h3>Formulir Kontak</h3>
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="subject">Judul</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            
            <div class="form-group">
                <label for="message">Pesan</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="btn">Kirim Pesan</button>
        </form>
    </div>
@endsection
