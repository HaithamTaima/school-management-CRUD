@extends('layouts.app')
@section('content')
    <a href="{{route('students.index')}}" class="btn btn-primary">Back</a>
    <form action="{{route('students.update',$student->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">name address</label>
            <input type="text" name="name" value="{{isset($student->name) ? $student->name : null}}"
                   class="form-control" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">phone </label>
            <input type="text" name="phone" value="{{isset($student->phone) ? $student->phone : null}}" class="form-control" placeholder="phone">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Department </label>
            <select name="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{$department->id}}" @if($department->id == $student->department_id) selected @endif>{{$department->title}}</option>
                @endforeach
            </select>
        </div>

{{--        <div class="mb-3">--}}
{{--            <label for="exampleFormControlInput1" class="form-label">Teacher </label>--}}
{{--            <select name="teacher_id" class="form-control">--}}
{{--                <option value="">Select Teacher</option>--}}
{{--                @foreach($teachers as $teacher)--}}
{{--                    <option value="{{$teacher->id}}" @if($teacher->id == $student->teacher_id) selected @endif>{{$teacher->title}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" name="bio" rows="3">{{isset($student->bio) ? $student->bio : null}}</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@stop
