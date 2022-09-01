@extends('layouts.template')

@section('content')
    @if (!empty($successMsg))
        <div class="alert alert-success" role="alert">
            {{ $successMsg }}
        </div>
    @endif
    <div class="pagetitle">
      <h1>Tambah Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Kategori</li>
          <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="col">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
            
                        <!-- General Form Elements -->
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="code" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                <input type="text" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                <input type="text"  name="name" class="form-control">
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambahkan Kategori</button>
                                </div>
                            </div>
            
                        </form><!-- End General Form Elements -->
            
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection