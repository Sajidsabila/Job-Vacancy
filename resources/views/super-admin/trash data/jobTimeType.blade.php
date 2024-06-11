@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    <h3>{{ $title }}</h3>
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
                            <a href="{{ URL::to('/admin/restore-jobTimeType/' . $jobTimeType->id) }}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            <form action="{{ URL::to('/admin/delete-jobTimeType/' . $jobTimeType->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $jobTimeType->jobTimeType }} secara permanen')">
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
