@extends('layouts')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{asset('catalog/'.$obj->catalog_id)}}">{{$obj->catalogs->name}}</a>
                        {{$obj->name}}</div>
                        <div class="card-body">
                            <div class="card-body">
                        <img src="{{asset('uploads/'.$obj->user_id.'/'.$obj->picture)}}" class="card-img-top"/>
                        {!! $obj->body !!}
                        <hr />
                        {{$obj->price}} руб.
                    </div>


                        {{--@foreach($objs as $one)
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('uploads/'.$one->user_id.'/s_'.$one->picture)}}" class="card-img-top" alt="{{asset($one->name)}}">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">{{$one->price}} руб.</p>
                                <a href="{{asset('product/'.$one->id)}}" class="btn btn-primary">Go somfdgdsfg</a>
                            </div>
                        </div>
                        @endforeach
                        <p align="center">{!! $objs->links() !!}</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
