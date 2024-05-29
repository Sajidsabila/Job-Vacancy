@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    .
    <a href="{{ URL::to('/companie/lowongan-kerja/create') }}" class="my-2 btn btn-primary ">
        <i class="fas fa-plus" aria-hidden="true"> </i> &nbsp; Add</a>
    <table class="table table-striped" id="datatable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Posisi</th>
                <th>Job Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $key => $job)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->company->email }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ URL::to('category/' . $job->id) }}" class="mr-2 btn btn-info btn-sm">Info</a>
                            <a href="{{ URL::to('/admin/job-category/' . $job->company->company_name . '/edit') }}"
                                class="mr-2 btn btn-warning btn-sm">Edit</a>
                            <form action="{{ URL::to('/admin/job-category/' . $job->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $job->name }}')">
                                    Hapus
                                </button>
                            </form>
                        </div>

                    </td>
            @endforeach
            </tr>
        </tbody>
    </table>
@endsection
