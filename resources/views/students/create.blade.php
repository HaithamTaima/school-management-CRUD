@extends('layouts.app')
@section('content')
    <a href="{{route('students.index')}}" class="btn btn-primary">Back</a>
    <form action="{{route('students.store')}}" method="post">
        @method('POST')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">name address</label>
            <input type="text" name="name" class="form-control" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">phone </label>
            <input type="text" name="phone" class="form-control" placeholder="phone">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Department </label>
            <select name="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->title}}</option>
                @endforeach
            </select>
        </div>


{{--        <div class="mb-3">--}}
{{--            <label for="exampleFormControlInput1" class="form-label">Teacher </label>--}}
{{--            <select name="teacher_id" class="form-control">--}}
{{--                <option value="">Select Teacher</option>--}}
{{--                @foreach($teachers as $teacher)--}}
{{--                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}


        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" name="bio" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>

    </form>
@stop
