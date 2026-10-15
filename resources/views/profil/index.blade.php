@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <h1>Profil Saya</h1>

    <table>
        <tbody>
            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ ucfirst($user->role) }}</td>
            </tr>
        </tbody>
    </table>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h2>Ganti Password</h2>

    <form action="{{ route('profil.password') }}" method="POST">
        @csrf

        <p>
            <label for="password_lama">Password Lama</label><br>
            <input type="password" name="password_lama" id="password_lama">
            @error('password_lama')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="password_baru">Password Baru</label><br>
            <input type="password" name="password_baru" id="password_baru">
            @error('password_baru')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="password_baru_confirmation">Konfirmasi Password Baru</label><br>
            <input type="password" name="password_baru_confirmation" id="password_baru_confirmation">
        </p>

        <button type="submit">Simpan Password</button>
    </form>
@endsection