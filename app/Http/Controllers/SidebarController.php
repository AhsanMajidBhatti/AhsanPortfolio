<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sidebar;

class SidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sidebars = Sidebar::all();
        return view('admin-page.sidebar.index', compact('sidebars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.sidebar.create');
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
            'sidebar' => 'required|min:5'
        ]);

        Sidebar::create([
            'sidebar' => $request->get('sidebar')
        ]);

        return redirect()->route('sidebar.index')->with('success', 'Sidebar Created Successfully');
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
        $sidebar = Sidebar::find($id);
        return view('admin-page.sidebar.edit', compact('sidebar'));
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
        $sidebar = Sidebar::find($id);

        $sidebar->sidebar = $request->get('sidebar');

        $sidebar->save();

        return redirect()->route('sidebar.index')->with('success', 'Sidebar Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sidebar = Sidebar::find($id);
        $sidebar->delete();
        return redirect()->back()->with('success', 'Sidebar Deleted Successfully');
    }
}
