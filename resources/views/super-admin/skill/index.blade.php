@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
<h3>{{ $title }}</h3>
<hr>
    <a href="{{ URL::to('/admin/skill/create') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus" aria-hidden="true"></i>
        Add</a>
    <table id="datatable1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Skill</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skills as $index => $skill)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $skill->id }}</td>
                    <td>{{ $skill->skill }}</td>
                    <td>
                        <div class="d-flex ">
                            <a href="{{ URL::to('admin/skill/' . $skill->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                            <a href="{{ URL::to('admin/skill/' . $skill->id . '/edit') }}"
                                class="btn btn-sm btn-warning mr-2">Edit</a>
                            <form action="{{ URL::to('admin/skill/' . $skill->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Anda Yakin akan Menghapus {{ $skill->id }}?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
