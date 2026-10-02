@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler - Admin')
@section('page-title', 'Admin Dashboard / Ekstrakurikuler / Edit')

@section('content')

    <h1 class="text-xl font-bold text-navy mb-1">Edit Ekstrakurikuler</h1>
    <p class="text-sm text-gray-500 mb-6">Ubah data "{{ $ekskul->nama }}" di bawah ini.</p>

    <form action="{{ route('admin.ekskul.update', $ekskul) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.ekskul._form', ['ekskul' => $ekskul])
    </form>

@endsection

@push('scripts')
    @vite('resources/js/pages/ekskul-form.js')
@endpush