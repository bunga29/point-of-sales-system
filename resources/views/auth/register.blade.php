@extends('layouts.authtemplate')

@section('content')
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/big_clown.png" alt="">
                <!-- <span class="d-none d-lg-block">Admin</span> -->
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Daftar Akun Baru</h5>
                  <p class="text-center small">Masukkan data diri Anda!</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="row g-3" >
                  @csrf
                  <div class="col-12">
                    <label for="name" class="form-label">Nama Anda</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="invalid-feedback">Masukkan Nama Anda Woi!</div>
                  </div>

                  <div class="col-12">
                    <label for="email" class="form-label">Email Anda</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <div class="invalid-feedback">Masukkan Email Anda yang Bener!</div>
                  </div>

                  <div class="col-12">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <div class="invalid-feedback">Masukkan Kata Sandi Anda!</div>
                  </div>

                  <div class="col-12">
                    <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <!-- <div class="invalid-feedback">Masukkan Kata Sandi Anda!</div> -->
                  </div>

                  <!-- <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                      <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                      <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                  </div> -->
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Daftar Akun</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Sudah punya akun? <a href="/login">Masuk</a></p>
                  </div>
                </form>

              </div>
            </div>

            <!-- <div class="credits">
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div> -->

          </div>
        </div>
      </div>

    </section>

  </div>
@endsection
