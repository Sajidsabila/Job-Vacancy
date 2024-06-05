@extends('landing-page.layouts.main')

@section('content')
    @include('sweetalert::alert')
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Account settings</h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        @include('job-seekers.navbar-profile')
                    </div>
                </div>
                <div class="col-md-9">
                    @if (isset($skill))
                        <form action="{{ URL::to('/profile/skills/update/' . $skill->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                        @else
                            <form action="{{ URL::to('/profil/skills/create') }}" method="post"
                                enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Skills</label>
                                    <input type="text" class="form-control @error('skill')is-invalid @enderror"
                                        name="skill" value="{{ isset($skill) ? $skill->skill : old('skill') }}">
                                    @error('skill')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left m-4">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
