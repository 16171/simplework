@extends('layouts')
@push('scripts')
    <script src="{{asset('js/modal.js')}}"defer></script>
@endpush
@push('styles')
    <link href="{{asset('css/modal.css')}}"rel="stylesheet" type="text/css"/>
    @endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$catalog->name}}</div>
                    <div class="card-body">
                        @foreach($objs as $one)
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('uploads/'.$one->user_id.'/s_'.$one->picture)}}" class="card-img-top" alt="{{asset($one->name)}}">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">{{$one->price}} руб.</p>
                                <a href="{{asset('product/'.$one->id)}}" class="btn btn-primary">Go product.blade</a>
                                <a href="#"data-id="{{asset($one->id)}}" class="btn btn-primary my_mod">Открыть тут</a>
                            </div>
                        </div>
                        @endforeach
                        <p align="center">{!! $objs->links() !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

