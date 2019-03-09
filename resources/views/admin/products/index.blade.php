@extends('layouts.main',['footer' => false,'lastNews' => false, 'slider' => false])

@section('content')

    <div class="col-md-12">
        @include('layouts.include.top-cats', ['sidebarCats' => $sidebarCats ?? []])
        <div class="card  mb-lg-5">
            <div class="card-header">Товары</div>
            <div class="card-body table-responsive">
                <a href="{{ route('admin.products.create')}}" class="btn btn-primary">Создать товар</a>
                <br>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Фото</th>
                        <th>Название товара</th>
                        <th>Категория товара</th>
                        <th>Цена</th>
                        <th>Описание товара</th>
                        <th>Действия</th>
                    </tr>

                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td><img width="60" src="{{$product->photo}}"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->categoryItem->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description}}</td>
                            <td>

                                <div class="btn-group">
                                    <a href="{{route('admin.products.edit', [$product->id])}}"
                                       style="margin-right: 20px;">
                                        <img src="/img/edit.png" alt=""></a>
                                    <a href="{{route('admin.products.destroy', [$product->id])}}">
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
