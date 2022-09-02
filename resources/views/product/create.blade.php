@extends('layouts.template')

@section('content')
    @if (count($errors) > 0)
         <div class = "alert alert-danger" role="alert">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
    @endif
    
    @if (Session::has('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('successMsg') }}
        </div>
    @endif
    <div class="pagetitle">
      <h1>Tambah Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Produk</li>
          <li class="breadcrumb-item active">Tambah Produk</li>
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
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="code" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-7">
                                    <input name="code" type="text" id="random-code" name="random-code" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <input  class="btn btn-secondary" type="button" value="Generate Code" onclick="randomCode();" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                <select class="form-select" name="category_id"  aria-label="Default select example">
                                    <option selected>Pilih Kategori</option>
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="qty" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                <input type="number" name="qty" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="restock_qty" class="col-sm-2 col-form-label">Jumlah untuk restock</label>
                                <div class="col-sm-10">
                                <input type="number" name="restock_qty" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="buying_price" class="col-sm-2 col-form-label">Harga Beli</label>
                                <div class="col-sm-10">
                                <input type="text" name="buying_price" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="selling_price" class="col-sm-2 col-form-label">Harga Jual</label>
                                <div class="col-sm-10">
                                <input type="text" name="selling_price" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label form-check-label" for="flexSwitchCheckChecked">Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" type="checkbox"  checked>   
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambahkan Produk</button>
                                </div>
                            </div>
            
                        </form><!-- End General Form Elements -->
            
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>    
        function random() {
            return Math.floor(Math.random() * 1000000000);
        }

        function randomCode() {
            document.getElementById('random-code').value = random();
        }
    </script>
@endsection