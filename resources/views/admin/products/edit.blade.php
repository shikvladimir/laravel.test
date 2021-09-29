@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <form action="{{route('admin.products.update',['product' => $product])}}" method="post">
                @method('put')
                @csrf
                <input type="text" name="name" value="{{$product->name}}">
                <input type="text" name="price" value="{{$product->price}}">
                <input type="text" name="active" value="{{$product->active}}">
                <button type="submit">Save</button>
            </form>

        </div>
    </div>>
@endsection
