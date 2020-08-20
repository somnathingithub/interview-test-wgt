@extends('dashboard_layout')
@section('content')
    <br/>
    <br>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success')
            @endphp
        </div>
    @endif
    <br/>
@endsection
