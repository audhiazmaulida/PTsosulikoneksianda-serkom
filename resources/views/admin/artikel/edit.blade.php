@extends('layouts.admin')

@section('title', 'Edit Artikel - Admin')
@section('page-title', 'Admin Dashboard / Edit Artikel')

@section('content')

    <h1 class="text-xl font-bold text-navy mb-1">Edit Artikel</h1>
    <p class="text-sm text-gray-500 mb-6">Ubah data artikel "{{ $artikel->judul }}" di bawah ini.</p>

    <form action="{{ route('admin.artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.artikel._form', ['artikel' => $artikel])
    </form>

@endsection

@push('scripts')
    @vite('resources/js/pages/artikel-form.js')
@endpush