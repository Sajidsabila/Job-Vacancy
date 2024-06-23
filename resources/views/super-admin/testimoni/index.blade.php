@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    <hr>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <table id="datatable1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Quote</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $index => $testimonial)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $testimonial->jobSeeker->first_name ?? 'No Job Seeker' }}</td>
                                <!-- Using null-safe operator and fallback text -->
                                <td>{{ $testimonial->quote }}</td>
                                <td>{{ $testimonial->job }}</td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ URL::to('admin/testimonial/' . $testimonial->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this testimonial?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
