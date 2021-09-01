@extends('layouts.layout')

@section('title', 'Регистрация')

@section('content')
    <main role="main" class="flex-shrink-0 mt-5">
        <h1 class="mt-5 mb-5">
            <center>Регистрация</center>
        </h1>
        <div class="container">
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="InputUserName">Имя:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="InputUserName" placeholder="Введите имя" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="InputEmail" placeholder="Введите Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="InputPassword">Пароль:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="InputPassword" placeholder="Введите пароль">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="InputPassword_2">Введите Ваш пароль еще раз:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password_confirmation" id="InputPassword_2" placeholder="Введите Ваш пароль еще раз">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success mt-3 mb-3">Зарегистрироваться</button>
            </form>
            <hr>
            <a href="{{ route('login.create') }}" class="text-center mt-2">Страница авторизации</a>
        </div>
    </main>
@endsection
