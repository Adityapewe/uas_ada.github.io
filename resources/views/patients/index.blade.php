@extends('layouts.main')

@section('content')
<a href="{{ route('patients.create') }}" class="btn btn-success mt-3">Tambah Data</a>
<div class="col-sm-12">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
<div class="card mt-3">

<div class="card-header">
  <b> Data Pasien </b>
</div>

<div class="card-body">
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>No. Registrasi</th>
            <th>Nama Pasien</th>
            <th>Tgl Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Nama Poli</th>
            <th>Nama Dokter</th>
            <th>Action</th>
        </tr>
        @foreach ($patients as $patient)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $patient->registration_code }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->birthdate }}</td>
            <td>{{ $patient->gender }}</td>
            <td>{{ $patient->polyclinics->name }}</td>
            <td>{{ $patient->doctors->name }}</td>
            <td>
                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
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
