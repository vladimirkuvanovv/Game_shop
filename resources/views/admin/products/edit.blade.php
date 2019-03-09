@extends('layouts.main',['footer' => false,'lastNews' => false, 'slider' => false])

@section('content')
    <div class="col-md-12">
        <div class="card  mb-lg-5">
            <div class="card-header">Редактирование товара</div>
            <div class="card-body">
                <form action="{{route('admin.products.update', [$product->id])}}" method="post"
                      enctype="multipart/form-data" style="max-width: 500px;">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="file">Фото</label>
                        <input type="file" class="form-control" id="file" name="file">
                        <img src="{{$product->photo}}" width="150">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название товара</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                               aria-describedby="emailHelp"
                               value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput">Категория товара</label>
                        <select name="category" id="exampleInput">
                            <option value="">Выберите категорию</option>
                            @foreach($categories ?? [] as $catItem)
                                <option value="{{$catItem->id}}">{{$catItem->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example">Цена</label>
                        <input type="number" class="form-control" id="example" name="price" aria-describedby="emailHelp"
                               value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label for="desc">Описание товара</label>
                        <textarea class="form-control" id="desc" rows="3"
                                  name="description">{{$product->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
