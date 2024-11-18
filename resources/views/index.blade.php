@error('mess')
    <script>
        alert({{mess}});
    </script>
@enderror


@extends('layouts/header')
@section('title', 'index')
@section('content')
    @guest
        <form method="POST" action="{{route('auth')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Логин</label>
                <input name="login" type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            
            
            <button type="submit" class="btn btn-primary">Войти </button><br>
            <span>Еще нет аккаунта? <a href="{{route('index')}}">Зарегистрируйтесь</a></span>
    </form>
    @endguest

    @auth



        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
            </div>
        </div>



    @endauth
@endsection