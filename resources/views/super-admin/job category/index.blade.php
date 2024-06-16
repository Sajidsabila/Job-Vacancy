ore @extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    <hr>
    <a href="{{ URL::to('admin/job-category/create') }}" class="my-2 btn btn-primary ">
        <i class="fas fa-plus" aria-hidden="true"> </i> &nbsp; Add</a>
    <table class="table table-bordered table-striped" id="datatable1">
        <thead>
            <tr>
                <th width='5%'>No</th>
                <th>Icon</th>
                <th>Name</th>
                <th width='30%'>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <div class="services-ion">
                            <span class="{{ $category->icon }}" style = "width: 1000px; "></span>
                        </div>
                    </td>
                    <td>{{ $category->category }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ URL::to('category/' . $category->id) }}" class="btn btn-sm btn-info mr-2 py-3 m-2"
                                height="100px" width="200px">Show</a>
                            <a href="{{ URL::to('/admin/job-category/' . $category->id . '/edit') }}"
                                class="btn btn-sm btn-warning mr-2 py-3 m-2">Edit</a>
                            <form action="{{ URL::to('/admin/job-category/' . $category->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger mt-3"
                                    onclick="return confirm('Anda Yakin akan Menghapus {{ $category->name }}')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
