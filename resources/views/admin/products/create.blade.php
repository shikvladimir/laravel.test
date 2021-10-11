@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="div">
            <h1>Добавление товара</h1>
        </div>
        <div class="container-fluid">
            <form action="{{route('admin.products.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label>Название</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label>Цена</label>
                    <input class="form-control" type="text" name="price">
                </div>
                <div class="form-group">
                    <label>Active</label>
                    <input class="form-control" type="text" name="active">
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input class="form-control" type="file" name="photo">
                </div>

                <button class="btn btn-info" type="submit">Save</button>
            </form>

        </div>
    </div>
@endsection
