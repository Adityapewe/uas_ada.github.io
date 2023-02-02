@extends('layouts.main')

@section('content')
    <h3>Tambah Data Poli</h3>

    <form action="{{ route('polyclinics.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Poli</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
    </form>

@endsection
