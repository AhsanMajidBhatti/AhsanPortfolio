<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::latest()->first();
        return view('admin-page.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'additional_info' => 'required|min:10',
            'image' => 'required'
        ]);

        // Get filename with extension
        $files = $request->file('image');

        $filenameWithExt = $files->getClientOriginalName();

        // Uplaod image
        $path = Storage::disk('public')->putFileAs('uploads\\', $files, $filenameWithExt);

        About::create([
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'additional_info' => $request->get('additional_info'),
            'image' => $path
        ]);

        return redirect()->route('about.index')->with('success', 'About Created Successfully');
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
        $about = About::find($id);
        return view('admin-page.about.edit', compact('about'));
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
        $about = About::find($id);
        $image = $about->image;

        if($request->file('image'))
        {
            $files = $request->file('image');
            $filenameWithExt = $files->getClientOriginalName();
            $image = Storage::disk('public')->putFileAs('uploads\\', $files, $filenameWithExt);
            \Storage::disk('public')->delete($about->image);
        }
        else{
            $files = $request->file('image');
            $filenameWithExt = $files->getClientOriginalName();
            $image = Storage::disk('public')->putFileAs('uploads\\', $files, $filenameWithExt);
        }

        $about->fname = $request->get('fname');
        $about->lname = $request->get('lname');
        $about->email = $request->get('email');
        $about->phone = $request->get('phone');
        $about->address = $request->get('address');
        $about->image = $image;
        $about->additional_info = $request->get('additional_info');

        $about->save();

        return redirect()->route('about.index')->with('success', 'About Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        $filename = $about->image;
        $about->delete();
        Storage::disk('public')->delete($filename);
        rmdir(public_path('uploads'));
        return redirect()->route('about.index')->with('success', 'About Deleted Successfully');
    }
}
