@extends('adminTemplate.layouts.main')
@section('container')
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $testimoni->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" class="form-control" value="{{ $testimoni->password }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" id="role" name="role" class="form-control" value=" {{ $testimoni->role }}"
                    readonly>
            </div>
            <a href="{{ URL::to('admin/testimoni') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>

    </div>
@endsection
