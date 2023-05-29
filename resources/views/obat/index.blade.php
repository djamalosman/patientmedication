@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Obat</h3>
                {{-- <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks to simple-datatables</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Obat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Obat
            </div>
            <div class="card-body">
                        @if (Session::has('message'))
                                <div class="alert alert-success"><i class="bi bi-check-circle"></i> {{Session::get('message')}}</div>
                                
                        @else
                                
                        @endif
                <div class="buttons">
                    <a href="/viewsaveobat" class="btn btn-primary">Create</a>
                </div>
                <table class="cell-border" id="table1">
                    <thead>
                        <tr>
                            <th>Kode obat</th>
                            <th>Nama</th>
                            <th>satuan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapasien as $data)
                            <tr>
                                <td>{{$data->code}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->satuan}}</td>
                                <td>
                                    <a href ="/detailsobat/{{$data->id_obat}}"><span class="badge bg-success">Detail</span></a>
                                    <a href ="/viewupdate/{{$data->id_obat}}"><span class="badge bg-primary">Update</span></a>
                                </td>
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>


                
            </div>
        </div>

    </section>
</div>
<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 800);
</script>
<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="{{ asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection