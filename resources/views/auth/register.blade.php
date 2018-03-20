@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Daftar Akun') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                          <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                          <div class="col-md-6">
                              <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ old('birthday') }}" required autofocus>

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
                              {{-- <input id="graduateAt" type="text" class="form-control{{ $errors->has('graduateAt') ? ' is-invalid' : '' }}" name="graduateAt" value="{{ old('graduateAt') }}" required autofocus> --}}
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
                              <textarea name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus></textarea>

                              @if ($errors->has('address'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="originSchool" class="col-md-4 col-form-label text-md-right">{{ __('SMA Asal') }}</label>

                            <div class="col-md-6">
                                <input id="originSchool" type="text" class="form-control{{ $errors->has('originSchool') ? ' is-invalid' : '' }}" name="originSchool" value="{{ old('originSchool') }}" required autofocus>

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
                              <input id="graduateAt" type="number" class="form-control{{ $errors->has('graduateAt') ? ' is-invalid' : '' }}" name="graduateAt" value="{{ old('graduateAt') }}" required autofocus>

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
                              <input id="score" type="number" class="form-control{{ $errors->has('score') ? ' is-invalid' : '' }}" name="score" value="{{ old('score') }}" required autofocus>

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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary full-width">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
