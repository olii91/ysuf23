@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="telpon" class="form-control" id="telpon" placeholder="telpon">
                    <label for="telpon">Telpon</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email"name="email" class="form-control" id="email" placeholder="email">
                    <label for="email">email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <div class="form-floating mb-3">
                       <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" required >
                           <option value=""> Pilih Level User</option>
                           <option value="administrator"> administrator</option>
                           <option value="petugas"> petugas</option>
                       </select>                 
                           @error('level')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                   </div>
                   
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
</div>
@endsection