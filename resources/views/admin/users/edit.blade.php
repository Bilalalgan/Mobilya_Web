@extends('admin.layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Kullanıcı Yönetimi')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Kullanıcı Güncelleme Formu -->
          <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off" class="form-horizontal">
              @csrf
              @method('put')
              <div class="card">
                  <div class="card-header card-header-primary">
                      <h4 class="card-title">Kullanıcı Güncelle</h4>
                  </div>
                  <div class="card-body">
                      <!-- Kullanıcı Bilgileri Alanları -->
                      <div class="row">
                        <div class="col-md-12 text-right">
                          <a href="{{ route('user.index') }}" class="btn btn-sm btn-success">{{ __('Listeye Dön') }}</a>
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">İsim</label>
                          <div class="col-sm-7">
                              <input class="form-control" name="name" id="input-name" type="text" placeholder="İsim" value="{{ old('name', $user->name) }}" required>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-7">
                              <input class="form-control" name="email" id="input-email" type="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="input-password">Yeni Şifre</label>
                          <div class="col-sm-7">
                              <input class="form-control" type="password" name="password" id="input-password" placeholder="Şifre">
                          </div>
                      </div>
                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="input-password-confirmation">Şifre Tekrar</label>
                          <div class="col-sm-7">
                              <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="Şifre Tekrar">
                          </div>
                      </div>
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary">Kaydet</button>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection