@extends('layouts.app')

@section('content')

    <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Validation</h3>
                <p class="text-subtitle text-muted">...</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Input</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                        <li class="breadcrumb-item active" aria-current="page">Pasien</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body"> 
                            
                            <form action="/obatsave" method="POST" class="form" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Kode obat</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="Kode Pasien" name="code" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label">Nama obat</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Nama obat" name="name"data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Satuan</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="satuan" name="satuan" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Category</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Category" name="category" data-parsley-required="true">
                                        </div>
                                    </div>                     
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Brand</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Brand" name="brand" data-parsley-required="true">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" data-parsley-required="true"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        <button class="btn btn-light-info me-1 mb-1"><a href ="/pasien/index">Back</a></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection