@extends('admin.layouts.app', ['activePage' => 'role-management', 'titlePage' => __('Rol Yönetimi')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Roller</h4>
              <p class="card-category"> Burada rolleri yönetebilirsiniz.</p>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" id="statusAlert" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" id="errorAlert" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <div class="d-flex justify-content-between mb-3">
                <div></div>
                <form class="navbar-form" method="GET" action="{{ route('role.index') }}">
                  <div class="input-group no-border">
                    <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Rol Ara...">
                    <button type="submit" class="btn btn-primary btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                  </div>
                </form>
                <a href="{{ route('role.create') }}" class="btn btn-primary">Rol Ekle</a>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <th>Rol Adı</th>
                    <th>Kullanıcı Sayısı</th>
                    <th class="text-right">Aksiyonlar</th>
                  </thead>
                  <tbody>
                    @if($roller->isEmpty())
                        <tr>
                            <td colspan="3">
                                <div class="alert alert-warning d-flex justify-content-center" role="alert">
                                    <i class="material-icons text-white mx-2">warning</i>
                                    <span style="font-size: 1.1rem; margin-top:.1rem">Kayıt Bulunamadı.</span>
                                </div>
                            </td>
                        </tr>
                    @else
                      @foreach($roller as $rol)
                        <tr>
                          <td>{{ $rol->name }}</td>
                          <td>{{ $rol->users()->count() }}</td>
                          <td class="td-actions text-right">
                              <form action="{{ route('role.destroy', $rol) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('role.edit', $rol) }}" title="Düzenle">
                                  <i class="material-icons">edit</i>
                                  </a>
                                  <button type="button" class="btn btn-info btn-link" onclick="showRoleUsers({{ $rol->id }})">
                                  <i class="material-icons">group</i> <!-- Kullanıcıları Göster İkonu -->
                                  </button>
                                  <button type="button" class="btn btn-danger btn-link" onclick="confirm('Bu rolü silmek istediğinize emin misiniz?') ? this.parentElement.submit() : ''">
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
                  {{ $roller->links('pagination::bootstrap-5') }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Kullanıcıları Göster Modalı -->
    <div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="usersModalLabel">Roldeki Kullanıcılar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Kullanıcı Listesi -->
            <ul id="userList" class="list-group">
            <!-- Dinamik olarak kullanıcılar buraya yüklenecek -->
            </ul>
            <!-- Sayfalama -->
            <nav aria-label="Sayfalama">
            <ul class="pagination justify-content-center" id="paginationControls">
                <!-- Sayfalama düğmeleri dinamik olarak buraya eklenecek -->
            </ul>
            </nav>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        </div>
        </div>
    </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(function () {
                var successAlert = document.getElementById("statusAlert");
                var errorAlert = document.getElementById("errorAlert");

                if (successAlert) {
                    successAlert.classList.remove("show");
                    successAlert.classList.add("d-none");
                }

                if (errorAlert) {
                    errorAlert.classList.remove("show");
                    errorAlert.classList.add("d-none");
                }
            }, 3000); // 2 saniye sonra kapatma
        });
    </script>



    <script>
        function showRoleUsers(roleId, page = 1) {
            // AJAX isteği ile kullanıcıları al, sayfa bilgisi ekle
            fetch(`/admin/roller/${roleId}/users?page=${page}`)
            .then(response => response.json())
            .then(data => {
                const userList = document.getElementById('userList');
                const paginationControls = document.getElementById('paginationControls');
                userList.innerHTML = ''; // Eski kullanıcıları temizle
                paginationControls.innerHTML = ''; // Eski sayfalama düğmelerini temizle

                // Kullanıcıları liste olarak ekleyin
                data.users.forEach(user => {
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
                listItem.innerHTML = `
                    ${user.id} - ${user.name} - ${user.email}
                    <a href="/admin/user/edit/${user.id}" class="btn btn-sm btn-primary">Git</a>
                `;
                userList.appendChild(listItem);
                });

                // Sayfalama kontrolleri
                if (data.pagination.prev_page_url) {
                const prevButton = document.createElement('li');
                prevButton.classList.add('page-item');
                prevButton.innerHTML = `
                    <a class="page-link" href="javascript:void(0);" onclick="showRoleUsers(${roleId}, ${data.pagination.current_page - 1})">
                    Önceki
                    </a>
                `;
                paginationControls.appendChild(prevButton);
                }

                if (data.pagination.next_page_url) {
                const nextButton = document.createElement('li');
                nextButton.classList.add('page-item');
                nextButton.innerHTML = `
                    <a class="page-link" href="javascript:void(0);" onclick="showRoleUsers(${roleId}, ${data.pagination.current_page + 1})">
                    Sonraki
                    </a>
                `;
                paginationControls.appendChild(nextButton);
                }

                // Modalı aç
                $('#usersModal').modal('show');
            })
            .catch(error => console.error('Hata:', error));
        }
    </script>

@endsection
