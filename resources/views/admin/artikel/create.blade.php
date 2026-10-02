@extends('layouts.admin')

@section('title', 'Tambah Artikel - Admin')
@section('page-title', 'Admin Dashboard / Tambah Artikel')

@section('content')

    <h1 class="text-xl font-bold text-navy mb-1">Tambah Artikel Baru</h1>
    <p class="text-sm text-gray-500 mb-6">Isi form di bawah ini untuk mempublikasikan artikel baru.</p>

    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.artikel._form', ['artikel' => null])
    </form>

@endsection

@push('scripts')
    @vite('resources/js/pages/artikel-form.js')
@endpush