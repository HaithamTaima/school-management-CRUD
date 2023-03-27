<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
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

        $students = Student::orderBy('id', 'desc')->orderBy('name', 'desc')->paginate(5);
       return view("students.index",[
            'students'=> $students,
                       'departments' => $departments,
           //'teachers'=> $teachers

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

        return view('students.create',[
            'departments' => $departments,
                      // 'teachers'=> $teachers

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Student::create([
            'name' => $request->get('name'),
            'bio' => $request->get('bio'),
            'phone' => $request->get('phone'),
           'department_id' => $request->get('department_id'),
          // 'teacher_id'=>$request->get('teacher_id'),

       ]);
        //طريقت الكويري بلدر
//        DB::table('students')->insert([
//            'name' => $request->get('name'),
//            'bio' => $request->get('bio'),
//            'phone' => $request->get('phone'),
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//
//
//        ]);
        return redirect('students/index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $studnet = Student::find($id);
        $departments = Department::all();
        $teachers =Teacher::all();



        if (is_null($studnet)) {
            return redirect('students/index');
        }
        return view('students.edit', [
            'student' => $studnet,
            'departments' =>$departments,
                     //  'teachers'=> $teachers



        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                   $stuent= Student::where('id', '=', $id);
                   $exist =$stuent->first();
                   if (isset($exist)){
                       $stuent->update([
                           'name' => $request->get('name'),
                           'bio' => $request->get('bio'),
                           'phone' => $request->get('phone'),
                           'department_id' => $request->get('department_id'),
                           //'teacher_id'=>$request->get('teacher_id'),


                       ]);
                   }

//       DB::table('student')
//           ->where('id','='.$id)
//           ->update([
//           'name'=> $request ->get('name'),
//           'bio'=> $request->get('bio'),
//           'phone'=>$request->get('phone'),
//               'updated_at' => Carbon::now()
//       ]);
       return  redirect('students/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id','=',$id)
            ->forceDelete();
        return redirect('students/index');

    }
}
