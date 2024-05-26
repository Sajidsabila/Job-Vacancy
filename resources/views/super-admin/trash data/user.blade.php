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
            <th>No.</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
        <tr>
           <td>{{ $key + 1 }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
            <td>
                <div class="d-flex">
    
                    <a href="{{ URL::to('/admin/user/' . $user->id)}}"
                        class="mr-2 btn btn-success btn-sm">Restore</a>
                    <form action="{{URL::to('/admin/delete-job-category/' . $user->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('apakah Yakin Ingin Menghapus {{ $user->email }} secara permanen')">
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