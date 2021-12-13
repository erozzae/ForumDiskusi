@extends('masterLogin')

@section('page')
    Forum
@endsection

@section('pageTittle')
    <h6 class="font-weight-bolder mb-0">Forum Diskusi</h6>

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

    <button type="button" class="badge badge-sm bg-gradient-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat
        Forum</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Forum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($errors) > 0)
                        <ul class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <li class="mb-1 text-dark font-weight-bold text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('forum.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Judul :</label>
                            <input type="text" class="form-control" name="judul">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Konten:</label>
                            <textarea class="form-control" name="konten"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Gambar <span style="font-weight: lighter">(opsional)</span></label>
                            <input class="form-control" name="foto" type="file">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="badge badge-sm bg-gradient-danger"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="badge badge-sm bg-gradient-success">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    @foreach ($forum as $frm)


        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <p class="mb-1 pt-2 text-bold">{{ $frm->User->name }}</p>
                                    <h5 class="font-weight-bolder">{{ $frm->judul }}</h5>
                                    <p class="mb-5">{{ $frm->konten }}</p>
                                    <p style="font-size: 10px">{{ $frm->updated_at->diffforHumans() }}</p>
                                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                        href="javascript:;">
                                        Berikan Komentar
                                        <a class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"
                                            href="{{ route('forum.detail', $frm->id) }}"></a>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                @if (($frm->foto)!= NULL)
                                    <img src="{{ asset('thumb/' .$frm->foto) }}"
                                        style="max-width: 300px; border-radius: 15px">
                                @endif
                                {{-- alt="" style="max-width: 300px; border-radius:15px;">
                                https://cdn.idntimes.com/content-images/community/2019/09/original-463d12712f5a3b50656b750690813be3_600x400.jpg --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    <div class="row mt-4">

    </div>
    <div class="link">
        <tr>
            <td colspan="5"></td>
            <td colspan="1">
                <div>{{ $forum->links() }}</div>
            </td>
        </tr>
    </div>




@endsection

{{-- <div class="bg-gradient-primary border-radius-lg h-100">
    <img src="{{ asset('style/assets/img/shapes/waves-white.svg') }}" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
    <div class="position-relative d-flex align-items-center justify-content-center h-100">
      <img class="w-100 position-relative z-index-2 pt-4" src="{{ asset('style/assets/img/illustrations/rocket-white.png') }}" alt="rocket">
    </div>
  </div> --}}
