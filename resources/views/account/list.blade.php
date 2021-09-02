@extends('layouts.layout')

@section('title', 'Список заявок')

@section('content')

    <h1 class="mt-5">
        <center>Список заявок</center>
    </h1>

    <div class="container mt-5">
        @if ($applications->count())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Заявка</th>
                        <th scope="col">Компания</th>
                        <th scope="col">Дата создания</th>
                        <th scope="col">Сообщение</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <th scope="row">{{ $application->application }}</th>
                            <td>{{ $application->company }}</td>
                            <td>{{ $application->getApplicationDate() }}</td>
                            <td>{{ $application->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $applications->onEachSide(2)->links() }}
            </div>
        @else
            <div class="text-center">
                <p>Список заявок пуст....</p>
            </div>
        @endif
        <div class="text-center">
            <hr>
            <a href="{{ route('home') }}" class="text-center mt-2">Назад на главную</a>
            <br>
            <a href="{{ route('applications.create') }}" class="text-center mt-2">Форма обратной связи</a>
        </div>
    </div>

@endsection
