@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('Masyarakat.store') }}">
                @csrf
                <h3>Register</h3>
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="nik">
                    <label for="nik">NIK</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tlon" class="form-control" id="telpon" placeholder="telpon">
                    <label for="telpon">Telpon</label>
                </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                   
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>  
</div>
@endsection