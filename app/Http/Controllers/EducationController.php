<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::all();
        return view('admin-page.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.education.create');
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
            'name' => 'required',
            'degree' => 'required',
            'started' => 'required',
            'ended' => 'required',
            'gpa' => 'required'
        ]);

        Education::create([
            'name' => $request->get('name'),
            'degree' => $request->get('degree'),
            'started' => $request->get('started'),
            'ended' => $request->get('ended'),
            'GPA' => $request->get('gpa'),
            'description' => $request->get('description')
        ]);

        return redirect()->route('education.index')->with('success', 'Education Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::find($id);
        return view('admin-page.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $education = Education::find($id);

        $education->name = $request->get('name');
        $education->degree = $request->get('degree');
        $education->started = $request->get('started');
        $education->ended = $request->get('ended');
        $education->GPA = $request->get('gpa');
        $education->description = $request->get('description');

        $education->save();

        return redirect()->route('education.index')->with('success', 'Education Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();
        return redirect()->back()->with('success', 'Education Deleted Successfully');
    }
}
