<div>
    @foreach ($results as $item)
    <div class="card mt-3" style="background-color: #72a589;border:2px solid black">
         <div class="cardbody">
             <h2 class="card-title">{{$item->task_name}}<h2>
             <textarea readonly class=card-text  rows="8" style="background-color:#72a589; resize: none;width:100%;">{{$item->result}}</textarea>
             <h3>Pontszám:{{$item->score}}</h3>
         </div>
     </div>
    @endforeach
</div>
