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
      <h1>Tambah Order</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Order</li>
          <li class="breadcrumb-item active">Tambah Order</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Produk</h5>

                        <div class="search-bar">
                            <div id="myDropdown" class="dropdown">
                                <input class="col-lg-6" type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                                <a hidden class="col-lg-6 dropdown-item" style="width:50%" href="#blog">Blog</a>
                                <a hidden class="col-lg-6 dropdown-item" style="width:50%" href="#blog">Blog aaa</a>
                                <a hidden class="col-lg-6 dropdown-item" style="width:50%" href="#blog">aaa ddsafog</a>
                               
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        safh
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script>

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                    a[i].removeAttribute("hidden"); 
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>
@endsection