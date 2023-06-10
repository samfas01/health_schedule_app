@php
    $bodyBg = true;
@endphp
@extends('layouts.site')
@section('content')
<div style="padding-top: 120px; height:100%; position: relative;">

    <div class="container">
        @yield('page')
    </div>
</div>
@endsection
