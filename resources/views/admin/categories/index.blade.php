@extends('layouts.main',['footer' => false,'lastNews' => false, 'slider' => false])

@section('content')

    <div class="col-md-12">
        @include('layouts.include.top-cats', ['sidebarCats' => $sidebarCats ?? []])
        <div class="card  mb-lg-5">
            <div class="card-header">Категории</div>
            <div class="card-body table-responsive">
                <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Создать категорию</a>
                <br>
                <br>
                <table class="table table-striped">

                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Действия</th>
                    </tr>


                    @foreach($categories ?? [] as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.categories.edit', [$category->id])}}"
                                        style="margin-right: 20px;">
                                        <img src="/img/edit.png" alt=""></a>
                                    <a href="{{route('admin.categories.destroy', [$category->id])}}">
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
