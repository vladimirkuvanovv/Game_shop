@extends('layouts.main')

@section('content')
    <div class="content-main__container">
        <div class="news-list__container">
            @foreach($news as $newsItem)
                <div class="news-list__item">
                    <div class="news-list__item__thumbnail"><img src="{{$newsItem->photo}}"></div>
                    <div class="news-list__item__content">
                        <div class="news-list__item__content__news-title">{{$newsItem->name}}</div>
                        <div
                            class="news-list__item__content__news-date">{{\Carbon\Carbon::parse($newsItem->created_at)->toDateString()}}</div>
                        <div class="news-list__item__content__news-content">
                            {{$newsItem->description}}
                        </div>
                    </div>
                    <div class="news-list__item__content__news-btn-wrap"><a href="{{$newsItem->Url}}" class="btn btn-brown">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('page-nav')
@endsection
