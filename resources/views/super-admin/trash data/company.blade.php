@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>

    <a href="{{ URL::to('job-category/create') }}" class="my-2 btn btn-primary ">
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
            @foreach ($companies as $key => $company)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->company_name }}" width="300px">
                    </td>
                    <td>{{ $company->company_name }}</td>
                    <td>
                        <div class="d-flex">

                            <a href="{{ URL::to('/admin/restore-company/' . $company->id) }}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            <form action="{{ URL::to('/admin/delete-company/' . $company->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $company->category }} secara permanen')">
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
