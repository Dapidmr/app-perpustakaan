{{-- File: resources/views/books/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')

    <h1>Edit Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <form action="{{ route('members.update', $member['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="judul">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $member['nama']) }}">
        @error('nama')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="penulis">Nim</label>
        <input type="text" name="nim" id="nim" value="{{ old('nim', $member['nim']) }}">
        @error('nim')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="penerbit">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $member['email']) }}">
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="tahun_terbit">No. Telepon</label>
        <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $member['nomor_telepon']) }}">
        @error('nomor_telepon')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="isbn">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $member['alamat']) }}">
        @error('alamat')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
        @error('status')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Simpan</button>
    </form>

@endsection