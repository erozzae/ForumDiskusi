@extends('masterLogin')
@section('page')
    Daftar
@endsection

@section('pageTittle')
  <h6 class="font-weight-bolder mb-0">Daftar</h6>
@endsection

@section('content')
    <div class="container">
        <h4>Tambah User</h4>
        @if(count($errors)>0)
        <ul class="alert alert-warning">
            @foreach($errors->all() as $error)
            <li class="mb-1 text-dark font-weight-bold text-sm">{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{ route('user.store') }}">
        @csrf
        <div class="mb-3 row"><label class="col-sm-2 col-form-label">Nama</label> <div class="col-sm-10">
            <input class="form-control" type="text" name="name"></div></div>

        <div class="mb-3 row"><label class="col-sm-2 col-form-label">Email</label> <div class="col-sm-10">
             <input class="form-control" type="text" name="email"></div></div>
       
        <div class="mb-3 row"><label class="col-sm-2 col-form-label">Password</label> <div class="col-sm-10">
            <input class="form-control" type="password" name="password"></div></div>
        
       <div class="form-check">
        <input class="form-check-input" type="radio" name="level" value='admin'  enable>
         <label class="form-check-label">
            Admin
        </label>
        </div>
        
        <div class="form-check">
        <input class="form-check-input" type="radio" name="level" value='auth' checked enable>
        <label class="form-check-label" >
            User
        </label>
        </div>
        <br>
        <div><button type="submit" class="btn btn-primary">Simpan</button></div>
        <br>
        <button class="btn btn-danger"><a style="color: #fff" href="/user" >Batal</a></button>
        </form>
    </div>

@endsection