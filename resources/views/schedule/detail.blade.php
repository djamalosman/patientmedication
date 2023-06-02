@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Obat</h3>
                <p class="text-subtitle text-muted">...</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                        <h4 class="card-title">Detail Pasein</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Kode Pasien</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Nama Passien" name="namepasien"disabled value="{{$getDataDetails->code}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label">Nama Passien</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Nama Passien" name="namepasien"disabled value="{{$getDataDetails->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">No Ktp</label>
                                            <input type="number" id="city-column" class="form-control" placeholder="No Ktp" name="noktp" disabled value="{{$getDataDetails->no_ktp}}">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label">Tempat lahir</label>
                                            <input type="text" id="country-floating" class="form-control" name="tempatlahir" placeholder="Tempat Lahir" disabled value="{{$getDataDetails->tempatlahir}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label">Tanggal lahir</label>
                                            <input type="date" id="company-column" class="form-control" name="tgllhr" placeholder="Tanggal Lahir" disabled value="{{$getDataDetails->tgllahir}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label">Kota</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Nama Passien" name="namepasien"disabled value="{{$getDataDetails->kota}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Alamat</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Alamat" name="alamat"disabled value="{{$getDataDetails->alamat}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3" disabled>{{$getDataDetails->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button class="btn btn-light-info me-1 mb-1"><a href ="/pasien/index">Back</a></button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection