@extends('masterLogin')

@section('page')
    Daftar User
@endsection

@section('pageTittle')
  <h6 class="font-weight-bolder mb-0">Daftar User</h6>
@endsection

@section('content')
<div class="container">
  <div class="card-header pb-0">
       <div class="card-body px-0 pt-0 pb-2">
         <div class="table-responsive p-0">
           <table class="table align-items-center mb-0">
             <thead>
               <tr>
                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama User</th>
                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                 {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th> --}}
                 <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Perubahan Terbaru</th>
               </tr>
             </thead>
             <tbody>
               @foreach ($data_user as $user)
               <tr>
                <td>
                  {{-- <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center"> --}}
                      <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                    </div>
                  </div>
                </td>

                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                </td>
                
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ $user->updated_at }}</span>
                </td>

                <td class="align-middle">
                  <form action="{{ route('user.destroy',$user->id) }}" method="post">
                    @csrf
                    <button onclick="return confirm('Yakin Dihapus?')" class="badge badge-sm bg-gradient-danger">
                      Hapus
                    </button>
                  </form>
                </td>

                <td class="align-middle">
                  <form action="{{ route('user.edit',$user->id) }}" method="post">
                    @csrf
                    <button class="badge badge-sm bg-gradient-success">
                      Edit
                    </button>
                  </form>
                </td>
              </tr>
               @endforeach
             </tbody>
          </table>
               <tr>
                 <td>
                   <form action="{{ route('user.create') }}">
                    <button class="badge badge-sm bg-gradient-info" >
                      Tambah User
                    </button>
                   </form>
                 </td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>
       </div>     
  </div>     
</div>
<div class="row mt-4">

</div>
<div class="link">
    <tr>
        <td colspan="5"></td>
        <td colspan="1">
            <div>{{ $data_user->links() }}</div>
        </td>
    </tr>
</div>

@if (Session::has('pesanHapus'))
    <div class="alert alert-warning" role="alert">
      <strong>{{ Session::get('pesanHapus') }}</strong> 
    </div>
    
@endif

@if (Session::has('pesanCreate'))
    <div class="alert alert-success" role="alert">
      <strong>{{ Session::get('pesanCreate') }}</strong> 
    </div>
    
@endif

@if (Session::has('pesanUpdate'))
    <div class="alert alert-success" role="alert">
      <strong>{{ Session::get('pesanUpdate') }}</strong> 
    </div>
    
@endif

@endsection