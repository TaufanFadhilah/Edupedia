@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row" style="margin-top : 5%">
      <div class="col-md-12">
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
            <div class="row" style="padding: 20px">
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
                <div class="tab-content" id="myTabContent" style="padding:20px">
                  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                      <div class="col-md-6">
                        <form method="POST" action="{{ route('university.update',['university' => Auth::user()->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

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
                                <label for="decree" class="col-md-4 col-form-label text-md-right">{{ __('Nomor SK') }}</label>

                                <div class="col-md-6">
                                    <input id="decree" type="text" class="form-control{{ $errors->has('decree') ? ' is-invalid' : '' }}" name="decree" value="{{Auth::user()->decree}}" required autofocus>

                                    @if ($errors->has('decree'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('decree') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                <div class="col-md-6">
                                    <textarea name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">{{Auth::user()->address}}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Negara') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{Auth::user()->country}}" required autofocus>

                                    @if ($errors->has('country'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                                <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

                                <div class="col-md-6">
                                    <input id="website" type="url" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{Auth::user()->website}}" required autofocus>

                                    @if ($errors->has('website'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telepon') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{Auth::user()->phone}}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi Universitas') }}</label>

                                <div class="col-md-6">
                                    <textarea name="desc" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}">{{Auth::user()->desc}}</textarea>
                                    @if ($errors->has('desc'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('desc') }}</strong>
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
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <div class="row">
                      <div class="col-md-12">
                        <form action="{{route('university.password.update',['university' => Auth::user()->id])}}" method="POST">
                          {{ csrf_field() }}
                          <div class="form-group row">
                              <label for="passwordOld" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>

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
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

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
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password Baru') }}</label>

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
  </div>
@endsection
