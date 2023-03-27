<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $teachers =Teacher::all();
        $teachers = Teacher::orderBy('id', 'desc')->orderBy('name', 'desc')->paginate(5);
        return view("teachers.index",[

            'teachers'=> $teachers,
            'departments' => $departments

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $teachers =Teacher::all();

        return view('teachers.create',[
            'departments' => $departments,
           // 'teachers'=> $teachers
        ]);
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
            'name' => 'required',
            'bio' => 'required',
            'phone' => 'required'
        ]);

            Teacher::create([
                'name' => $request->get('name'),
                'bio' => $request->get('bio'),
                'phone' => $request->get('phone'),
                'department_id' => $request->get('department_id'),

            ]);

        return redirect('teachers/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $departments = Department::all();


        if (is_null($teacher)) {
            return  redirect('teachers/index');
        }
        return view('teachers.edit', [
            'teacher' => $teacher,
            'departments' =>$departments


        ]);
        return redirect('teachers/index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher= Teacher::where('id', '=', $id);
        $exist =$teacher->first();
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'phone' => 'required'
        ]);
        if (isset($exist)){
            $teacher->update([
                'name' => $request->get('name'),
                'bio' => $request->get('bio'),
                'phone' => $request->get('phone'),
                'department_id' => $request->get('department_id'),

            ]);
        }
        return  redirect('teachers/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::where('id','=',$id)
            ->forceDelete();
        return redirect('teachers/index');
    }
}
