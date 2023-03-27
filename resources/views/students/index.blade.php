@extends('layouts.app')
@section('content')
    <a href="{{route('students.create')}}" class="btn btn-success">Create</a>



    <table class="table table-border table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">NAME</th>
            <th class="text-center">PHONE</th>
            <th class="text-center">Department</th>
            <th class="text-center">Teacher</th>

            <th class="text-center">Date_of_birth</th>
            <th class="text-center">TimeStamp</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Destroy</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr class="list-item">
                <td class="text-center">{{$student->id}}</td>
                <td class="text-center">{{$student->name}}</td>
                <td class="text-center">{{$student->phone}}</td>
                <td class="text-center">
                    @foreach($departments as $department)
                        @if($department->id == $student->department_id)
                            <a href="{{route('departments.show',$department->id)}}">{{$department->title}}</a>
                        @endif
                    @endforeach
                </td>

                <td class="text-center">

                </td>

{{--                <td class="text-center">--}}
{{--                    @foreach($teachers as $teacher)--}}
{{--                        @if($teacher->id == $teacher->teacher_id)--}}
{{--                            <a href="{{route('teachers.show',$teacher->id)}}">{{$teacher->title}}</a>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </td>--}}


                <td class="text-center">{{\Carbon\Carbon::parse($student->dete_of_birth)->format('d/m/y')}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($student->created_at)->format('d/m/y')}}</td>


                <td class="text-center"><a class="btn btn-success" href="{{route('students.edit',$student->id)}}"><i class="fas fa-keyboard"></i></a></td>
                <td class="text-center"><a class="btn btn-danger" href="{{route('students.destroy',$student->id)}}"><i class="fas fa-minus-circle"></i></a></td>


            </tr>
        @endforeach
        </tbody>

    </table>
    {{$students->links()}}

@endsection
