@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>Trash {{ $title }}</h3>
    <hr>
    <a href="{{ URL::to('/admin/religion/create') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"
            aria-hidden="true"></i>
        Add</a>
    <table id="datatable1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Religion</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($religions as $index => $religion)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $religion->id }}</td>
                    <td>{{ $religion->religion }}</td>
                    <td>
                        <div class="d-flex">

                            <a href="{{ URL::to('/admin/restore-religion/' . $religion->id) }}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            <form action="{{ URL::to('/admin/delete-religion/' . $religion->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $religion->religion }} secara permanen')">
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
