@extends ('adminTemplate.layouts.main')
@section ('container')
@include('sweetalert::alert')
<h3>Trash {{ $title }}</h3>

<a href="{{ URL::to('job-category/create')}}" class="my-2 btn btn-primary ">
    <i class="fas fa-plus" aria-hidden="true"> </i> &nbsp; Add</a>
<table class="table table-striped" id="datatable1">
    <thead>
        <tr>
            <th>No</th>
            <th>Icon</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobseekers as $key => $jobseeker)
        <tr>
            <td>{{ $key + 1}}</td>
            <td> <div class="services-ion">
                <span class="{{ $jobseeker->icon }}" style = "width: 1000px; "></span>
                </div>
            </td>
            <td>{{ $jobseeker->category }}</td>
            <td>
                <div class="d-flex">
    
                    <a href="{{ URL::to('/admin/restore-job-seeker/' . $jobseeker->id)}}"
                        class="mr-2 btn btn-success btn-sm">Restore</a>
                    <form action="{{URL::to('/admin/delete-job-seeker/' . $jobseeker->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('apakah Yakin Ingin Menghapus {{ $jobseeker->category }} secara permanen')">
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