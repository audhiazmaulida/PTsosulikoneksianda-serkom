@extends('layouts.admin')

@section('title', 'Tambah Galeri - Admin')
@section('page-title', 'Admin Dashboard / Galeri / Tambah Galeri')

@section('content')

    <h1 class="text-xl font-bold text-navy mb-1">Tambah Dokumentasi Baru</h1>
    <p class="text-sm text-gray-500 mb-6">Isi form di bawah ini untuk menambahkan dokumentasi kegiatan perusahaan.</p>

    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.galeri._form', ['galeri' => null])
    </form>

@endsection

@push('scripts')
    @vite('resources/js/pages/galeri-form.js')
@endpush