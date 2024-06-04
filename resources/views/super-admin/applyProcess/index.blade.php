ore @extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    .
    <a href="{{ URL::to('admin/applyProcess/create') }}" class="my-2 btn btn-primary ">
        <i class="fas fa-plus" aria-hidden="true"> </i> &nbsp; Add</a>
    <table class="table table-striped" id="datatable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applyProcesses as $key => $applyProcess)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <div class="services-ion">
                            <span class="{{ $applyProcess->icon }}" style = "width: 1000px; "></span>
                        </div>
                    </td>
                    <td>{{ $applyProcess->applyProcess }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ URL::to('applyProcess/' . $applyProcess->id) }}"
                                class="mr-2 btn btn-info btn-sm">Info</a>
                            <a href="{{ URL::to('/admin/applyProcess/' . $applyProcess->id . '/edit') }}"
                                class="mr-2 btn btn-warning btn-sm">Edit</a>
                            <form action="{{ URL::to('/admin/applyProcess/' . $applyProcess->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $applyProcess->name }}')">
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
