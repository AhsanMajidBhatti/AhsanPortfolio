<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('admin-page.experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.experience.create');
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
            'company' => 'required',
            'started' => 'required',
            'ended' => 'required',
            'description' => 'required',
            'achievements' => 'required'
        ]);

        Experience::create([
            'name' => $request->get('name'),
            'company' => $request->get('company'),
            'started' => $request->get('started'),
            'ended' => $request->get('ended'),
            'description' => $request->get('description'),
            'achievements' => $request->get('achievements')
        ]);

        return redirect()->route('experience.index')->with('success', 'Experience Created Successfully');
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
        $experience = Experience::find($id);
        return view('admin-page.experience.edit', compact('experience'));
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
        $experience = Experience::find($id);

        $experience->name = $request->get('name');
        $experience->company = $request->get('company');
        $experience->started = $request->get('started');
        $experience->ended = $request->get('ended');
        $experience->description = $request->get('description');
        $experience->achievements = $request->get('achievements');

        $experience->save();

        return redirect()->route('experience.index')->with('success', 'Experience Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        return redirect()->back()->with('success', 'Experience Deleted Successfully');
    }
}
