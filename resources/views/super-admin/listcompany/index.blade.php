@extends ('adminTemplate.layouts.main')
@section ('container')
@include('sweetalert::alert')
<h3>{{ $title }}</h3>
.
<a href="{{ URL::to('job-category/create')}}" class="my-2 btn btn-primary ">
    <i class="fas fa-plus" aria-hidden="true"> </i> &nbsp; Add</a>
<table class="table table-striped" id="datatable1">
    <thead>
        <tr>
            <th>No</th>
            <th>Logo Perusahaan </th>
            <th>Nama Perusahaan </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $key => $company)
        <tr>
            <td>{{ $key + 1}}</td>
            <td> <div class="services-ion">
                <span class="{{ $company->icon }}" style = "width: 1000px; "></span>
                </div>
            </td>
            <td>{{ $company->category }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ URL::to('category/' . $company->id)}}" class="mr-2 btn btn-info btn-sm">Info</a>
                    <a href="{{ URL::to('/admin/job-category/' . $company->id . '/edit')}}"
                        class="mr-2 btn btn-warning btn-sm">Edit</a>
                    <form action="{{URL::to('/admin/job-category/' . $company->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('apakah Yakin Ingin Menghapus {{ $company->name }}')">
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