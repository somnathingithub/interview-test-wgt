@extends('dashboard_layout')
@section('content')
    <br/>
    <div class="row">
        <div class="col-md-1">
            <br>
            <a href="{{ url('/items/add') }}" class="btn btn-primary">Add Item</a>
        </div>
        <form action="{{ url('/items/filter') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-3">
                Search:
                <input type="text" name="search_value" placeholder="Search Name only..." value="{{ $search_value ?? '' }}" class="form-control">
            </div>
            <div class="col-md-3">
                From Date:
                <input type="date" name="from_date" value="{{ $from_date ?? '' }}" class="form-control">
            </div>
            <div class="col-md-3">
                To Date:
                <input type="date" name="to_date" value="{{ $to_date ?? '' }}" class="form-control">
            </div>
            <div class="col-md-1">
                <br>
                <button type="submit" class="btn btn-success">Filter</button>
            </div>
            <div class="col-md-1">
                <br>
                <a href="{{ url('items') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
    <br>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success')
            @endphp
        </div>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Stock</th>
            <th scope="col">Expired Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($items as $key => $value)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ ($value->status == 1) ? 'On' : 'Off' }}</td>
                <td>{{ $value->stock }}</td>
                <td>{{ date('d-m-Y', strtotime($value->expired_date)) }}</td>
                <td>
                    <a href="{{ url('items/edit/'.$value->id) }}">Edit</a> ||
                    <a href="{{ 'items/delete/'.$value->id }}">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No data found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <br/>
@endsection
