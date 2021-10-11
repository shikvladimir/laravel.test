@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="div">
            <h1>Панель редактирования</h1>
        </div>
        <div class="container-fluid">
            <form action="{{route('admin.products.update',['product' => $product])}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Название</label>
                    <input class="form-control" type="text" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label>Цена</label>
                    <input class="form-control" type="text" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label>Active</label>
                    <input class="form-control" type="text" name="active" value="{{$product->active}}">
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input class="form-control" type="file" name="photo" value="{{$product->photo}}">
                </div>

                <button class="btn btn-info" type="submit">Save</button>
            </form>
            <label></label>
            <form action="{{route('admin.products.destroy',['product' => $product])}}" method="post">
                @csrf
                @method('delete')

                <script>
                    function myFunction() {
                        if((confirm("Вы уверены что хотите удалить товар?"))){
                            return true;
                        }else{
                                return false;
                            }
                        }
                </script>

                <button class="btn btn-danger" onclick="return myFunction()" type="submit">Delete product</button>
            </form>

        </div>
    </div>
@endsection
