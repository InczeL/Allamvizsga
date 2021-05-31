
<div class="conteinr  justify-content-md-center  mx-5 mt-5 ">
    @include('livewire.create-new-task')
    @include('livewire.update-task')
    <div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTaskModal">
           Új feladat létrehozása
          </button>
    </div>
    @foreach ($tasks as $task)
        <div class="card mt-3" style="background-color: #72a589;border:2px solid black">
            <div class="cardbody">
                <h2 class="card-title">{{$task->task_name}}<h2>
                <textarea readonly class=card-text  rows="4" style="background-color:#72a589; resize: none;width:100%;">{{$task->task_desc}}</textarea>
                <div class="row">
                    <div class="col-6">
                        <h3>Minta bemenetek</h3>
                        @php
                        $values = $task->test_value->value;
                        $results =$task->test_value->result;
                        @endphp
                        @foreach ($values as $value)
                            {{$value}}
                        @endforeach
                    </div>
                    <div class="col-6">
                        <h3>Minta kimenet</h3>
                        @foreach ($results as $result)
                            {{$result}}
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3>Bemenetek</h3>
                    </div>
                    <div class="col-6">
                        <h3>Kimenetek</h3>
                    </div>
                </div>
            @foreach ($task->test_values as $test_value)
                    <div class="row">
                        <div class="col-6">
                            @foreach ($test_value->value as $value)
                                {{$value}}
                            @endforeach
                        </div>
                        <div class="col-6">
                            @foreach ($test_value->result as $result)
                                {{$result}}
                            @endforeach
                        </div>
                    </div>
            @endforeach
            </div>
            <div class="row mx-1">
                <button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#updateTaskModal" wire:click.prevent="edit('{{$task->task_id}}')">Szerkesztés</button>
            </div>
        </div>
    @endforeach
</div>

