@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    <hr>

    <div class="table-responsive">
        <a href="{{ URL::to('admin/order/create') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"
                aria-hidden="true"></i>
            Add</a>
        <table id="datatable1" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No.</th>
                    <th>Job</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->role }}</td>
                        <td>
                            <div class="d-flex ">
                                <a href="{{ URL::to('admin/order/' . $order->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                                <a href="{{ URL::to('admin/order/' . $order->id . '/edit') }}"
                                    class="btn btn-sm btn-warning mr-2">Edit</a>
                                <form action="{{ URL::to('admin/order/' . $order->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Anda Yakin akan Menghapus {{ $order->email }}?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
