@extends('layout.master')
@section('content')

<div class="container">
    <h4>Data Buku</h4>

    @include('_partial/flash_message')

    @if(Auth::check() && Auth::user()->level == 'admin')
    <p align="right"><a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a></p>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Jumlah Halaman</th>
                <th>ISBN</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                @if(Auth::check() && Auth::user()->level == 'admin')
                <th>Edit</th>
                <th>Hapus</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $buku)
            <tr>
                <th>{{ $buku -> id}}</th>
                <th>{{ $buku -> kode_buku}}</th>
                <th>{{ $buku -> judul_buku}}</th>
                <th>{{ $buku -> jumlah_halaman}}</th>
                <th>{{ $buku -> ISBN}}</th>
                <th>{{ $buku -> pengarang}}</th>
                <th>{{ $buku -> tahun_terbit}}</th>
                @if (Auth::check() && Auth::user() -> level == 'admin')
                <td><a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                <td>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                        @csrf
                            <button class="btn btn-warning btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-left">
        <strong>
            Jumlah Buku : {{ $jumlah_buku }}
        </strong>
        <p>{{ $data_buku -> links() }}</p>
    </div>
</div>
@endsection