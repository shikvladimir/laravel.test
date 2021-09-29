@extends('layouts.admin')
@section('content')
@csrf
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Bordered with Striped Rows</h2>
                    <a href="{{route('admin.categories.create')}}" class="btn btn-info">Добавить категорию</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->title}}</td>
                                    <td><a href="{{route('admin.categories.edit',['category' => $category->id])}}">Редактировать</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        <!-- /.container-fluid -->
    </div>>
    </div>
@endsection
