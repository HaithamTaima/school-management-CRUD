<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::
        orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            //  ->latest()
            ->get();

        return view('departments.index', [
            'departments' => $departments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:departments',
            'description' => 'required'
        ]);
        if ($request->has('title')) {
            $data['title'] = $request->get('title');
        }
        if ($request->has('description')) {
            $data['description'] = $request->get('description');
        }
        Department::create($data);
        return redirect('departments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $department = Department::with([
            'students','teachers'
        ])->find($id);

        return view('departments.show', [
            'department' => $department,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::with([
            'students'
        ])->find($id);

        return view('departments.edit', [
            'department' => $department,
        ]);
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
            'title' => 'required|unique:departments,title,'.$id,
            'description' => 'required'
        ]);
        if ($request->has('title')) {
            $data['title'] = $request->get('title');
        }
        dd(strlen($request->get('description')));
        if ($request->has('description') && strlen($request->get('description')) > 0) {
            $data['description'] = $request->get('description');
        }
        Department::where('id', '=', $id)
            ->update($data);
        return redirect('departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id', '=', $id)
            ->forceDelete();
        return redirect('departments');
    }
}
