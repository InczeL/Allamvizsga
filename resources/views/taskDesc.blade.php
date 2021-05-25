@extends('app')

@section('title','FeladatLe')

@section('content')
<div class="conteinr  mx-5 row">
    <div class="col-4 mt-3">
     @livewire('filter')
    </div>
    <div class="col-8">
    <?php
        foreach ($tasks as $key){
        ?>
            <div class="card mt-3" style="background-color: #72a589;border:2px solid black">
                <div class="cardbody">
                    <h2 class="card-title"><?php echo $key->task_name?><h2>
                    <p class=card-text><?php echo $key->task_desc?></p>
                    <?php  $id=$key->task_id?>
                    <a href="/taskDetails/<?php echo $id?>" type ="button" class="btn btn-success">Megoldas</a>
                </div>
            </div>
        <?php 
        }
    ?>
        <div class="pagination mt-3">
            {{$tasks->links('layouts.paginationlinks')}}
        </div>
    </div>
</div>
@endsection