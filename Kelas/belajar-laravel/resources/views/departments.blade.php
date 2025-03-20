@extends('layouts.app')

@section('title', 'Jurusan')

@section('content')
    <h2 class="page-title">Jurusan</h2>
    
    <div class="departments">
        <div class="department-card">
            <img src="https://via.placeholder.com/400x200" alt="Teknik Informatika">
            <div class="content">
                <h3>Teknik Informatika</h3>
                <p>Program studi yang mempelajari tentang teknologi komputer, pemrograman, dan pengembangan aplikasi.</p>
            </div>
        </div>
        
        <div class="department-card">
            <img src="https://via.placeholder.com/400x200" alt="Sistem Informasi">
            <div class="content">
                <h3>Sistem Informasi</h3>
                <p>Program studi yang mempelajari tentang analisis, desain, dan implementasi sistem informasi dalam organisasi.</p>
            </div>
        </div>
        
        <div class="department-card">
            <img src="https://via.placeholder.com/400x200" alt="Manajemen Informatika">
            <div class="content">
                <h3>Manajemen Informatika</h3>
                <p>Program studi yang mempelajari tentang pengelolaan sistem informasi dan teknologi untuk mendukung bisnis.</p>
            </div>
        </div>
    </div>
@endsection