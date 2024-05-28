@extends ('adminTemplate.layouts.main')
@section ('container')
@include('sweetalert::alert')
<h3>{{ $title }}</h3>
.
<a href="{{ URL::to('jobs/create')}}" class="my-2 btn btn-primary ">
    <i class="fas fa-plus" aria-hidden="true"> </i> &nbsp; Add</a>
<table class="table table-striped" id="datatable1">
    <thead>
        <tr>
            <th>No</th>
            <th>Company</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Description</th>
            <th>Type</th>
            <th>Salary</th>
            <th>Deadline</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $job->company_id }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->slug }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->job_category_id }}</td>
                <td>{{ $job->description }}</td>
                <td>{{ $job->type }}</td>
                <td>{{ $job->salary }}</td>
                <td>{{ $job->deadline }}</td>

                <td>
                    <a href="{{ URL::to('/companie/jobs/' . $job->id . '/edit') }}" class="btn btn-warning">Edit</a>
                    <!-- Tambahkan tombol hapus jika diperlukan -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ URL::to('/companie/jobs/create') }}" class="btn btn-primary">Tambah Pekerjaan</a>
@endsection
