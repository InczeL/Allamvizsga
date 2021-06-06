<div style="border:2px solid black">
    <form action='{{ route('getTasks') }}' method='GET'>
        @csrf
        <div class='form-group'>
            <label>Osztály: </label>
            <select class='form-control' name='class' wire:model="selectedClass">
                <option value='__'>__</option>
                <option value='09'>IX Osztály</option>
                <option value='10'>X Osztály</option>
                <option value='11'>XI Osztály</option>
            </select>
        </div>
        <div class='form-group'>
            <label>Kategóriák: </label>
            <select class='form-control' name="category" wire:model="selectedCategory">
                <option value='__'>__</option>
                @if (!is_null($categories))
                    @foreach ($categories as $item)
                        <option value='{{ $item->category_code }}'>{{ $item->category }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class='form-group'>
            <label>Alkategóriák: </label>
            <select class='form-control' name="subcategory">
                <option value='__' selected="selected">__</option>
                @if (!is_null($subCategories))
                    @foreach ($subCategories as $item)
                        <option value='{{ $item->sub_category_code }}'>{{ $item->sub_category }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class='form-group'>
            <label>Nehézség:</label>
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
            <button type="submit" class="btn btn-success  my-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-funnel-fill" viewBox="0 0 16 16">
                    <path
                        d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                </svg> Keresés
            </button>
    </form>
</div>
