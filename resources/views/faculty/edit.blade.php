@extends('layouts.main')

@section('content')
<div class="col-md-8 offset-md-2">

    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div><br>
    @endif
<div class="card mt-3">

<div class="card-header">
    <h3>Ubah Fakultas</h3>
</div>

<div class="card-body">
    <form action="{{ route('faculty.update', $faculty->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group mt-2">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" value="{{ $faculty->name }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
</div>
@endsection
