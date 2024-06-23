<!-- resources/views/skill/detail.blade.php -->

@extends('adminTemplate.layouts.main')
@section('container')
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" class="form-control" value="{{ $skill->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="skill">Skill</label>
                <input type="text" id="skill" name="skill" class="form-control" value="{{ $skill->skill }}" readonly>
            </div>
            <a href="{{ URL::to('admin/skill') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
@endsection
