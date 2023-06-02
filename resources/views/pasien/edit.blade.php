@extends('layouts.app')

@section('title')
    HOME
@endsection

@section('content')
    <div id="app">

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Update</h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pasien</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div>

                    <form action="{{ route('Pasien.update',$data->id) }}" onsubmit="validateForm()" method="POST" enctype="multipart/form-data" id="form">
                        @csrf
                        @method('put')
                        <section id="multiple-column-form">
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label>Code *</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" class="form-control" id="code"
                                                                    name="code" value="{{$data->code}}" readonly required>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label>Name *</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" value="{{$data->name}}"  required>
                                                            </div>

                                                     
                                                            <div class="col-md-1">
                                                                <label>Alamat</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" id="alamat" class="form-control"
                                                                    name="alamat" value="{{$data->alamat}}" >
                                                            </div>

                                                            <div class="col-md-1">
                                                                <label>Tempat Lahir</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" class="form-control" id="tempat"
                                                                    name="tempat" value="{{$data->tempat}}">
                                                            </div>

                                                            <div class="col-md-1">
                                                                <label>Tgl Lahir</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="date" class="form-control" id="tgllahir"
                                                                    name="tgllahir" value="{{ date('Y-m-d'),strtotime($data->tgllahir)}}">
                                                            </div>

                                                  
                                                                                                       

                                                            <div class="col-md-1">
                                                                <label>KTP</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" id="ktp" class="form-control"
                                                                    name="ktp" value="{{$data->ktp}}">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label>Kota</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" id="kota" class="form-control"
                                                                    name="kota" value="{{$data->kota}}">
                                                            </div>

                                                            <div class="col-md-1">
                                                                <label>Telp</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" id="phone" class="form-control"
                                                                    name="phone" value="{{$data->phone}}" required>
                                                            </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                </section>

                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-body">
                                                <div class="col-md-3 col-6">
                                                    <button type="submit" id="btnsubmit"
                                                        class="btn btn-primary">Save</button>
                                                    <a type="submit" href="{{ route('Pasien') }}"
                                                        class="btn btn-danger">Cancel</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>

                </form>

            </div>
        </div>
    </div>
    </div>
@endsection



@push('after-script')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>

    <script>
        $(document).ready(function() {
            ProjectFind2()

            $('#exampleModalV2').modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });

        })

        function ProjectFind2() {

            $('#table2').dataTable({
                "sPaginationType": "full_numbers",
                "bFilter": true
            });
        }
        $(document).on("keydown", ":input:not(textarea)", function(event) {
            return event.key != "Enter";
        });

        $('#btnsubmit').on('click', function(event) {
            event.preventDefault();
            const isFormValid = validateForm();

            if (isFormValid) {
                $(this).prop('disabled', true);
                $('body').append('<div class="overlay"><div class="spinner"></div></div>');
                $('#form').submit();

            }
        });

        function validateForm() {
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            if (input == "") {
                alert("Input text cannot be empty!");
                return false;
            }

            return true;
        }

        function validateForm() {
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;

            if (name == "") {
                alert("Nama Kosong !!");
                return false;
            }
            if (phone == "") {
                alert("Telp Kosong !!!");
                return false;
            }
            return true;
        }


        $('#form').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            var dataform = new FormData(form);
            var btnsubmit = document.getElementById("btnsubmit");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $(form).attr('action'),
                method: "POST",
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },

                success: function(res) {

                    Swal.fire({
                        icon: "success",
                        title: `${res.message}`,
                    });
                    window.location = res.url;



                },
                error: function(error) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })

                    btnsubmit.disabled = false;


                }
            });
        });
    </script>
@endpush
