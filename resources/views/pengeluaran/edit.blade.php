@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center mt-2 card-header-warning">Edit data pengeluaran</h4>

              </div>
              <div class="card-body">
                <form class="m-3" action="{{ route('pengeluaran.update',['id'=>$pengeluaran->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    
                    <div class="mt-3">
                      <label for="exampleInputEmail1" class="form-label">Jenis Kegiatan</label>
                      <select class="form-control" id="sel1" name="jenis_id" required>
                        @foreach ($jenis as $data)
                          <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('jenis_id'))
                          <div class="small text-danger">{{ $errors->first('jenis_id') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="tanggal_pengeluaran" class="form-label">Tanggal pengeluaran </label>
                      <input value="{{ $pengeluaran->tanggal_pengeluaran }}" type="datetime-local" class="form-control" name="tanggal_pengeluaran" id="tanggal_pengeluaran" required>
                        @if($errors->has('tanggal_pengeluaran'))
                          <div class="small text-danger">{{ $errors->first('tanggal_pengeluaran') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="jumlah_pengeluaran" class="form-label">Jumlah pengeluaran</label>
                      <input type="number" class="form-control" name="jumlah_pengeluaran" id="jumlah_pengeluaran" placeholder="{{ $pengeluaran->jumlah_pengeluaran }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        @if($errors->has('jumlah_pengeluaran'))
                          <div class="small text-danger">{{ $errors->first('jumlah_pengeluaran') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="file_upload" class="form-label">Upload File</label>
                      <input type="file" class="form-control" name="file_upload" id="file_upload" required>
                        @if($errors->has('file_upload'))
                          <div class="small text-danger">{{ $errors->first('file_upload') }}</div>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                  </form> 
              </div>     
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-css')

@endsection