@extends('layouts.main',['footer' => false,'lastNews' => false, 'slider' => false])

@section('content')
    <div class="col-md-12">
        <div class="card  mb-lg-5">
            <div class="card-header h3">Создание категории</div>
            <div class="card-body">
                <form action="{{route('admin.categories.store')}}" method="post" style="max-width: 500px;">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                               aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="desc">Описание</label>
                        <textarea class="form-control" id="desc" rows="3" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Создать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
