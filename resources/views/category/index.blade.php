@extends('layouts.template')

@section('content')
    @if (!empty($successMsg))
        <div class="alert alert-success" role="alert">
            {{ $successMsg }}
        </div>
    @endif
    <div class="pagetitle">
      <h1>Daftar Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Kategori</li>
          <li class="breadcrumb-item active">Daftar Kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                    ?>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td scope="row">{{ $category->code }}</td>
                        <td scope="row">{{ $category->name }}</td>
                        <td><button class="btn btn-warning"><i class="bi bi-info-square"></i></button>
                            <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></td>
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
              <!-- End Default Table  -->
            </div>
        </div>
    </section>
@endsection