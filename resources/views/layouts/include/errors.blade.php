<?php
/* @var $errors \Illuminate\Support\ViewErrorBag */
?>

@if($errors ?? false)
    @foreach($errors->all(':message') as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif
