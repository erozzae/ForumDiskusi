<?php

namespace App\Http\Controllers;
use App\Forum;
use App\User;
Use App\Komentar;
use App\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Image;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        
        $forum = Forum::orderBy('updated_at','desc')->paginate(5);
        return view('layout.forum',compact('forum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required|string',
            'konten' => 'required',
        ],
        [
            'judul.required' => "judul wajib diisi",
            'konten.required' => "konten wajib diisi",
          
            
        ]
    );
        $forum = new Forum;
        $forum->user_id = Auth::user()->id;
        $forum->judul = $request->judul;
        $forum->konten = $request->konten;

        if(($request->foto)!=NULL){
            $foto = $request->foto;
            $namafile = time() . '.' . $foto->getClientOriginalExtension();

            Image::make($foto)->resize(200, 150)->save('thumb/' . $namafile);
            $foto->move('images/', $namafile);

            $forum->foto = $namafile;
        }
        $forum->save();
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail(Forum $forum)
    {
        $batas=5;
        $komen = Komentar::orderBy('updated_at','desc')->paginate($batas);
        return view('forum.detail',compact('forum','komen'));
    }

    public function storeComment(Request $request,$id)
    {
        $this->validate($request,[
            'komentar' => 'required',
            
        ],
        [  
            'komentar.required' => "komentar wajib diisi"

        ]
    );
        // dd($request->all());
        $komen = new komentar;
        $komen->komentar = $request->komentar;
        $komen->user_id = Auth::user()->id;
        $komen->forum_id = $id;
        
        if(($request->foto)!=NULL){
            $foto = $request->foto;
            $namafile = time() . '.' . $foto->getClientOriginalExtension();

            Image::make($foto)->resize(200, 150)->save('thumb/' . $namafile);
            $foto->move('images/', $namafile);

            $komen->foto = $namafile;
        }
        $komen->save();
        
        return redirect()->back()->with('pesanTmKomen','Komentar Ditambahkan');
    }

   
}
