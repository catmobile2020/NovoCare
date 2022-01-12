<?php

namespace App\Http\Controllers;

use App\Helper\DeleteOldFile;
use App\Helper\StoreFile;
use App\Home;
use App\Http\Requests\UpdateHomes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeScreenController extends Controller
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
        $homes = Home::findOrFail($id);
        if (Storage::exists($homes->image)){
            $homes['image'] = asset(Storage::url($homes->image));
        }else {
            $homes['image'] = asset('media/default_image.png');
        }
        return view('homes.edit', [
            'homes' => $homes,
            'meta_title' => __('Update Home Screen')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomes $request, $id)
    {
        $homes = Home::findOrFail($id);

        $validateData = $request->validated();

        
        if ($request->hasFile('image')) {
            unset($validateData['image']);
            if(isset($homes->image)){
                DeleteOldFile::delete($homes->image);
            }
            $imageName = StoreFile::save($request->image, 'homes');
            $validateData['image'] = $imageName;
        }

        $homes->fill($validateData);
        $homes->save();
        $request->session()->flash('status', __('Home Page was Updated'));

        return back();
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
