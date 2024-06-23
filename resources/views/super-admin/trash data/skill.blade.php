@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>Trash {{ $title }}</h3>
    <hr>
    <a href="{{ URL::to('/admin/skill/create') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"
            aria-hidden="true"></i>
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
                        <div class="d-flex">

                            <a href="{{ URL::to('/admin/restore-skill/' . $skill->id) }}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            <form action="{{ URL::to('/admin/delete-skill/' . $skill->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $skill->skill }} secara permanen')">
                                    Hapus
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
