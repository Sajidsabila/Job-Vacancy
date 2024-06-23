@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    <hr>
    <div class="table-responsive">
        <table id="datatable1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Job Title</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->job->title ?? 'No Job Title' }}</td>
                        <!-- Using null-safe operator and fallback text -->
                        <!-- Using null-safe operator and fallback text -->
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <div class="d-flex ">
                                <form action="{{ URL::to('admin/order/' . $order->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
