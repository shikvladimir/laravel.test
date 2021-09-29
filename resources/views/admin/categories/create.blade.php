@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <form action="{{route('admin.categories.store')}}" method="post">
                @csrf
                <input type="text" name="name">
                <input type="text" name="title">
                <button type="submit">Save</button>
            </form>
        </div>
    </div>>
@endsection
