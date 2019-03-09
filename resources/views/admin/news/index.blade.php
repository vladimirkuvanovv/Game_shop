@extends('layouts.main',['footer' => false,'lastNews' => false, 'slider' => false])

@section('content')

    <div class="col-md-12">
        @include('layouts.include.top-cats', ['sidebarCats' => $sidebarCats ?? []])
        <div class="card  mb-lg-5">
            <div class="card-header">Новости</div>
            <div class="card-body table-responsive">
                <a href="{{route('admin.news.create')}}" class="btn btn-primary">Создать новость</a>
                <br>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Фото</th>
                        <th>Название новости</th>
                        <th>Описание новости</th>
                        <th>Дата создания новости</th>
                        <th>Действия</th>
                    </tr>
                    @foreach($news as $newsItem)
                        <tr>
                            <th scope="row">{{$newsItem->id}}</th>
                            <td><img width="60" src="{{$newsItem->photo}}"></td>
                            <td>{{$newsItem->name}}</td>
                            <td>{{$newsItem->description}}</td>
                            <td>{{$newsItem->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.news.edit', [$newsItem->id])}}"
                                       style="margin-right: 20px;"><img
                                                src="/img/edit.png" alt=""></a>
                                    <a href="{{route('admin.news.destroy', [$newsItem->id])}}">
                                        <img src="/img/delete.png" alt=""></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
