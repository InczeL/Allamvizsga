<div class="form-group m-t">
    <form action="{{route('newtask')}}" method="Post">
        @csrf
        <div class="m-auto mt-3" style="width: 30%">
            <label for="task_name">Feladat neve</label>
            <input type="text" class="form-control" name="task_name" id="task_name"/>
        </div>
        <div class="m-auto" style="width: 30%">
            <label for="task_desc" style="display:block">Feladatleírás</label>
            <textarea class="form-control" name="task_desc" id="task_desc" rows="5" style="  resize: none;"></textarea>
        </div>
        <div class='m-auto' style="width: 30%">
            <label for="class">Osztály: </label>
            <select class='form-control' name='class' id="class" wire:model="selectedClass">
                <option value='__' selected="selected"></option>
                <option value='09' >IX Osztály</option>
                <option value='10'>X Osztály</option>
                <option value='11'>XI Osztály</option>
            </select>
        </div>
        <div class='m-auto' style="width: 30%">
            <label>Kategóriák: </label>
            <select class='form-control' name="category" wire:model="selectedCategory">
                <option value='__' selected="selected"></option>
                @if (!is_null($categories))
                    @foreach ($categories as $item)
                        <option value='{{ $item->category_code }}'>{{ $item->category }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="m-auto" style="width: 30%">
            <label>Alkategóriák: </label>
            <select class='form-control' name="subcategory">
                <option value='__' selected="selected"></option>
                @if (!is_null($subCategories))
                    @foreach ($subCategories as $item)
                        <option value='{{ $item->sub_category_code }}'>{{ $item->sub_category }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="m-auto" style="width: 30%">
            <label for="difficulty" style="display:block;">Nehézség</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="difficulty" id="inlineRadio1" value=1>
                <label class="form-check-label" for="inlineRadio1">Kőnyű</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="difficulty" id="inlineRadio2" value=2>
                <label class="form-check-label" for="inlineRadio2">Közepes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="difficulty" id="inlineRadio3" value=3>
                <label class="form-check-label" for="inlineRadio3">Nehéz</label>
            </div>
        </div>
        <!--Teszte-->
        <div class="m-auto" style="width: 30%">
            <label for="iType" style="display: block" >Bemeneti adatok típusa</label>
            <div class=" form-check form-check-inline">
                <input class="form-check-input" type="radio" name="iType" id="inlineRadio1" value="int">
                <label class="form-check-label" for="inlineRadio1">Egész szám</label>
            </div>
            <div class=" form-check form-check-inline">
                <input class="form-check-input" type="radio" name="iType" id="inlineRadio2" value="float">
                <label class="form-check-label" for="inlineRadio2">Valós szám</label>
            </div>
            <div class=" form-check form-check-inline">
                <input class="form-check-input" type="radio" name="iType" id="inlineRadio3" value="text">
                <label class="form-check-label" for="inlineRadio3">Szöveg</label>
            </div>
        </div>
        <div class="m-auto" style="width: 30%">
            <label style="display: block">Minta bemenet</label>
            <label for="SempInputData">Bemeneti adatok</label>
            <input type="text" class="form-control" name="SempInutData" id="inputData" placeholder="Az adatokat szóközzel válassza el."/>
        </div>
        <div class="m-auto" style="width: 30%">
            <label for="oType" style="display: block" >Kimeneti adatok típusa</label>
            <div class=" form-check form-check-inline">
                <input class="form-check-input" type="radio" name="oType" id="inlineRadio1" value="int">
                <label class="form-check-label" for="inlineRadio1">Egész szám</label>
            </div>
            <div class=" form-check form-check-inline">
                <input class="form-check-input" type="radio" name="oType" id="inlineRadio2" value="float">
                <label class="form-check-label" for="inlineRadio2">Valós szám</label>
            </div>
            <div class=" form-check form-check-inline">
                <input class="form-check-input" type="radio" name="oType" id="inlineRadio3" value="text">
                <label class="form-check-label" for="inlineRadio3">Szöveg</label>
            </div>
        </div>
        <div class="m-auto" style="width: 30%">
            <label for="SempOutputData">Minta kimenet</label>
            <label for="SempOutpitData">Kimeneti adatok</label>
            <input type="text" class="form-control" name="SempOutpitData" id="SempOutpitData" placeholder="Az adatokat szóközzel válassza el."/>
        </div>
        @for ($i = 0; $i < 4; $i++)
            <div class="m-auto" style="width:30%">
                <label for="InputData{{$i+1}}">Bemeneti adatok #{{$i+1}}</label>
                <input type="text" class="form-control" name="InputData{{$i+1}}" id="InputData{{$i+1}}" placeholder="Az adatokat szóközzel válassza el."/>
            </div>
            <div class="m-auto" style="width:30%">
                <label for="OutputData{{$i+1}}">Kimeneti adatok #{{$i+1}}</label>
                <input type="text" class="form-control" name="OutputData{{$i+1}}" id="InputData{{$i+1}}" placeholder="Az adatokat szóközzel válassza el."/>
            </div>
        @endfor
        <div class="m-auto mt-3" style="width: 30%">
            <button type="submit" class="btn btn-success">Feltöltés</button>
        </div>
        
    </form>
</div>
