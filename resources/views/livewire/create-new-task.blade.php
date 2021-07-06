   <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Új feladat</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="form-group m-t">
                       <form >
                           @csrf
                           <div class="m-auto mt-3">
                               <label for="taskName">Feladat neve</label>
                               <input type="text" class="form-control" name="taskName" id="taskName" wire:model="taskName" />
                               @error('taskName')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           <div class="m-auto" >
                               <label for="taskDesc" style="display:block">Feladatleírás</label>
                               <textarea class="form-control" name="taskDesc" id="taskDesc" rows="5"
                                   style="  resize: none;" wire:model="taskDesc"></textarea>
                                @error('taskDesc')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           <div class='m-auto'>
                               <label for="selectedClass">Osztály: </label>
                               <select class='form-control' name='selectedClass' id="class" wire:model="selectedClass">
                                   <option value='__' selected="selected"></option>
                                   <option value='09'>IX Osztály</option>
                                   <option value='10'>X Osztály</option>
                                   <option value='11'>XI Osztály</option>
                               </select>
                               @error('selectedClass')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           <div class='m-auto' >
                               <label for="selectedCategory">Kategóriák: </label>
                               <select class='form-control' name="selectedCategory" wire:model="selectedCategory">
                                   <option value='__' selected="selected"></option>
                                   @if (!is_null($categories))
                                       @foreach ($categories as $item)
                                           <option value='{{ $item->category_code }}'>{{ $item->category }}</option>
                                       @endforeach
                                   @endif
                               </select>
                               @error('selectedCategory')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           <div class="m-auto" >
                               <label for="selectedSubCategory">Alkategóriák: </label>
                               <select class='form-control' name="selectedSubCategory" wire:model="selectedSubCategory">
                                   <option value='__' selected="selected"></option>
                                   @if (!is_null($subCategories))
                                       @foreach ($subCategories as $item)
                                           <option value='{{ $item->sub_category_code }}'>{{ $item->sub_category }}
                                           </option>
                                       @endforeach
                                   @endif
                               </select>
                               @error('selectedSubCategory')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           <div class="m-auto" >
                               <label for="difficulty" style="display:block;">Nehézség</label>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="difficulty" id="inlineRadio1"
                                       value=1 wire:model="difficulty">
                                   <label class="form-check-label" for="inlineRadio1">Kőnyű</label>
                               </div>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="difficulty" id="inlineRadio2"
                                       value=2 wire:model="difficulty">
                                   <label class="form-check-label" for="inlineRadio2">Közepes</label>
                               </div>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="difficulty" id="inlineRadio3"
                                       value=3 wire:model="difficulty">
                                   <label class="form-check-label" for="inlineRadio3">Nehéz</label>
                               </div>
                               @error('difficulty')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           <!--Teszte-->
                           <div class="m-auto" >
                               <label for="inputType" style="display: block">Bemeneti adatok típusa</label>
                               <div class=" form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="inputType" id="inlineRadio1"
                                       value="int" wire:model="inputType">
                                   <label class="form-check-label" for="inlineRadio1">Egész szám</label>
                               </div>
                               <div class=" form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="inputType" id="inlineRadio2"
                                       value="float" wire:model="inputType">
                                   <label class="form-check-label" for="inlineRadio2">Valós szám</label>
                               </div>
                               <div class=" form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="inputType" id="inlineRadio3"
                                       value="text" wire:model="inputType">
                                   <label class="form-check-label" for="inlineRadio3">Szöveg</label>
                               </div>
                               @error('inputType')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           <div class="m-auto" >
                               <label style="display: block">Minta bemenet</label>
                               <label for="sampelInput">Bemeneti adatok</label>
                               <input type="text" class="form-control" name="sampelInput" id="sampelInput"
                                   placeholder="Az adatokat szóközzel válassza el." wire:model="sampelInput"/>
                                @error('sampelInput')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           <div class="m-auto" >
                               <label for="outputType" style="display: block">Kimeneti adatok típusa</label>
                               <div class=" form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="outputType" id="inlineRadio1"
                                       value="int" wire:model="outputType">
                                   <label class="form-check-label" for="inlineRadio1">Egész szám</label>
                               </div>
                               <div class=" form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="outputType" id="inlineRadio2"
                                       value="float" wire:model="outputType">
                                   <label class="form-check-label" for="inlineRadio2">Valós szám</label>
                               </div>
                               <div class=" form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="outputType" id="inlineRadio3"
                                       value="text" wire:model="outputType">
                                   <label class="form-check-label" for="inlineRadio3">Szöveg</label>
                               </div>
                               @error('outputType')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           <div class="m-auto" >
                               <label for="sampelOutput">Minta kimenet</label>
                               <label for="sampelOutput">Kimeneti adatok</label>
                               <input type="text" class="form-control" name="sampelOutput" id="sampelOutput"
                                   placeholder="Az adatokat szóközzel válassza el." wire:model="sampelOutput"/>
                                @error('sampelOutput')<span class="text-danger">{{$message}}</span> @enderror
                           </div>
                           @for ($i = 0; $i < 4; $i++)
                               <div class="m-auto" >
                                   <label for="input{{ $i + 1 }}">Bemeneti adatok
                                       #{{ $i + 1 }}</label>
                                   <input type="text" class="form-control" name="input{{ $i + 1 }}"
                                       id="input{{ $i + 1 }}"
                                       placeholder="Az adatokat szóközzel válassza el." 
                                       wire:model="input{{$i+1}}"/>
                               </div>
                               @error("input{{$i+1}}")<span class="text-danger">{{$message}}</span> @enderror
                               <div class="m-auto" >
                                   <label for="output{{ $i + 1 }}">Kimeneti adatok
                                       #{{ $i + 1 }}</label>
                                   <input type="text" class="form-control" name="output{{ $i + 1 }}"
                                       id="output{{ $i + 1 }}"
                                       placeholder="Az adatokat szóközzel válassza el." 
                                       wire:model="output{{$i+1}}"/>
                               </div>
                               @error('output{{ $i+ 1}}')<span class="text-danger">{{$message}}</span> @enderror
                           @endfor
                       </form>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
                   <button type="button" class="btn btn-primary" wire:click.prevent="store()">Feladat mentése</button>
               </div>
           </div>
       </div>
   </div>