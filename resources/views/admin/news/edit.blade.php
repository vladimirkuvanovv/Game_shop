@extends('layouts.main',['footer' => false,'lastNews' => false, 'slider' => false])

@section('content')
    <div class="col-md-12">
        <div class="card  mb-lg-5">
            <div class="card-header">Редактирование товара</div>
            <div class="card-body">
                <form action="{{route('admin.news.update', [$news->id])}}" method="post"
                      enctype="multipart/form-data" style="max-width: 500px;">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="file">Фото</label>
                        <input type="file" class="form-control" id="file" name="file">
                        <img src="{{$news->photo}}" width="150">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название новости</label>
                        <input type="text" class="form-control" value="{{old('name',$news->name)}}"
                               id="exampleInputEmail1" name="name"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="desc">Описание новости</label>
                        <textarea class="form-control" id="desc" rows="3"
                                  name="description">{{old('description',$news->description)}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
