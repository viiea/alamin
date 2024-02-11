@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Donatur Kas Masjid <br>
                    <a href="{{ route('donatur.create') }}" class="btn btn-primary btn-sm col-2 mt-2 {{ auth()->user()->role != 'admin' ? 'd-none' : '' }}"> Tambah Data</a>
                </div>
                <div class="card-body">
                    @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ Session::get('message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nomor Handphone</th>
                            <th scope="col">Option</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($donatur as $donaturs)      
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $donaturs->nama }}</td>
                                    <td>{{ $donaturs->alamat }}</td>
                                    <td>{{ $donaturs->no_telephone }}</td>
                                    <td >
                                        <a href="{{ route('donatur.edit', ['id'=>$donaturs->id]) }}" class="btn btn-primary btn-sm {{ auth()->user()->role != 'admin' ? 'd-none' : '' }}">Edit</a>
                                        <a href="{{ route('donatur.delete', ['id'=>$donaturs->id]) }}" class="btn btn-danger btn-sm {{ auth()->user()->role != 'admin' ? 'd-none' : '' }}">Hapus</a>
                                        <a target="_blank" href="{{ route('donatur.download', ['id'=>$donaturs->id]) }}" class="btn btn-primary btn-sm">Download</a>
                                    </td>
                                </tr>
                            @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
