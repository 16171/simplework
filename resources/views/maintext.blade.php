@extends('layouts.app')

@section('content')
    <!-- <div>{{ $obj->name }}</div> -->
    <div>{!! $obj->body !!}</div>

@endsection
{{--@section('content')
   --}}{{--<div>{{ $obj->name }}</div>--}}{{--
    <div>{!! $obj->body !!}</div>
   div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12">
           <div class="card">
               <div class="product-bit title text-center product-big-title-area sidebar-title">
                   --}}{{--<h2 class="section-title"> {{@obj->name}}</h2>--}}{{--
               </div>
               <div class="card-body">
                   {!! $obj->contacts !!}
               </div>
           </div>
       </div>
   </div>

@endsection--}}


{{--
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="product-bit title text-center product-big-title-area sidebar-title">
                    <h2 class="section-title"> {{@obj->name}}</h2>
                </div>
                <div class="card-body">
                    {!! $obj->contacts !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}

