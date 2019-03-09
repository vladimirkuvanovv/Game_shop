@extends('layouts.main')

@section('content')
    <div class="content-main__container">
        <div class="news-block content-text">
            <h3 class="content-text__title">
                {{$news->name}}
            </h3>
            <img src="{{$news->photo}}" alt="{{$news->name}}" class="alignleft img-news">
            <p>
                {{$news->description}}
            </p>
        </div>
    </div>
    @include('layouts.look-products')
@endsection

@section('page-nav')
@endsection
