@extends('admin.layouts.app', ['activePage' => 'yurt-management', 'titlePage' => __('Yurt Yönetimi')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Yurtlar</h4>
              <p class="card-category"> Burada yurtları yönetebilirsiniz.</p>
            </div>
            <div class="card-body">
              @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" id="statusAlert" role="alert">
                  {{ session('status') }}
                </div>
              @endif
              <div class="d-flex justify-content-between mb-3">
                <div></div>
                <form class="navbar-form" method="GET" action="{{ route('admin.yurtlar.index') }}">
                  <div class="input-group no-border">
                    <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Yurt Ara...">
                    <button type="submit" class="btn btn-primary btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                  </div>
                </form>
                <a href="{{ route('admin.yurtlar.create') }}" class="btn btn-primary">Yurt Ekle</a>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <th>İsim</th>
                    <th>Cinsiyet</th>
                    <th>Yurt Tipi</th>
                    <th>Ücret</th>
                    <th>Şehir</th>
                    <th>İlçe</th>
                    <th class="text-right">Aksiyonlar</th>
                  </thead>
                  <tbody>
                    @if($yurtlar->isEmpty())
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-warning d-flex justify-content-center" role="alert">
                                    <i class="material-icons text-white mx-2">warning</i>
                                    <span style="font-size: 1.1rem; margin-top:.1rem">Kayıt Bulunamadı.</span>
                                </div>
                            </td>
                        </tr>
                    @else
                      @foreach($yurtlar as $yurt)
                        <tr>
                          <td>{{ $yurt->isim }}</td>
                          <td>{{ $yurt->cinsiyet }}</td>
                          <td>{{ $yurt->yurt_tipi }}</td>
                          <td>{{ $yurt->ucret }}</td>
                          <td>{{ $yurt->sehir }}</td>
                          <td>{{ $yurt->ilce }}</td>
                          <td class="td-actions text-right">
                            <form action="" method="post">
                              @csrf
                              @method('delete')
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin.yurtlar.edit', $yurt->id) }}" title="Düzenle">
                                  <i class="material-icons">edit</i>
                              </a>
                              <button type="button" class="btn btn-danger btn-link" onclick="confirm('Bu yurdu silmek istediğinize emin misiniz?') ? this.parentElement.submit() : ''">
                                <i class="material-icons">close</i>
                              </button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
                <div class="d-flex justify-content-center">
                  {{ $yurtlar->links('pagination::bootstrap-5') }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            var alert = document.getElementById("statusAlert");
            if (alert) {
                alert.classList.remove("show");
                alert.classList.add("d-none");
            }
        }, 2000);
    });
  </script>
@endsection
