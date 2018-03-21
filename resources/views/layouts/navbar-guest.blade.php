{{-- START NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="{{asset('img/logo.png')}}" style="max-width: 100px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav offset-md-10">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#loginModal">Masuk/Daftar <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
{{-- END NAVBAR --}}
{{-- START LOGIN MODAL --}}
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masuk sebagai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <a href="{{route('login')}}" class="btn btn-danger full-width">Pelajar</a>
          </div>
          <div class="col-md-4">
            <a href="{{route('university.login')}}" class="btn btn-warning full-width">Universitas</a>
          </div>
          <div class="col-md-4">
            <a href="{{route('donor.login')}}" class="btn btn-success full-width">Donatur</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- END LOGIN MODAL --}}
