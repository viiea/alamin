@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center mt-2 card-header-warning">Edit data Pemasukan</h4>

              </div>
              <div class="card-body">
                <form class="m-3" action="{{ route('pemasukan.update',['id'=>$pemasukan->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="mt-3">
                      <label for="exampleInputEmail1" class="form-label">Donatur</label>
                      <select class="form-control" id="sel1" name="donatur_id" required>
                        @foreach ($donatur as $donatur_data)
                          <option value="{{ $donatur_data->id }}">{{ $donatur_data->nama }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('donatur_id'))
                          <div class="small text-danger">{{ $errors->first('donatur_id') }}</div>
                        @endif
                    </div>
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
                      <label for="tanggal_pemasukan" class="form-label">Tanggal Pemasukan </label>
                      <input value="{{ $pemasukan->tanggal_pemasukan }}" type="datetime-local" class="form-control" name="tanggal_pemasukan" id="tanggal_pemasukan" required>
                        @if($errors->has('tanggal_pemasukan'))
                          <div class="small text-danger">{{ $errors->first('tanggal_pemasukan') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="jumlah_pemasukan" class="form-label">Jumlah pemasukan</label>
                      <input type="number" class="form-control" name="jumlah_pemasukan" id="jumlah_pemasukan" placeholder="{{ $pemasukan->jumlah_pemasukan }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        @if($errors->has('jumlah_pemasukan'))
                          <div class="small text-danger">{{ $errors->first('jumlah_pemasukan') }}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                      <label for="file_upload" class="form-label">Upload File</label>
                      <input type="file" class="form-control" name="file_upload" id="file_upload" >
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