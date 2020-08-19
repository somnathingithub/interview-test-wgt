@extends('dashboard_layout')
@section('content')
    <form action="{{ url('/items/save') }}" id="login-form" class="form" method="post" autocomplete="off">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="text-info">Item Name</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status" class="text-info">Status:</label><br>
            <input type="radio" name="status" value="1" checked>On
            <input type="radio" name="status" value="2">No
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stock" class="text-info">Stock:</label><br>
            <select name="stock" class="form-control">
                <option value="">Select Stock</option>
                <option value="in_stock">In Stock</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>
            @error('stock')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stock" class="text-info">Expired Date:</label><br>
            <input type="text" name="expired_date" id="datepicker" value="{{ old('expired_date') }}" class="form-control">
            @error('expired_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
            <a class="btn btn-danger btn-md" href="{{ url('items') }}">Cancel</a>
        </div>
    </form>
@endsection
