@extends('layouts.admin')

@section('title', 'Tambah Layanan - Admin')
@section('page-title', 'Admin Dashboard / Tambah Layanan')

@section('content')

    <p class="text-sm text-gray-400 mb-2">
        <a href="{{ route('admin.produk.index') }}" class="hover:text-navy">Layanan</a>
        <span class="mx-1">&gt;</span> Tambah Layanan
    </p>

    <h1 class="text-xl font-bold text-navy mb-1">Tambah Layanan Baru</h1>
    <p class="text-sm text-gray-500 mb-6">Masukkan informasi detail untuk menambahkan produk atau layanan baru.</p>

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-8">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.produk._form', ['produk' => null])
        </form>
    </div>

@endsection

@push('scripts')
    @vite('resources/js/pages/produk-form.js')
@endpush