@extends('layouts.template')
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href='{{url('pesan/create')}}' class="btn btn-primary">+ Tambah Data</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-4">Email</th>
                            <th class="col-md-2">Pesan</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $pesan)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pesan->name}}</td>
                            <td>{{$pesan->email}}</td>
                            <td>{{$pesan->pesan}}</td>
                            <td>
                                <a href='pesan/{{$pesan->id}}/edit' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin menghapus data {{$pesan->name}} ?')" method="POST" action="{{url('pesan/'.$pesan->id)}}" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            @endsection
            <!-- AKHIR DATA -->

