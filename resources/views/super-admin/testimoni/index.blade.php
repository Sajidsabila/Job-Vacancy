@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    <hr>


    <a href="{{ URL::to('admin/testimoni/create') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"
            aria-hidden="true"></i>
        Add</a>
    <table id="datatable1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Image</th>
                <th>Job</th>
                <th>Quote</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimoni as $index => $testimoni)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $testimoni->name }}</td>
                    <td><img src="{{ URL::to('storage/' . $testimoni->image) }}" alt="" width="100px"></td>
                    <td>{{ $testimoni->job }}
                    <td>{{ $testimoni->quote }}</td>
                    <td>
                        <div class="d-flex ">
                            <a href="{{ URL::to('admin/testimoni/' . $testimoni->id) }}"
                                class="btn btn-sm btn-info mr-2">Show</a>
                            <a href="{{ URL::to('admin/testimoni/' . $testimoni->id . '/edit') }}"
                                class="btn btn-sm btn-warning mr-2">Edit</a>
                            <form action="{{ URL::to('admin/testimoni/' . $testimoni->id) }}" method="post">
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
@endsection
