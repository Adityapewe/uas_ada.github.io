@extends('layouts.main')

@section('content')
<a href="{{ route('faculty.create') }}" class="btn btn-success mt-3">Tambah Data</a>
<div class="col-sm-12">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
<div class="card mt-3">

<div class="card-header">
   Data Prodi
</div>

<div class="card-body">
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Nama Prodi</th>
            <th>Jumlah Mahasiswa</th>
            <th colspan="2"></th>
        </tr>
        @foreach ($facultys as $faculty)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $faculty->name }}</td>
            <td>
                <a href="{{ route('faculty.show', $faculty->id) }}" title="Lihat Data Mahasiswa">
                    {{ count($faculty->students) }}
                </a>
            </td>
            <td>
                <a href="{{ route('faculty.edit', $faculty->id) }}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('faculty.destroy', $faculty->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
@endsection
