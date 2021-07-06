
<div class="conteinr  justify-content-md-center  m-5 ">
    @include('livewire.create-new-task')
    @include('livewire.update-task')
    <div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTaskModal">
           Új feladat létrehozása
          </button>
    </div>
    @foreach ($tasks as $task)
        <div class="card mt-3">
            <div class="cardbody">
                <h2 class="card-title mx-4">{{$task->task_name}}<h2>
                <textarea readonly class="card-text code-are"  rows="4" >{{$task->task_desc}}</textarea>
                <div class="row mx-4">
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
                <div class="row mx-4">
                    <div class="col-6">
                        <h3>Bemenetek</h3>
                    </div>
                    <div class="col-6">
                        <h3>Kimenetek</h3>
                    </div>
                </div>
            @foreach ($task->test_values as $test_value)
                    <div class="row mx-4">
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
            <div class="row mx-3 my-3 ">
                <div>
                    <button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#updateTaskModal" wire:click.prevent="edit('{{$task->task_id}}')">Szerkesztés</button>
                    <button type="button" class="btn btn-success" wire:click.prevent="getResultOfTask('{{$task->task_id}}')">Megoldasok</button>
                </div>
            </div>
        </div>
    @endforeach
</div>

