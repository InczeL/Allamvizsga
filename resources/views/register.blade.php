@extends('app')

@section('content')
    <div class="form-group mt-3">
        <form action="{{route('register')}}" method="POST" >
            @csrf
            <div class="m-auto " style="width: 20%">
                <label for="user_name">Felhasználónév</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="{{old('user_name')}}"/>
                <span class="text-danger" >@error('user_name'){{$message}}@enderror </span>
            </div>
            <div class="m-auto " style="width: 20%">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" class="form-control"/>
                <span class="text-danger" >@error('password'){{$message}}@enderror </span>
            </div>
            <div class="m-auto " style="width: 20%">
                <label for="password_confirmation">Jelszó megerősítések</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                <span class="text-danger" >@error('password_confirmation'){{$message}}@enderror </span>
            </div>
            <div class="m-auto " style="width: 20%">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" />
                <span class="text-danger" >@error('email'){{$message}}@enderror </span>
            </div>
            <div class="m-auto" style="width:20%">
                <label for="class"> Osztály</label>
                <select class='form-control' name="class"  id="class">
                    <option value="IX">IX</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                    <option value="XII+">XII+</option>
                </select>
            </div>
            <div class="m-auto" style="width: 20%">
                <label for="role">Szerepkör</label>
                <select class="form-control" name="role" id="role">
                    <option value="1" selected="selected">Diák</option>
                    <option value="2">Tanár</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 45%;margin-top:1%">Regisztráció </button>
        </form>
    </div>
@endsection
