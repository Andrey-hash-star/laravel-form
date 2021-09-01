@extends('layouts.layout')

@section('title', 'Авторизация')

@section('content')
    <main role="main" class="flex-shrink-0 mt-5">
        <h1 class="mt-5 mb-5">
            <center>Авторизация</center>
        </h1>
        <div class="container">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="InputEmail">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="InputEmail" placeholder="Введите Email">
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
                <button type="submit" class="btn btn-success mt-3 mb-3">Войти</button>
            </form>
            <hr>
            <a href="{{ route('register.create') }}" class="text-center mt-2">Страница регистрации</a>
        </div>
    </main>
@endsection
