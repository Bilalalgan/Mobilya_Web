@extends('admin.layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Kullanıcı Yönetimi')])

@section('content')
  <style>
      .radio-group {
        display: flex;
        flex-direction: column;
      }

      .radio-label {
        display: flex;
        align-items: center;
        padding: 0.5em;
        margin-bottom: 0.5em;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: background-color 0.2s, border-color 0.2s;
      }

      .radio-label:hover {
        background-color: #f3e5f5;
      }

      .radio-input {
        position: absolute;
        opacity: 0;
      }

      .radio-input:checked + .radio-label {
        background-color: #03a9f4;
        border-color: #03a9f4;
        color: #fff;
      }

      .radio-input:focus + .radio-label {
        outline: 2px solid #03a9f4;
      }

      .radio-inner-circle {
        display: inline-block;
        width: 1em;
        height: 1em;
        border: 2px solid #888;
        border-radius: 50%;
        margin-right: 0.5em;
        transition: border-color 0.2s;
        position: relative;
      }

      .radio-label:hover .radio-inner-circle {
        border-color: #03a9f4;
      }

      .radio-input:checked + .radio-label .radio-inner-circle {
        border-color: #fff;
      }

      .radio-input:checked + .radio-label .radio-inner-circle::after {
        content: '';
        display: block;
        width: 0.5em;
        height: 0.5em;
        background-color: #03a9f4;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
  </style>



  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal"> <!-- Action eklendi -->
            @csrf
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Kullanıcı Ekle') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-success">{{ __('Listeye Dön') }}</a>
                  </div>
                </div>
                <div class="row  mb-3">
                  <label class="col-sm-2 col-form-label">{{ __('İsim') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="İsim" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row  mb-3">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="Email" value="{{ old('email') }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row  mb-3">
                  <label class="col-sm-2 col-form-label">{{ __('Şifre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" id="input-password" placeholder="Şifre" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">{{ __('Şifreyi Doğrula') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="Şifreyi Doğrula" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Kullanıcı Ekle</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
