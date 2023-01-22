@extends('layouts.template')

<!-- START FORM -->
@section('konten')

<form action='{{url('pesan')}}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' autocomplete="off" value="{{Session::get('name')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name='email' id="email" autocomplete="off" value="{{Session::get('email')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="pesan" autocomplete="off">{{Session::get('pesan')}}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
<!-- AKHIR FORM -->
