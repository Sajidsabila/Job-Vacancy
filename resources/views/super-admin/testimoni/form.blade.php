@extends('adminTemplate.layouts.main')
@section('container')

    <form method="POST" action="{{ isset($testimoni) ? URL::to('admin/testimoni/' . $testimoni->id) : URL::to('admin/testimoni') }}" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @if (isset($testimoni))
            @method('put')
        @endif

        <div class="row">
            <div class="col-6">

                <div class="form-group">
                    <label for="job_seeker_id">Name</label>
                    <select id="job_seeker_id" name="job_seeker_id" class="form-control @error('job_seeker_id') is-invalid @enderror">
                        @foreach($jobSeekers as $jobSeeker)
                            <option value="{{ $jobSeeker->id }}" {{ isset($testimoni) && $testimoni->job_seeker_id == $jobSeeker->id ? 'selected' : '' }}>
                                {{ $jobSeeker->first_name }} {{ $jobSeeker->last_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('job_seeker_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="job">Job</label>
                    <input type="text" id="job" name="job" class="form-control @error('job') is-invalid @enderror"
                        value="{{ isset($testimoni) ? $testimoni->job : old('job') }}">
                    @error('job')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quote">Quote</label>
                    <textarea id="quote" name="quote" class="form-control @error('quote') is-invalid @enderror">{{ isset($testimoni) ? $testimoni->quote : old('quote') }}</textarea>
                    @error('quote')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <a href="{{ URL::to('admin/testimoni') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
        </div>
    </form>
@endsection
