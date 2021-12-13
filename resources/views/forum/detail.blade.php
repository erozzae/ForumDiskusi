@extends('masterLogin')

@section('page')
    Forum
@endsection

@section('pageTittle')
    <h6 class="font-weight-bolder mb-0">Detail & Komentar</h6>

@endsection

@section('content')
    {{-- <div class="card-header pb-0">
        <tr>
            <td>
                <a href="" class="badge badge-sm bg-gradient-info">
                    Mulai Forum
                </a>
            </td>
        </tr>
    </div> --}}





    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold"></p>
                                <h5 class="font-weight-bolder">{{ $forum->judul }}</h5>
                                <p class="mb-5">{{ $forum->konten }}</p>
                                <p style="font-size: 10px">{{ $forum->updated_at->diffforHumans() }}</p>




                            </div>
                        </div>
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                            <img src=""
                                style="max-width: 300px; border-radius: 15px">
                            {{-- alt="" style="max-width: 300px; border-radius:15px;">
                                https://cdn.idntimes.com/content-images/community/2019/09/original-463d12712f5a3b50656b750690813be3_600x400.jpg --}}
                        </div>
                        <button type="button" class="badge badge-sm bg-gradient-info" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" style="max-width: 150px">Tambah
                            Komentar</button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Komentar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if (count($errors) > 0)
                                            <ul class="alert alert-warning">
                                                @foreach ($errors->all() as $error)
                                                    <li class="mb-1 text-dark font-weight-bold text-sm">{{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <form action="{{ route('komentar.store', $forum->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Komentar:</label>
                                                <textarea class="form-control" name="komentar"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Gambar <span style="font-weight: lighter">(opsional)</span></label>
                                                <input type="file" class="form-control" name="foto" >
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="badge badge-sm bg-gradient-danger"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit"
                                                    class="badge badge-sm bg-gradient-success">Simpan</button>
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
        <h3 style="margin-top: 20px; margin-bottom:0">Komentar </h3>
        @foreach ($forum->komentar as $kmn)

            <div class="card-body p-3 pb-0">

                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex flex-column">

                            <span class="text-xs">{{ $kmn->User->name }}</span>
                            <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ $kmn->komentar }}</h6>
                            @if (($kmn->foto)!= NULL)
                                <img src="{{ asset('thumb/' .$kmn->foto) }}" alt=""style="max-width: 300px; border-radius: 15px">
                            @endif
                           
                        </div>
                        <div class="d-flex align-items-center text-sm">
                            {{ $kmn->updated_at->diffforHumans() }}

                        </div>
                    </li>
                </ul>
            </div>

            <br>
        @endforeach

        {{-- <div class="row mt-4">

        </div>
        <div class="link">
            <tr>
                <td colspan="5"></td>
                <td colspan="1">
                    <div>{{ $komen->links() }}</div>
                </td>
            </tr>
        </div> --}}
        
        {{-- @if (Session::has('pesanTmKomen'))
            <div class="alert alert-success" role="alert">
                <strong>{{ Session::get('pesanTmKomen') }}</strong>
            </div>

        @endif --}}
    @endsection
