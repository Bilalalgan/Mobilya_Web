@extends('admin.layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Kullanıcı Yönetimi')])

@section('content')

  <style>
    @media (max-width: 767px) {
        #serachinputgroup {
            width: 80% !important;
            margin-left: 3% !important;
        }
    }

  </style>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Kullanıcılar</h4>
              <p class="card-category"> Burada kullanıcıları yönetebilirsiniz.</p>
            </div>
            <div class="card-body">
              @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" id="statusAlert" role="alert">
                  {{ session('status') }}
                </div>
              @endif
              <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                  <div></div>
                  <form class="navbar-form my-2 my-md-0 " method="GET" action="{{ route('user.index') }}">
                      <div class="input-group  w-100" id="serachinputgroup">
                          <input type="text" name="search" value="{{ request()->get('search') }}" style="width:50%" class="form-control" placeholder="Kullanıcı Ara...">
                          <button type="submit" class="btn btn-success btn-round btn-just-icon">
                              <i class="material-icons">search</i>
                              <div class="ripple-container"></div>
                          </button>
                      </div>
                  </form>
                  <a href="{{ route('user.create') }}" class="btn btn-success my-2 my-md-0 h-50">Kullanıcı Ekle</a>
              </div>

              <div class="table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <th>İsim</th>
                    <th>Email</th>
                    <th>Oluşturulma Tarihi</th>
                    <th class="text-right">Aksiyonlar</th>
                  </thead>
                  <tbody>
                    @if($users->isEmpty())
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-warning d-flex justify-content-center" role="alert">
                                    <i class="material-icons text-white mx-2">warning</i>
                                    <span style="font-size: 1.1rem; margin-top:.1rem">Kayıt Bulunamadı.</span>
                                </div>
                            </td>
                        </tr>
                    @else
                      @foreach($users as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->created_at->format('Y-m-d') }}</td>
                          <td class="td-actions text-right">
                            @if ($user->id != auth()->id())
                              <form action="{{ route('user.destroy', $user) }}" method="post">
                                @csrf
                                @method('delete')
                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" title="Düzenle">
                                  <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-link" onclick="confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?') ? this.parentElement.submit() : ''">
                                  <i class="material-icons">close</i>
                                </button>
                              </form>
                            @else
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin.profile.edit') }}" title="Profil Düzenle">
                                <i class="material-icons">edit</i>
                              </a>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
                <div class="d-flex justify-content-center">
                  {{ $users->links('pagination::bootstrap-5') }}
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
        // 2 saniye sonra alerti kapat
        setTimeout(function () {
            var alert = document.getElementById("statusAlert");
            if (alert) {
                alert.classList.remove("show"); // Görünürlük sınıfını kaldır
                alert.classList.add("d-none");    // Yavaşça kaybolma efekti
            }
        }, 2000);
    });
</script>
@endsection
