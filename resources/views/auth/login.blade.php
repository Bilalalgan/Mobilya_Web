@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row g-0">
                    <!-- Sol taraf: Logo veya görsel -->
                    <div class="col-md-5 d-flex align-items-center justify-content-center bg-light">
                        <img src="{{ asset('images/icons/logo-01.png') }}" alt="Logo" class="img-fluid p-4" style="max-height: 200px;">
                    </div>
                    <!-- Sağ taraf: Giriş formu -->
                    <div class="col-md-7">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">E-Posta</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Şifre</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Giriş Yap
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- card-body -->
                    </div> <!-- col-md-7 -->
                </div> <!-- row -->
            </div> <!-- card -->
        </div> <!-- col-md-10 -->
    </div> <!-- row -->
</div> <!-- container -->
@endsection
