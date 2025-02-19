@extends('admin.layouts.app', ['activePage' => 'role-management', 'titlePage' => __('Rol Ekle')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('role.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card">
              <div class="card-header card-header-primary"> 
                <h4 class="card-title">Rol Ekle</h4>
                <p class="card-category">Yeni bir rol ekleyin</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <label class="col-sm-2 col-form-label">Rol Adı</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="Rol Adı" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Rol Ekle</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
