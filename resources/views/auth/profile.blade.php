@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin-top: 5%">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pengaturan Profile</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
              <div class="col-md-3">
                <img src="{{asset('storage/'.Auth::user()->photo)}}" alt="" class="img-thumbnail">
              </div>
              <div class="col-md-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Data Diri</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Password</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent" style="padding: 20px">
                  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form method="POST" action="{{ route('applicant.update', ['user' => Auth::user()->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{Auth::user()->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{Auth::user()->email}}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                              <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                              <div class="col-md-6">
                                  <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{Auth::user()->birthday}}" required autofocus>

                                  @if ($errors->has('birthday'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('birthday') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                              <div class="col-md-6">
                                  <div class="form-check form-check-inline">
                                    <input name="gender" class="form-check-input" type="radio" id="inlineRadio1" value="male">
                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input name="gender" class="form-check-input" type="radio" id="inlineRadio2" value="female">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                  </div>

                                  @if ($errors->has('gender'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('gender') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                              <div class="col-md-6">
                                  <textarea name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required autofocus>{{Auth::user()->address}}</textarea>

                                  @if ($errors->has('address'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('address') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                                <label for="originSchool" class="col-md-4 col-form-label text-md-right">{{ __('SMA Asal') }}</label>

                                <div class="col-md-6">
                                    <input id="originSchool" type="text" class="form-control{{ $errors->has('originSchool') ? ' is-invalid' : '' }}" name="originSchool" value="{{Auth::user()->originSchool}}" required autofocus>

                                    @if ($errors->has('originSchool'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('originSchool') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                              <label for="graduateAt" class="col-md-4 col-form-label text-md-right">{{ __('Lulus Tahun') }}</label>

                              <div class="col-md-6">
                                  <input id="graduateAt" type="number" class="form-control{{ $errors->has('graduateAt') ? ' is-invalid' : '' }}" name="graduateAt" value="{{Auth::user()->graduateAt}}" required autofocus>

                                  @if ($errors->has('graduateAt'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('graduateAt') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>


                            <div class="form-group row">
                              <label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Nilai rata-rata UN') }}</label>

                              <div class="col-md-6">
                                  <input id="score" type="number" class="form-control{{ $errors->has('score') ? ' is-invalid' : '' }}" name="score" value="{{Auth::user()->score}}" required autofocus>

                                  @if ($errors->has('score'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('score') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>


                            <div class="form-group row">
                              <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                              <div class="col-md-6">
                                <div class="custom-file">
                                  <input type="file" name="photo" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Pilih foto</label>
                                </div>

                                  @if ($errors->has('photo'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('photo') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row mb-0">
                              <button type="submit" class="btn btn-primary full-width">
                                  {{ __('Simpan') }}
                              </button>
                            </div>
                          </div>
                        </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <form action="{{route('applicant.password.update',['user' => Auth::user()->id ])}}" method="post">
                      @csrf
                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>

                          <div class="col-md-6">
                              <input id="passwordOld" type="password" class="form-control{{ $errors->has('passwordOld') ? ' is-invalid' : '' }}" name="passwordOld" required>

                              @if ($errors->has('passwordOld'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('passwordOld') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <button type="submit" class="btn btn-primary full-width">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
