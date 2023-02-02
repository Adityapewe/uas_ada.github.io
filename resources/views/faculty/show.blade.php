@extends('layouts.main')

@section('content')
    <h1>Data Program Studi {{ $faculty->name }}</h1>

    <h3>Mahasiswa Terdaftar</h3>
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>NRP</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Prodi</th>
            <th colspan="2"></th>
        </tr>
        @foreach ($faculty->students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->code }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->faculty->name }}</td>
        </tr>
        @endforeach
    </table>

@endsection
