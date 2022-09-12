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
                        <h5 class="card-title text-center pb-0 fs-4">Masuk ke Akun Anda</h5>
                        <p class="text-center small">Masukkan email dan kata sandi Anda</p>
                    </div>

                    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input  id="email" type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                <div class="invalid-feedback">Masukkan email Anda</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                            <div class="invalid-feedback">Masukkan kata sandi Anda!</div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Masuk</button>
                        </div>
                        @if (Route::has('password.request'))
                            <div class="col-12">
                                <p class="small mb-0"><a href="{{ route('password.request') }}">Lupa kata sandi? </a></p>
                            </div>
                        @endif
                        <div class="col-12">
                            <p class="small mb-0">Belum punya Akun? <a href="/register">Buat akun baru</a></p>
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
