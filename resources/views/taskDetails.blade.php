@extends('app')
@php
$json = json_decode($test->test_value);
$variabls = $json->value;
$result = $json->result;
$helloWord ='
        #include <iostream>
        using namespace std;
                                                    
        int main()
        {
            cout << "Hello world!" << endl;
            return 0;
        }';
@endphp
@section('title', 'FeladatLe')

@section('content')
    <div class="conteiner mt-3 mx-5">
        <ul class="nav nav-stacked nav-pills" id="tabMenu">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#leiras">Leírás</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#kodolas">Kódolás</a></li>
            @if (empty($taskResult) or !session()->has('LoggedUser'))
            <li class="nav-item"><a class="nav-link disabled" data-bs-toggle="tab" href="#megoldasok" >Megoldások</a></li>
            @else
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#megoldasok" >Megoldások</a></li>
            @endif
            
        </ul>
        <div class="tab-content">
            <div class="tab-pane active mx-3" id="leiras">
                <h2>Leiras:</h2>
                <p>{{ $task->task_desc }}</p>
                <h2> Bemeneti adatok:</h2>
                <p>
                    @foreach ($variabls as $variabel)
                        {{ $variabel }}
                    @endforeach
                </p>
                <h2>Várt eredmény :</h2>
                <p>
                    @foreach ($result as $item)
                    {{ $item }}
                    @endforeach
                </p>
            </div>

            <div class="tab-pane " id="kodolas">
                <div class="container mt-2">
                    <div class="row">
                        <textarea name="code" id="code" rows="15" form="task" spellcheck="false"  style="resize: none;background-color:#72a589;">
                            @if (session()->has('code'))
                                
                            {{Session::get('code')}}
                            @else
                                {{$helloWord}}
                            @endif   
                        </textarea>
                        <textarea class="mt-2" name="result" id="result" rows="2"  style="resize: none;"  disabled>
                                {{Session::get('response')}}
                            </textarea>
                        <form class="mt-1" id="task"
                            action="/taskDo?id=@php echo $task->task_id; @endphp" method="POST">
                            @csrf
                            @if (session()->has('LoggedUser'))
                                <button type="submit" class="btn btn-success ">Beküldés</button>
                            @else
                                <button type="submit" class="btn btn-success  disabled">Beküldés</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane " id="megoldasok">
                @if(!empty($taskResult))
                    @livewire('task-results',['task_id' => $task->task_id,'score'=>$taskResult->score])
                @endif
            </div>
        </div>
    </div>
    <script>
        //redirect to specific tab
        $(document).ready(function() {
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
        });

    </script>
@endsection
