@extends('layouts.layout')

@section('title', 'Форма обратной связи')

@section('content')

    <h1 class="mt-5">
        <center>Форма обратной связи</center>
    </h1>

    <div class="container">

        <form action="{{ route('applications.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="InputName">Имя:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="InputName"
                    placeholder="Введите Ваше имя......" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="InputTel">Номер телефона:</label>
                <input type="tel" name="tel" class="form-control @error('tel') is-invalid @enderror" id="InputTel"
                    placeholder="Введите Ваш номер телефона......" value="{{ old('tel') }}">
                @error('tel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror    
            </div>
            <div class="form-group mt-3">
                <label for="InputСompany">Компания:</label>
                <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="InputСompany"
                    placeholder="Введите название компании......" value="{{ old('company') }}">
                @error('company')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror    
            </div>
            <div class="form-group mt-3">
                <label for="InputApplication">Название заявки:</label>
                <input type="text" name="application" class="form-control @error('application') is-invalid @enderror" id="InputApplication"
                    placeholder="Введите название заявки......" value="{{ old('application') }}">
                @error('application')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror    
            </div>
            <div class="form-group mt-3">
                <label for="InputMessage">Сообщение:</label>
                <textarea class="form-control @error('application') is-invalid @enderror" name="message" id="InputMessage"
                    placeholder="Введите сообщение......"></textarea>
                @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror    
            </div>
            <div class="form-group mt-3">
                <label for="InputFile">Загрузить файл:</label>
                <input type="file" name="file" class="form-control-file" id="InputFile">
            </div>
            <button type="submit" class="btn btn-success mt-3 mb-3">Отправить</button>
        </form>
        <hr>
        <a href="{{ route('home') }}" class="text-center mt-2">Назад на главную</a>
        <br>
        <a href="{{ route('applications.index') }}" class="text-center mt-2">Список заявок</a>
    </div>



@endsection
