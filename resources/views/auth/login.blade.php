@extends('auth.template')

@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="card mb-3">

            <div class="card-body">

              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Halaman Login</h5>
                <p class="text-center small">Masukkan Username dan Password untuk Login</p>
              </div>

            <!-- Alert -->
            @if ($message = Session::get('error'))
              <script>window.alert("{{ $message }}")</script>
            @endif

              <form method="POST" action="{{ route('postLogin.store') }}" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                  <label for="Username" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" required>
                    <div class="invalid-feedback">Masukkan username anda !</div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="Password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password" required>
                  <div class="invalid-feedback">Masukkan password anda !</div>
                </div>

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
                 <div class="col-12">
                     <a href="/" class="btn btn-danger w-100">Kembali</a>
                  </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>

</section>
@endsection
