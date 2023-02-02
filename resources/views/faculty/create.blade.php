@extends('layouts.main')

@section('content')
    <h3>Tambah Data Prodi</h3>

    <form action="{{ route('faculty.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Prodi</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
    </form>

@endsection
