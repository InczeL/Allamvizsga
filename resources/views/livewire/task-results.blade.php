<div>
  @foreach ($results as $item)
   <div class="card my-3 code-are" >
        <div class="cardbody">
            <h2 class="card-title mx-4">{{$item->user_name}}<h2>
            <textarea readonly class="card-text code-are"   rows="8" >{{$item->result}}</textarea>
            <h3 class="mx-4">Pontszám:{{$item->score}}</h3>
        </div>
    </div>
   @endforeach
</div>
