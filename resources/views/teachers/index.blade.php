@extends('layouts.app')
@section('content')
    <a href="{{route('teachers.create')}}" class="btn btn-success">Create</a>



    <table class="table table-border table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">NAME</th>
            <th class="text-center">PHONE</th>
            <th class="text-center">Department</th>

            <th class="text-center">Date_of_birth</th>
            <th class="text-center">TimeStamp</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Destroy</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr class="list-item">
                <td class="text-center">{{$teacher->id}}</td>
                <td class="text-center">{{$teacher->name}}</td>
                <td class="text-center">{{$teacher->phone}}</td>
                <td class="text-center">
                    @foreach($departments as $department)
                        @if($department->id == $teacher->department_id)
                            <a href="{{route('departments.show',$department->id)}}">{{$department->title}}</a>
                        @endif
                    @endforeach
                </td>
                <td class="text-center">{{\Carbon\Carbon::parse($teacher->dete_of_birth)->format('d/m/y')}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($teacher->created_at)->format('d/m/y')}}</td>


                <td class="text-center"><a class="btn btn-success" href="{{route('teachers.edit',$teacher->id)}}"><i
                            class="fas fa-keyboard"></i></a></td>
                <td class="text-center"><a class="btn btn-danger" href="{{route('teachers.destroy',$teacher->id)}}"><i
                            class="fas fa-minus-circle"></i></a></td>


            </tr>
        @endforeach
        </tbody>

    </table>
    {{$teachers->links()}}

@endsection
