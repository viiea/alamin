@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <form class="m-3" method="POST" action="{{ route('jenis.update',['id'=>$jenis->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3 form-group">
                      <label for="nama" class="form-label">Nama Pengeluaran/Pemasukan</label>
                      <input type="text" class="form-control" id="nama" name="nama" value="{{ $jenis->nama }}" required>
                    </div>
                    <div class="mt-3 form-group">
                        <select name="status" class="form-select btn-dark" required>
                            <option value="1" {{ $jenis->status == 1 ? 'selected' : ''}}>Pengeluaran</option>
                            <option value="2" {{ $jenis->status == 2 ? 'selected' : ''}}>Pemasukan</option>
                          </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                  </form>      
            </div>
        </div>
    </div>
</div>
@endsection
