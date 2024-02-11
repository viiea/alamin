@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Jenis Pengeluaran/Pemasukan<br>
                    <a href="{{ route('jenis.create') }}" class="btn btn-primary btn-sm col-2 mt-2"> Tambah Data</a>
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
                            <th scope="col">No</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Option</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis as $jenises)
                                <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                @if($jenises->status == 2)
                                    <td>Pemasukan</td>
                                @else
                                    <td>Pengeluaran</td>
                                @endif
                                <td>{{ $jenises->nama }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('jenis.edit', ['id'=>$jenises->id]) }}" class="btn btn-primary btn-sm m-1">Edit</a>
                                    
                                    <form method="POST" action="{{ route('jenis.delete',['id'=>$jenises->id]) }}">
                                        {{ csrf_field() }}
                                
                                        <input type="submit" onclick="return confirm('Data Akan Dihapus?')" class="btn btn-danger btn-sm m-1" value="Delete">
                                    </form>
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
