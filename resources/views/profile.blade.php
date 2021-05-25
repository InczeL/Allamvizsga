@extends('app')

@section('content')
    <div class="conteinr  justify-content-md-center  mx-5 mt-5 row">
        <div class="col-3 mt-3">
            <img src="avatars/{{session()->get('LoggedUser')->profile_img}}" class="rounded-circle">
            <form enctype="multipart/form-data" action='/profile' method="POST" class="mt-3">
                @csrf
                <label>Profilkép frissítése</label>
                <input class="form-control" type="file" name="avatar" id='avatar'>
                <button type="submit" class="btn mt-2 btn-success">Képfeltöltése</button>
            </form>
        </div>
        <div class="col-4 mt-3 ms-2">
            <label>Felhasználónév</label>
            <div class="mt-3">
                <span>{{ session()->get('LoggedUser')->user_name}}</span>
            </div>
            <label class="mt-3">E-mail</label>
            <div class="mt-3">
                <span>{{ session()->get('LoggedUser')->email }}</span>
            </div>
        </div>
        @livewire('own-results')
    </div>
@endsection