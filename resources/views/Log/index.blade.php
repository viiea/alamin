@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Log Aktivitas<br>
                </div>
                <div class="card-body">
                    
                    <table class="table table-striped" id="datatables">
                        <thead>
                          <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Keterangan</th>
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
                'url' : '{{ route('log.getData') }}',
                'data' : function(d){
                    // d.company_select = $('#company').val();
                }
            },
            // order: [5,'desc'],
            columns: [
                {data: 'nama', name: 'nama'},
                {data: 'time', name: 'time'},
                {data: 'keterangan', name: 'keterangan'},
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