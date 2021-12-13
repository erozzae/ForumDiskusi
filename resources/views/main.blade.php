@extends('master')
@section('page')
    Beranda
@endsection

@section('pageTittle')
  <h6 class="font-weight-bolder mb-0">Beranda</h6>
@endsection

@section('content')
<div class="backgorund">
  <center>
    <div class="container">
      <H2>Selamat Datang di Website Diskusi</H2>
      <div class="logo">
        <img src="https://wallpapercave.com/wp/kBJ39th.jpg" alt="eror" style="border-radius: 0%" width="100%" height="500px">
        <div class="persuasif">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        </div>
      </div>
      
    </div>
  </center>
</div>

<div class="signup">
  <div class="allbtn">
    <button class="btn1" >
        <a  href="{{ route('register.create') }}"> Register</a>
    </button>
  </div>
</div>

@endsection
