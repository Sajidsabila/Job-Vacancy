@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    <hr>

{{-- 
    <a href="{{ URL::to('admin/testimoni/create') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"
            aria-hidden="true"></i>
        Add</a> --}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <table id="datatable1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            {{-- <th>Image</th> --}}
                            <th>Job</th>
                            <th>Quote</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimoni as $index => $testimoni)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $testimoni->jobSeeker->first_name }}
                                    {{ $testimoni->jobSeeker->last_name }}</td>
                                {{-- <td><img src="{{ URL::to('storage/' . $testimoni->jobSeeker->photo) }}" alt=""
                                        class="img-fluid" width="100px"></td> --}}
                                <td>{{ $testimoni->job }}</td>
                                <td>{{ $testimoni->quote }}</td>
                                <td>
                                    <div class="d-flex flex-column flex-md-row">
                                        <a href="{{ URL::to('admin/testimoni/' . $testimoni->id) }}"
                                            class="btn btn-sm btn-info mb-2 mb-md-0 mr-md-2">Show</a>
                                        <a href="{{ URL::to('admin/testimoni/' . $testimoni->id . '/edit') }}"
                                            class="btn btn-sm btn-warning mb-2 mb-md-0 mr-md-2">Edit</a>
                                        <form action="{{ URL::to('admin/testimoni/' . $testimoni->id) }}" method="post"
                                            class="mb-2 mb-md-0 mr-md-2">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Anda Yakin akan Menghapus {{ $testimoni->email }}?')">Delete</button>
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
