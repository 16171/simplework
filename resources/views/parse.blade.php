@extends('layouts.app')
@push('scripts')
    <script src="{{asset('/js/parse.js')}}"></script>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Парсинг сайтов</div>
                    <div class="card-body">
                        <nav>
                            <a href="#" class="btn btn-primary" id="parse_onliner">Onliner.by</a>
                            <a href="#" class="btn btn-primary" id="parse_24.by">24.by</a>
                        </nav>
                        <div id="empty">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
