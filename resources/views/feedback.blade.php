@extends('layouts.main')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Напишите нам</div>
        </div>
    </div>
    @if (Session::has('feedback_success'))
        <div class="content-main__container col-sm-6">
            <div class="alert alert-success"> {{ Session::get('feedback_success') }}</div>
        </div>
    @else
        <div class="content-main__container">
            <div class="feedback">
                <form name="feedback-form" method="post" action="{{route('feedback.send')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" name="name" id="name" placeholder="Ваше имя" value="{{old('name','')}}"
                               aria-describedby="nameHelp" class="form-control  form-control-lg">
                        <small id="nameHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{old('email','')}}"
                               placeholder="exe@example.com" aria-describedby="emailHelp"
                               class="form-control form-control-lg">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="textarea">Введите сообщение</label>
                        <textarea id="textarea" rows="5" name="text" class="form-control">{{old('text')}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    @endif
@endsection

@section('page-nav')
@endsection
