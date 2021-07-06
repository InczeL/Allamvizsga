@extends('app')
@section('title','FeladatLe')
@section('content')
<div class="conteinr  mx-5 row">
    <div class="col-4 mt-3">
        @livewire('filter')
    </div>
    <div class="col-8">
        <div class="row">
            @foreach ($tasks as $task)
                <div class="col-6">
                    <a class="card-click" href="/taskDetails/{{$task->task_id}}">
                        <div class="card task-card mt-3 ">
                        
                            <div class="cardbody">
                                <h2 class="card-title">{{$task->task_name}}<h2>
                                <h4 class="task-class">{{substr( $task->task_id,0,2)}}-es</h4>
                                @switch($task->difficulty)
                                    @case(1)
                                        <h4 class="task-difficulty-easy">Könnyű</h4>
                                        @break
                                    @case(2)
                                        <h4 class="task-difficulty-medium">Közepes</h4>            
                                        @break
                                    @default
                                        <h4 class="task-difficulty-hard">Nehéz</h4>
                                @endswitch
                                <div class="scrollable">
                                    <p class="card-text mt-3">{{$task->task_desc}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="pagination mt-3">
            {{$tasks->links('layouts.paginationlinks')}}
        </div>
    </div>
</div>
@endsection