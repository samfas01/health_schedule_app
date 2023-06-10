@extends('layouts.site')
@section('content')
    <div class="container" style="padding-top: 120px;">
        @if (session('error_message'))
            <div class="alert alert-danger">
                {{ session('error_message') }}
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        @yield('page')
    </div>
@endsection
