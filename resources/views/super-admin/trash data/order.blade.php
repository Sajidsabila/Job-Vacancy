@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>Trash {{ $title }}</h3>

    {{-- <a href="{{ URL::to('job-category/create') }}" class="my-2 btn btn-primary ">
        <i class="fas fa-plus" aria-hidden="true"> </i> &nbsp; Add</a> --}}
    <table class="table table-striped" id="datatable1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Job</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->role }}</td>
                    <td>
                        <div class="d-flex">

                            <a href="{{ URL::to('/admin/order/' . $order->id) }}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            <form action="{{ URL::to('/admin/delete-order/' . $order->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $order->email }} secara permanen')">
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
