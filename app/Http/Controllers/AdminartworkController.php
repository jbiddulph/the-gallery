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
            'title'=>'required|min:3',
            'size' => 'required',
//            'photo_id' => 'required|mimes:jpeg,jpg,gif,png',
            'artistsnotes' => 'required|min:3',
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
        $artworks = Artwork2::findOrFail($id);
        //
        return view('pages.admin.artwork-edit', compact('artworks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtworkEditRequest $request, $id)
    {
        //
        $artwork = Artwork2::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images/gallery2', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $artwork->update($input);

        //
        $artworks = Artwork2::findOrFail($id);
        //
//        return view('pages.admin.artwork-edit', compact('artworks'));
        return redirect()->back()->with('message', 'Artwork edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->get('id');
        $artworks = Artwork2::find($id);

        $artworks->delete();

        return redirect()->back()->with('message', 'Artwork deleted successfully');
    }

    public function trash() {
        $artworks = Artwork2::onlyTrashed()->paginate(20);
        return view('pages.admin.artwork-trash', compact('artworks'));
    }

    public function restore($id) {
        $artworks = Artwork2::onlyTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('message', 'Artwork restored successfully');
    }

    public function toggle($id){
        $artwork = Artwork2::find($id);
        $artwork->status = !$artwork->status;
        $artwork->save();
        return redirect()->back()->with('message', 'Status updated successfully');
    }
}
