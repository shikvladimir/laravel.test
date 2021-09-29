@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <form action="{{route('admin.products.store')}}" method="post">
                @csrf
                <input type="text" name="name">
                <input type="text" name="price">
                <input type="text" name="active">
                <button type="submit">Save</button>
            </form>

        </div>
    </div>>
@endsection
