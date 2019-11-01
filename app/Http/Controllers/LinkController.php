<?php

namespace App\Http\Controllers;

use App\Category;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('submit', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $admin = auth()->user()->is_admin;

        $link = new Link();
        $link->fill($request->all());
        if($admin) {
            $link->confirmed = true;
        }
        $link->save();

        if($admin) return redirect()->route('admin.home')->with('success','Post created successfully');

        return redirect()->route('/')
            ->with('success','Wait for your post to be confirmed by admin');
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
        $link = Link::find($id);
        return view('update', ['link'=>$link]);
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
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $link = Link::find($id);
        $link->update($request->all());

        return redirect()->route('admin.home')
            ->with('success','Post updated successfully');

    }

    public function confirm($id)
    {
        $link = Link::find($id);
        $link->confirmed = true;
        $link->save();

        return redirect()->route('admin.home')
            ->with('success','Post confirmed successfully');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::find($id);
        $link->delete();

        return redirect()->route('admin.home')
        ->with('success','Post deleted successfully');;
    }
}
