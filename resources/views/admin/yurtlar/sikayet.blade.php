@extends('admin.layouts.app', ['activePage' => 'sikayet-management', 'titlePage' => __('Yorum Şikayetleri Yönetimi')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Yorum Şikayetleri</h4>
              <p class="card-category">Eğer tik işaretini seçerseniz yorum silinecektir, x işareti ile şikayet silinecektir.</p>
            </div>
            <div class="card-body">
              @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" id="statusAlert" role="alert">
                  {{ session('status') }}
                </div>
              @endif
              <div class="d-flex justify-content-center mb-3">
                <form class="navbar-form" method="GET" action="{{ route('admin.yorum_sikayetleri.index') }}">
                  <div class="input-group no-border">
                    <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Şikayet Ara...">
                    <button type="submit" class="btn btn-primary btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                  </div>
                </form>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <th>Yorum Yapan</th>
                    <th>Yurt</th>
                    <th>Yorum</th>
                    <th>Şikayet Eden</th>
                    <th class="text-right">Aksiyonlar</th>
                  </thead>
                  <tbody>
                    @if($sikayetler->isEmpty())
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-warning d-flex justify-content-center" role="alert">
                                    <i class="material-icons text-white mx-2">warning</i>
                                    <span style="font-size: 1.1rem; margin-top:.1rem">Kayıt Bulunamadı.</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($sikayetler as $sikayet)
                        <tr>
                            <td>{{ $sikayet->yorumYapan->name ?? 'Bilinmiyor' }}</td>
                            <td>{{ $sikayet->yurt->isim ?? 'Bilinmiyor' }}</td>
                            <td>{{ $sikayet->yorum_metni }}</td>
                            <td>{{ $sikayet->sikayetci->name ?? 'Bilinmiyor' }}</td>
                            <td class="td-actions text-right d-flex justify-content-end" style="font-size:1.4rem">
                                <!-- Şikayeti Onayla ve Yorum+Şikayet Sil -->
                                <form action="{{ route('yorum_sikayetleri.onayla', $sikayet->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-success btn-link" onclick="confirm('Bu button şikayeti onaylıyorsunuz anlamına gelmektedir. Yorum ve şikayeti silmek istediğinize emin misiniz ?') ? this.parentElement.submit() : ''">
                                        <i class="material-icons">check_circle</i>
                                    </button>
                                </form>

                                <!-- Yalnızca Şikayeti Sil -->
                                <form action="{{ route('yorum_sikayetleri.reddet', $sikayet->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-link" onclick="confirm('Bu button şikayeti onaylamadığınız anlamına gelmektedir. Şikayeti silmek istediğinize emin misiniz ?') ? this.parentElement.submit() : ''">
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
                  {{ $sikayetler->links('pagination::bootstrap-5') }}
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
        }, 3000); // 3 saniye sonra kaybolur
    });
  </script>
@endsection
