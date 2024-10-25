@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Warga</h1>

    @if($warga)
        <ul>
            <li>Username: {{ $warga->username }}</li>
            <li>Email: {{ $warga->email }}</li>
            <!-- Tambahkan field lain yang ingin ditampilkan -->
        </ul>
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>
@endsection
