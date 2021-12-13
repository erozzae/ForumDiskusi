@extends('masterLogin')

@section('page')
    Profil
@endsection

@section('pageTittle')
    <h6 class="font-weight-bolder mb-0">Profile User</h6>

@endsection

@section('content')
    <div class="container">
        <img src="{{ asset('style/assets/img/usher.png') }}" width="150px" alt="err" style="margin-bottom: 20px">
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <p class="text-xs text-secondary mb-0">Nama User:</p>
                                <h6 class="mb-0 text-sm">{{ Auth::user()->name }}</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-xs text-secondary mb-0">Email:</p>
                                <h6 class="mb-0 text-sm">{{ Auth::user()->email }}</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-xs text-secondary mb-0">Level:</p>
                                <h6 class="mb-0 text-sm">{{ Auth::user()->level }}</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-xs text-secondary mb-0">Update Data Terakhir:</p>
                                <h6 class="mb-0 text-sm">{{ Auth::user()->updated_at }}</h6>
                            </td>
                        </tr>

                    </tbody>
                </table>
                    <td>
                        <form action="{{ route('profile.edit',Auth::user()->id) }}" method="post">
                            @csrf
                            <button class="badge badge-sm bg-gradient-success">
                                Edit Data
                            </button>
                        </form>
                    </td>

            </div>
        </div>
    </div>

    @if (Session::has('pesanUpdatePr'))
    <div class="alert alert-success" role="alert">
      <strong>{{ Session::get('pesanUpdatePr') }}</strong> 
    </div>
    
@endif
@endsection
