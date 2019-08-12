<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('created_at', 'desc')->get();
//        return view('pages.admin.category')->with(['categories' => $categories, 'posts' => $posts ]);
        return view('pages.admin.category')->with('categories', $categories);
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
        //
        $category = new Category();
        $category->name = $request->categoryName;
        $category->author = "John Biddulph";

        $category->save();

        //Success saves successfully
        session()->flash('Success', 'Category Named: ' . $category->name . ' added Successfully');


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

    public function removeCategory(Request $request) {
        //$data = $request->all();
        //Find the Category
        $category = Category::findOrFail($request->id);
        //Delete the Category
        $category->delete();
        //Session Massage
        session()->flash('Success', 'Category Named ' . $category->name . ' removed successfully');

        return json_encode(['Success' => 'Category Named ' . $category->name . ' removed successfully']);
    }
    public function editCategory(Request $request) {
        //Find Category
        $category = Category::findOrFail($request->id);

        //Change the Name
        $category->name = $request->name;
        //Updating Category
        $category->update();
//        session()->flash('Success', 'Category Name changed successfully to : ' . $category->name);
//        return json_encode(['Success' => 'Category Name changed successfully to : ' . $category->name]);
        return redirect()->back()->with('message', 'Category successfully changed');
    }
}
