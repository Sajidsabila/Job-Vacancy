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
                <th width='5%'>No</th>
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th width='15%'>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applyProcesses as $key => $applyProcess)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td class="align-middle">
                        <div class="services-ion">
                            <span class="{{ $applyProcess->icon }}"></span>
                        </div>
                    </td>
                    <td class="align-middle">{{ $applyProcess->process }}</td>
                    <td class="align-middle">{{ $applyProcess->description }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ URL::to('/admin/applyProcess/' . $applyProcess->id . '/edit') }}"
                                class="btn btn-sm btn-warning mr-2">Edit</a>
                            <form action="{{ URL::to('/admin/applyProcess/' . $applyProcess->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm px-2"
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
