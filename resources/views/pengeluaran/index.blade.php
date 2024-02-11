@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Pengeluaran Kas Masjid <br>
                    <div class="d-flex">

                        <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary btn-sm col-2 m-2 {{ auth()->user()->role == 'guest' ? 'd-none disabled' : '' }}"> Tambah Data</a>
                        <a target="_blank" class="btn btn-info btn-sm col-2 m-2" href="{{ route('pengeluaran.pdf') }}">Export to PDF</a>
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
                            <th scope="col">Jenis kegiatan</th>
                            <th scope="col">Nominal Pengeluaran</th>
                            <th scope="col">Tanggal Pengeluaran</th>
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
                'url' : '{{ route('pengeluaran.getData') }}',
                'data' : function(d){
                    // d.company_select = $('#company').val();
                }
            },
            // order: [5,'desc'],
            columns: [
                {data: 'nama_jenis', name: 'nama_jenis'},
                {data: 'jumlah_pengeluaran', name: 'jumlah_pengeluaran'},
                {data: 'tanggal_pengeluaran', name: 'tanggal_pengeluaran'},
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