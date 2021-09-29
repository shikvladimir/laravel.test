@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <form action="{{route('admin.categories.update',['category' => $category])}}" method="post">
                @method('put')
                @csrf
                <input type="text" name="name" value="{{$category->name}}">
                <input type="text" name="title" value="{{$category->title}}">
                <button type="submit">Save</button>
            </form>
        </div>
    </div>>
@endsection
