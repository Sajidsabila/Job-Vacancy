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
                    <div class="tab-content m-2 p-2">
                        <h5>Riwayat Lamaran</h5>
                        <table class="table table-striped table-bordered m-3 mr-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Posisi Yang Dilamar</th>
                                    <th>Perusahaan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobhistories as $key => $jobhistories)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $jobhistories->job->title }}</td>
                                        <td>{{ $jobhistories->job->company->company_name }}</td>
                                        <td>{{ $jobhistories->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
