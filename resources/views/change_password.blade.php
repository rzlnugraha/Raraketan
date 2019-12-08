@extends('layouts.app') 
@section('content')
<br>
<section class="content">
        <div class=" col-md-5">
                <div class="card">
                  <div class="card-body register-card-body">
                    <p class="login-box-msg">Change Your Profile</p>
              
                    <form action="{{ url('save-profile') }}" method="post">
                        {{ csrf_field() }}
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Full name" required value="{{ Auth::user()->name }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required value="{{ Auth::user()->username }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Change Profile</button>
                      </div>
                    </form>
              
                  </div>
                  <!-- /.form-box -->
                </div><!-- /.card -->
              </div>
</section>
@endsection