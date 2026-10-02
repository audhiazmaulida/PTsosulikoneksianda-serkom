@extends('layouts.admin')

@section('title', 'Tambah Ekstrakurikuler - Admin')
@section('page-title', 'Admin Dashboard / Ekstrakurikuler / Tambah')

@section('content')

    <h1 class="text-xl font-bold text-navy mb-1">Tambah Ekstrakurikuler Baru</h1>
    <p class="text-sm text-gray-500 mb-6">Isi form di bawah ini untuk menambahkan kegiatan ekstrakurikuler baru.</p>

    <form action="{{ route('admin.ekskul.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.ekskul._form', ['ekskul' => null])
    </form>

@endsection

@push('scripts')
    @vite('resources/js/pages/ekskul-form.js')
@endpush