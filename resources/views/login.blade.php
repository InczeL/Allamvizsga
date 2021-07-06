@extends('app')

@section('content')
    <div class="mt-3">
        <form action="{{ route('check')}}" method="POST">

            @if (Session::get('fail'))
                <div class="alert alert-danger m-auto" style="width: 20%">
                    {{Session::get('fail')}}
                </div>
            @endif

            @csrf
            <div class="form-group m-auto " style="width: 20%">
                <label>Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" />
                <span class="text-danger" >@error('email'){{$message}}@enderror </span>
            </div>
            <div class="form-group m-auto " style="width: 20%">
                <label>Jelszó</label>
                <input type="password" name="password" id="password" class="form-control"/>
                <span class="text-danger" >@error('password'){{$message}}@enderror </span>
            </div>
       
            
            <button type="submit" class="btn btn-success" style="margin-left: 45%;margin-top:1%">Bejelentkezés</button>
        </form>
    </div>
@endsection