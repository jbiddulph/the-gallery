<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;
use App\Artwork2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Artwork2Request;
use App\Http\Requests\ArtworkEditRequest;

class AdminartworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $artworks = Artwork2::latest()->paginate(15);

        //
        return view('pages.admin.artwork', compact('artworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.artwork-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Artwork2Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required|min:3'
//            'photo'=>'required|mimes:jpeg,jpg,png,gif'
        ]);
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images/gallery2', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
            $input['slug'] = str_slug($input['title']);

        }

        Artwork2::create($input);

        return redirect('/admin/add-artwork');
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
}
