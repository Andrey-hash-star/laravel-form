@extends('layouts.layout')

@section('title', 'Главная страница')

@section('content')
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="mb-3">Главная страница</h1>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <p> Ваше имя: <b>{{ auth()->user()->name }}.</b></p>
                    <p> Ваш Email: <b>{{ auth()->user()->email }}.</b></p>
                    <a href="{{ route('logout') }}" class="btn btn-success my-2">Выйти</a>
                    <hr>
                    <div class="d-grid gap-2">
                        <a href="{{ route('applications.create') }}" class="btn btn-success">Форма обратной связи</a>
                        <a href="{{ route('applications.index') }}" class="btn btn-success">Список заявок</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
