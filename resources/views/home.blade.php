@extends('layout.template')
    <div class="w-100">
        <div class="card border-0 shadow-lg rounded-0 overflow-hidden" style="min-height: 100vh;">

            {{-- Card Header dengan Navbar --}} 
            <div class="card-header p-0" style="background: linear-gradient(135deg, #721e1e, #ff0202);">
                <div class="container-fluid px-4 py-3">
                    {{-- Navbar --}}
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="container-fluid">
                            <a class="navbar-brand fw-bold" href="#">
                                <i class="fas fa-map-marked-alt me-2"></i>
                                Geospasial Web
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    {{-- Judul Halaman --}}
                    <div class="text-white mt-3">
                        <h2 class="fw-bold mb-0">
                            Selamat Datang di Praktikum Geospasial Web Lanjut
                        </h2>
                    </div>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="card-body px-5 py-5 bg-light">
                {{-- Hero Section --}}
                <div class="mb-5">
                    <h2 class="fw-bold text-danger">Eksplorasi Spasial Anda Dimulai di Sini</h2>
                    <p class="text-muted fs-5">
                        Kelola data spasial, tabel atribut, dan API dengan antarmuka modern dan intuitif.
                    </p>
                </div>

                {{-- Fitur Utama --}}
                <div class="row text-center mb-5">
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-white shadow-sm rounded-4 h-100">
                            <i class="fas fa-map fa-2x text-success mb-3"></i>
                            <h6 class="fw-semibold">Pemetaan Interaktif</h6>
                            <p class="text-muted small">Visualisasi data spasial dinamis dan responsif.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-white shadow-sm rounded-4 h-100">
                            <i class="fas fa-table fa-2x text-info mb-3"></i>
                            <h6 class="fw-semibold">Tabel Data</h6>
                            <p class="text-muted small">Manajemen atribut data yang efisien dan mudah.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-white shadow-sm rounded-4 h-100">
                            <i class="fas fa-database fa-2x text-warning mb-3"></i>
                            <h6 class="fw-semibold">Akses API</h6>
                            <p class="text-muted small">Ambil data format JSON untuk kebutuhan lanjutan.</p>
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-4">
                    <a href="{{ route('login') }}"
                        class="btn btn-danger btn-lg px-4 me-2 rounded-pill shadow-sm">
                        <i class="fas fa-sign-in-alt me-2"></i> Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="btn btn-outline-danger btn-lg px-4 rounded-pill">
                        <i class="fas fa-user-plus me-2"></i> Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
