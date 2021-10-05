@extends('layouts.shop')

@section('content')
<div class="container">
    <div class="row">
        @dump($errors->all())
        <div class="col-md-12">
            <form action="{{route('registration')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-info">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
