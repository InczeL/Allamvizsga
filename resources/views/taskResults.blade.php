@extends('app')
@section('content')
    <div>
        @livewire('task-results',['task_id' => $id])
    </div>
@endsection