@extends('layouts.template')

@section('content')
    <div class="pagetitle">
      <h1>Daftar Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Produk</li>
          <li class="breadcrumb-item active">Daftar Produk</li>
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
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                    ?>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td scope="row">{{ $product->code }}</td>
                        <td scope="row">{{ $product->name }}</td>
                        <td scope="row">{{ $product->category->name }}</td>
                        <td scope="row">{{ $product->selling_price }}</td>
                        <td scope="row">{{ $product->qty }}</td>
                        <td><button class="btn btn-warning" onclick="get({{$product->id}});"><i class="bi bi-info-square"></i></button>
                            <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></td>
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
              <!-- End Default Table  -->
            </div>
        </div>
    </section>

    <div class="modal fade" id="detail-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Kode</div>
                <div class="col-lg-6 col-md-8" id="product-code"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Nama</div>
                <div class="col-lg-6 col-md-8" id="product-name"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Kategori</div>
                <div class="col-lg-6 col-md-8" id="product-category"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Harga Beli</div>
                <div class="col-lg-6 col-md-8" id="product-buying-price"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Harga Jual</div>
                <div class="col-lg-6 col-md-8" id="product-selling-price"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Sisa Stok</div>
                <div class="col-lg-6 col-md-8" id="product-qty"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Stok Batas</div>
                <div class="col-lg-6 col-md-8" id="product-restock-qty"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Status</div>
                <div class="col-lg-6 col-md-8" id="product-status"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Tanggal ditambahkan</div>
                <div class="col-lg-6 col-md-8" id="product-created-at"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Ditambahkan oleh</div>
                <div class="col-lg-6 col-md-8" id="product-created-by"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Tanggal terakhir diubah</div>
                <div class="col-lg-6 col-md-8" id="product-updated-at"></div>
            </div>
            <div class="row m-2">
                <div class="col-lg-6 col-md-4 label ">Diubah terakhir oleh</div>
                <div class="col-lg-6 col-md-8" id="product-updated-by"></div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div><!-- End Vertically centered Modal-->
    <script>
        function get(id)
        {
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/product/' + id,
                dataType: 'json',
                success: function (data) {
                    $('#detail-modal').modal('show');
                    $('#product-code').text(data['code']);
                    $('#product-name').text(data['name']);
                    $('#product-category').text(data['category']['name']);
                    $('#product-buying-price').text(data['buying_price']);
                    $('#product-selling-price').text(data['selling_price']);
                    $('#product-qty').text(data['qty']);
                    $('#product-restock-qty').text(data['restock_qty']);
                    $('#product-created-at').text(data['created_at']);
                    $('#product-created-by').text(data['created_by']);
                    $('#product-updated-at').text(data['updated_at']);
                    $('#product-updated-by').text(data['updated_by']);

                    if(data['status'])
                        $('#product-status').text('Aktif');
                    else
                        $('#product-status').text('Tidak Aktif');
                    console.log(data);
                    
                },error:function(){ 
                    console.log(data['id']);
                }
            });

        }
    </script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
        
    </script>
    
@endsection