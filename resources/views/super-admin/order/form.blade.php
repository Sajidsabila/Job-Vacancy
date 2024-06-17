@extends('adminTemplate.layouts.main')
@section('container')
    @if (isset($order))
        <form method="POST" action="{{ URL::to('admin/order/' . $order->id) }}" autocomplete="off">
            @method('put')
        @else
            <form method="POST" action="{{ URL::to('admin/order') }}" autocomplete="off">
    @endif

    @csrf
    <div class="row">
        <div class="col-6">
       
            <div class="form-group">
                <label for="email">Email</label>
<input type="text" id="email" name="email"
                    class="form-control @error('email')is-invalid @enderror"
                    value="{{ isset($order) ? $order->email : old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                    class="form-control @error('password')is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control @error('role')is-invalid @enderror" name="role" id="role">
                    <option value="Order {{ isset($order) ? ($order->role === 'Order' ? 'selected' : '') : '' }}">Order</option>
                    <option value="Admin {{ isset($order) ? ($order->role === 'Admin' ? 'selected' : '') : '' }}">Admin
                    </option>
                </select>
            </div>
<button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ URL::to('admin/order') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
    </form>
@endsection