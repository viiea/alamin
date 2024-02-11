@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Pemasukan Kas Masjid <br>
                    <div class="d-flex">
                        <a href="{{ route('pemasukan.create') }}" class="btn btn-primary btn-sm col-2 m-2 {{ auth()->user()->role == 'guest' ? 'd-none disabled' : '' }}"> Tambah Data</a>
                        <a target="_blank" class="btn btn-info btn-sm col-2 m-2" href="{{ route('pemasukan.pdf') }}">Export to PDF</a>
                    </div>
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
                    <table class="table table-striped" id="datatables">
                        <thead>
                          <tr>
                            <th scope="col">Nama Donatur</th>
                            <th scope="col">Keperluan</th>
                            <th scope="col">Tanggal Pemasukan</th>
                            <th scope="col">Jumlah Pemasukan</th>
                            <th scope="col">Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                'url' : '{{ route('pemasukan.getData') }}',
                'data' : function(d){
                    // d.company_select = $('#company').val();
                }
            },
            // order: [5,'desc'],
            columns: [
                {data: 'nama', name: 'nama'},
                {data: 'nama_jenis', name: 'nama_jenis'},
                {data: 'tanggal_pemasukan', name: 'tanggal_pemasukan'},
                {data: 'jumlah_pemasukan', name: 'jumlah_pemasukan'},
                {data: 'opsi', name: 'opsi'},
            ]
        });

        // $('#company').change(function(){
        //     reloadTable('#datatable');
        // });
    })

    function reloadTable(idtable){
        var table = $(idtable).DataTable();
        table.cleanData;
        table.ajax.reload();
    }  
</script>

@endsection