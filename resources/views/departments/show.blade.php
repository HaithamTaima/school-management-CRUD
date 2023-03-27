@extends('layouts.app')
@section('content')
   <h1 class="text-center">{{$department->title}}</h1>
   <h1 class="text-center">    Count Of Students is : {{count($department->students)}} || Count Of Teachr is : {{count($department->teachers)}} </h1>
<p class="text-left">
    {{$department->description}}
</p>
   <h1>طالب</h1>
   @if(isset($department) && isset($department->students) && count($department->students) > 0 )
   <div class="list-group">
       @foreach($department->students as $student)
           <a href="{{route('students.edit',$student->id)}}" class="list-group-item list-group-item" aria-current="true">
               {{$student->name}}
           </a>
       @endforeach
   </div>
   @else
    <div class="alert alert-danger">No Student Found</div>
    @endif
<h1>معلم</h1>

   @if(isset($department) && isset($department->teachers) && count($department->teachers) > 0 )

           <div class="list-group">
               @foreach($department->teachers as $teacher)
                   <a href="{{route('teachers.edit',$teacher->id)}}" class="list-group-item list-group-item" aria-current="true">
                       {{$teacher->name}}
                   </a>
               @endforeach
           </div>
   @else
       <div class="alert alert-danger">No Student Found</div>
   @endif


@stop
