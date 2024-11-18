@error('mess')
    <script>
        alert({{mess}});
    </script>
@enderror


@extends('layouts/header')
@section('title', 'index')
@section('content')
    <form method="POST" action="{{route('registration')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Логин</label>
            <input name="login" type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ФИО</label>
            <input name="full_name" type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Телефонный номер</label>
            <input name="phone" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Почта</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button><br>
        <span>Уже есть аккаунт? <a href="{{route('index')}}">Войдите</a></span>
  </form>
@endsection