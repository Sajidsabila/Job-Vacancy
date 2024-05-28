@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    <h3>Data {{ $title }}</h3>
    <hr>
    <a href="{{ URL::to('admin/jobTimeType/create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus" aria-hidden="true"></i>
        Add</a>
    <table id="datatable1" class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th width='5%'>No</th>
                <th>Type</th>
                <th width='10%'>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobTimeTypes as $index => $jobTimeType)
                <tr>
                    <td class="aligh-middle">{{ $index + 1 }}</td>
                    <td class="aligh-middle">{{ $jobTimeType->type }}</td>
                    <td class="aligh-middle">
                        <div class="d-flex">
                            <a href="{{ URL::to('admin/jobTimeType/' . $jobTimeType->id) }}"
                                class="btn btn-sm btn-info mr-2">Show</a>
                            <a href="{{ URL::to('admin/jobTimeType/' . $jobTimeType->id . '/edit') }}"
                                class="btn btn-sm btn-warning mr-2">Edit</a>
                            <form action="{{ URL::to('admin/jobTimeType/' . $jobTimeType->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Anda yakin mau menghapus data ini {{ $jobTimeType->type }} ?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
