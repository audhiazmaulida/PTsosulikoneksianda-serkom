@extends('layouts.admin')

@section('title', 'Edit Galeri - Admin')
@section('page-title', 'Admin Dashboard / Galeri / Edit Galeri')

@section('content')

    <h1 class="text-xl font-bold text-navy mb-1">Edit Dokumentasi</h1>
    <p class="text-sm text-gray-500 mb-6">Ubah data dokumentasi ini di bawah.</p>

    <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.galeri._form', ['galeri' => $galeri])
    </form>

@endsection

@push('scripts')
    @vite('resources/js/pages/galeri-form.js')
@endpush