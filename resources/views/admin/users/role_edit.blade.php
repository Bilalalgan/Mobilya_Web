@extends('admin.layouts.app', ['activePage' => 'role-management', 'titlePage' => __('Rol Düzenle')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('role.update', $role) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Rol Düzenle</h4>
                <p class="card-category">Bu sayfadan rol bilgilerini güncelleyebilirsiniz.</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <label class="col-sm-2 col-form-label">Rol İsmi</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="Rol İsmi" value="{{ old('name', $role->name) }}" required />
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
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
