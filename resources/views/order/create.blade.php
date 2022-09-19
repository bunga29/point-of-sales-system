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
                                
                                @foreach($products as $product)
                                    <a hidden class="col-lg-6 dropdown-item" style="width:50%" onclick="addRow( '<?=$product->code?>' ,'<?=$product->name?>', '<?=$product->selling_price?>')">{{$product->code}} - {{$product->name}}</a>
                                @endforeach                               
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="h4">Total Harga</div>
                        <div class="h1 total-price">0</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Produk</h5>
              <!-- <p>Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p> -->
              <!-- Bordered Table -->
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Harga Total</th>
                  </tr>
                </thead>
                <tbody>
                 
                </tbody>
              </table>
              <!-- End Bordered Table -->
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

        function addRow(code, name, price) {
            var table = document.getElementById("myTable");
            var x = document.getElementById("myTable").rows.length;
            var row = table.insertRow(x);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            cell1.innerHTML = "<input type='hidden' class='form-control' value='" + code + "'/>" + x;
            cell2.innerHTML = code;
            cell3.innerHTML = name;
            cell4.classList.add("amount");
            cell4.innerHTML = "<input type='number' style='width: 5em' class='form-control' value='1'/>"
            cell5.classList.add("cost");
            cell6.innerHTML = price;
            cell6.classList.add("total");
            cell5.innerHTML = price;
            var $amountInput = $('td.amount > input[type="number"]');
            $amountInput.on('input', updateTotal);
        }

        function updateTotal(e){
            var amount = parseInt(e.target.value);
            
            if (!amount || amount < 0)
                return;
                
            var $parentRow = $(e.target).parent().parent();
            var cost = parseFloat($parentRow.find('.cost').text());
            var total = (cost * amount);
            
            $parentRow.find('.total').text(total);
            
            var sum = 0;
            $(".total").each(function(){
                sum = sum + Number($(this).text());
            });

            $('.total-price').text(sum);
            
            var parentRow = $(e.target).parent().parent();

            var cost = parseFloat($parentRow.find('.cost').text());
            
        }
    </script>





@endsection