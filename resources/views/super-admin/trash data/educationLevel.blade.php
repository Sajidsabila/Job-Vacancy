@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    <h3>{{ $title }}</h3>
    <table id="datatable1" class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th width='5%'>No</th>
                <th>Level</th>
                <th>Description</th>
                <th width='10%'>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($educationLevels as $index => $educationLevel)
                <tr>
                    <td class="aligh-middle">{{ $index + 1 }}</td>
                    <td class="aligh-middle">{{ $educationLevel->level }}</td>
                    <td class="aligh-middle">{{ $educationLevel->description }}</td>
                    <td class="aligh-middle">
                        <div class="d-flex">
                            <a href="{{ URL::to('/admin/restore-educationLevel/' . $educationLevel->id) }}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            <form action="{{ URL::to('/admin/delete-educationLevel/' . $educationLevel->id) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $educationLevel->educationLevel }} secara permanen')">
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
