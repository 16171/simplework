@extends('layouts.app')
{{--@extends('auth.login')--}}
@push('scripts')
    <script scr="{{asset('public/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'body', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script src="{{asset('public/js/modal.js')}}"></script>
    @endpush

@section('content')
 <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Кабинет пользователя</div>

                <div class="card-body">
                    <form method="post" action="{{asset('home')}}" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label for="name">Название товара</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                            <div class="error">{{$message}}</div>
                            @enderror
                            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>
                        <div class="form-group">
                            <label for="catalog_id">Каталог</label>
                            <select class="form-control" id="catalog_id" name="catalog_id">
                                @foreach($catalogs as $one)
                                <option value="{{$one->id}}">{{$one->name}}</option>
                                @endforeach
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input type="text" class="form-control" id="price">
                            {{--<select class="form-control" id="price" name="price">--}}
                                <div class="form-group">
                                    <label for="body">Описание товара</label>
                                    <textarea class="form-control" id="body" rows="5" name="body"></textarea>
                                    @error('body')
                                    <div class="error">{{$message}}</div>
                                    @enderror
                                </div>

                                    <div class="form-group">
                                        <label for="picture1">Изображение</label>
                                        <input type="file" class="form-control-file" id="picture1" name="picture1">
                                    </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <th>Название</th>
                            <th width="100px">Изображение</th>
                            <th>Категория</th>
                            <th>Действия</th>
                        </tr>
                        @foreach($products as $prod)
                            <tr>
                                <td>{{$prod->name}}</td>
                                <td width="120px">
                                    @if($prod->picture)
                                        <img src="{{asset('public/uploads/'.$prod->user_id.'/s'.$prod->picture)}}"width="100%">
                                        @else
                                        -
                                        @endif
                                        <img src="{{asset('public/uploads/'.$prod->user_id.'/s_'.$prod->pictire)}}"width="100%">
                                </td>
                                <td>-</td>
                                <td>{{$prod->catalogs}}</td> {{--<td>{{$prod->catalogs->name}}</td>--}}
                                <td width="80px">
                                    <a href="{{asset('home/delete/'.$prod->id)}}"class="btn btn-default btn-block">Удалить</a>
                                 </td>
                            </tr>
                        @endforeach

                    </table>
                    <p align="centr">{!! $products->links() !!}</p>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы авторизированы!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
