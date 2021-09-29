@extends('layouts.admin')
@section('content')
@csrf
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Bordered with Striped Rows</h2>
                    <a href="{{route('admin.products.create')}}" class="btn btn-info">Добавить товар</a>
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Active</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->active}}</td>
                                <td><a href="{{route('admin.products.edit',['product' => $product->id])}}">Редактировать</a></td>
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
