@extends('admin.layouts.app', ['activePage' => 'yurt-management', 'titlePage' => __('Yurt Güncelle')])

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

      .custom-file-upload {
        position: relative;
        display: flex;
        align-items: center;
        }

        .custom-file-upload input[type="file"] {
        position: absolute;
        opacity: 0;
        z-index: 2;
        cursor: pointer;
        width: 100%;
        height: 100%;
        }

        .file-label {
        background-color: #4caf50;
        color: white;
        padding: 8px 20px;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s;
        }

        .file-label:hover {
        background-color: #43a047;
        }

        .file-label i {
        margin-right: 8px;
        }

        #file-chosen {
        margin-left: 15px;
        color: #555;
        font-size: 0.9em;
        }

  </style>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('admin.yurtlar.update', $yurt->id) }}" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Yurt Güncelle') }}</h4>
                <p class="card-category">{{ __('Yurdu güncelleyin') }}</p>
              </div>
              <div class="card-body">
                <div class="row mb-3 ">
                  <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3">İsim</label>
                  <div class="col-sm-5 mb-3">
                    <input type="text" class="form-control" name="isim" placeholder="Yurt İsmi" value="{{ old('isim', $yurt->isim) }}" required>
                  </div>
                  <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3">Yurt Tipi</label>
                  <div class="col-sm-5 mb-3">
                    <input type="text" class="form-control" name="yurt_tipi" placeholder="Yurt Tipi" value="{{ old('yurt_tipi', $yurt->yurt_tipi) }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3">Ücret</label>
                  <div class="col-sm-5 mb-3">
                    <input type="number" class="form-control" name="ucret" placeholder="Ücret" value="{{ old('ucret', $yurt->ucret) }}">
                  </div>
                  <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3">Şehir</label>
                  <div class="col-sm-5 mb-3">
                    <input type="text" class="form-control" name="sehir" placeholder="Şehir" value="{{ old('sehir', $yurt->sehir) }}">
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3">İlçe</label>
                    <div class="col-sm-5 mb-3">
                        <input type="text" class="form-control" name="ilce" placeholder="İlçe" value="{{ old('ilce', $yurt->ilce) }}">
                    </div>
                    <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3">Telefon</label>
                    <div class="col-sm-5 mb-3">
                        <input type="text" class="form-control" name="telefon" placeholder="Telefon" value="{{ old('telefon', $yurt->telefon) }}">
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3">Adres</label>
                  <div class="col-sm-11 mb-3">
                    <textarea class="form-control" name="adres" placeholder="Adres">{{ old('adres', $yurt->adres) }}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3">Kayıt Belgeleri</label>
                  <div class="col-sm-5 mb-3">
                    <textarea class="form-control" name="kayit_icin_belgeler" placeholder="Kayıt İçin Belgeler">{{ old('kayit_icin_belgeler', $yurt->kayit_icin_belgeler) }}</textarea>
                  </div>
                  <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3">Yurt Başvurusu</label>
                  <div class="col-sm-5 mb-3">
                    <textarea class="form-control" name="yurt_basvurusu" placeholder="Yurt Başvurusu">{{ old('yurt_basvurusu', $yurt->yurt_basvurusu) }}</textarea>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-1 col-form-label bg-success text-white h-50 rounded mb-3" style="margin-right: 0.7rem !important">Cinsiyet</label>
                    <div class="col-sm-2 border p-3 mb-3">
                        <div class="radio-group">
                            <input class="radio-input" type="radio" name="cinsiyet" id="cinsiyet_erkek" value="Erkek" {{ $yurt->cinsiyet == 'Erkek' ? 'checked' : '' }}>
                            <label class="radio-label" for="cinsiyet_erkek">
                                <span class="radio-inner-circle"></span>
                                Erkek
                            </label>
                        </div>
                        <div class="radio-group mt-2">
                            <input class="radio-input" type="radio" name="cinsiyet" id="cinsiyet_kadin" value="Kız" {{ $yurt->cinsiyet == 'Kız' ? 'checked' : '' }}>
                            <label class="radio-label" for="cinsiyet_kadin">
                                <span class="radio-inner-circle"></span>
                                Kız
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-7 mb-3">
                        <div class="custom-file-upload">
                          <input type="file" id="fotograflar" name="fotograflar[]" multiple accept="image/*">
                          <label for="fotograflar" class="file-label">
                              <i class="material-icons">cloud_upload</i>
                              Fotoğrafları Seç
                          </label>
                          <span id="file-chosen">Henüz dosya seçilmedi</span>
                        </div>
                    </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Güncelle</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('fotograflar').addEventListener('change', function() {
        const fileChosen = document.getElementById('file-chosen');
        if (this.files.length > 0) {
            fileChosen.textContent = `${this.files.length} dosya seçildi`;
        } else {
            fileChosen.textContent = 'Henüz dosya seçilmedi';
        }
    });
  </script>
@endsection
