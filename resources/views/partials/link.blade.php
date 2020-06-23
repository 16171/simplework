<?php
<li>
<a href ="#{{$one->id}}">{{$one->name}}</a>
@if ($one->catalogs()->get())
    <ul>
        @foreach($one->catalogs()->get() as $one)
            @include('documents.partials.link', $one)
        @endforeach
    </ul>
    @endif
    </li>
