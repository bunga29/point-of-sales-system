@extends('layouts.template')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col">
          <div class="card">
            <div class="card-header">
              Verifikasi Email Anda
            </div>
            <div class="card-body">
              @if (session('resent'))
                  <div class="alert alert-success" role="alert">
                      Link verifikasi sudah dikirim ke email Anda!
                  </div>
              @endif

              
              Silahkan cek Anda untuk melakukan verifikasi!
              Jika kamu tidak menerima email verifikasi,
              <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                  @csrf
                  <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Klik disini untuk kirim ulang</button>.
              </form>
            </div>
          </div>

        </div>

    </div>
    
  </div>
@endsection