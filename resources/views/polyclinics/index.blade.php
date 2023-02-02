@extends('layouts.main')

@section('content')
<a href="{{ route('polyclinics.create') }}" class="btn btn-success mt-3">Tambah Data</a>
<div class="col-sm-12">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
<div class="card mt-3">

<div class="card-header">
   Data Poli Klinik
</div>

<div class="card-body">
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Nama Poli</th>
            <th>Jumlah Dokter</th>
            <th>Aksi</th>
        </tr>
        @foreach ($polyclinics as $polyclinic)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $polyclinic->name }}</td>
            <td>{{ count($polyclinic->doctors) }}</td>
            <td>
                <a href="{{ route('polyclinics.show', $polyclinic->id) }}" class="btn btn-primary">Show</a>
            </td>
            <td>
                <a href="{{ route('polyclinics.edit', $polyclinic->id) }}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('polyclinics.destroy', $polyclinic->id) }}" method="POST">
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
