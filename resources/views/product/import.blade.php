@extends('layouts.template')

@section('content')
@if (Session::has('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('successMsg') }}
        </div>
    @endif
    <div class="pagetitle">
      <h1>Import Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Produk</li>
          <li class="breadcrumb-item active">Import Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="col">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <h2> Download template 
                        <span><a href="/product/import-template/download">disini </a></span>
                        </h2>
                        <!-- General Form Elements -->
                        <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="file">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Import Data</button>
                                </div>
                            </div>
            
                        </form><!-- End General Form Elements -->
            
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection