
@extends('app')

@section('title','Feladat i')
@php
    use Illuminate\Http\Request;
    $id= request('id');
@endphp
@section('content')
<div class ="container">
    <div class="row">
        <textarea name="code" id="code" rows="20"  form="task">#include <iostream>
        using namespace std;
                
        int main()
        {
            cout << "Hello world!" << endl;
            return 0;
        }
        </textarea>

        <form id="task" action="taskDo?id=<?php echo $id?>" method="POST">
            @csrf
            <input type="submit" value="Beküldés">
        </form>
    </div>
</div>
    
@endsection

