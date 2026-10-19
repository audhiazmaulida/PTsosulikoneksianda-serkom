@extends('layouts.admin')

@section('title', 'Edit Layanan - Admin')
@section('page-title', 'Admin Dashboard / Edit Layanan')

@section('content')

    <p class="text-sm text-gray-400 mb-2">
        <a href="{{ route('admin.produk.index') }}" class="hover:text-navy">Produk</a>
        <span class="mx-1">&gt;</span> Edit Layanan
    </p>

    <h1 class="text-xl font-bold text-navy mb-1">Edit Layanan</h1>
    <p class="text-sm text-gray-500 mb-6">Perbarui informasi layanan di bawah ini.</p>

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-8">
        <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.produk._form', ['produk' => $produk])
        </form>
    </div>

@endsection

@push('scripts')
    @vite('resources/js/pages/produk-form.js')
@endpush