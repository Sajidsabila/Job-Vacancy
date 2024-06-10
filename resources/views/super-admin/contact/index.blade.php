@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    <hr>
    <table id="datatable1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $index => $contact)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->description }}</td>
                    {{-- <td>
                        <div class="d-flex ">
                            <a href="{{ URL::to('admin/contact/' . $contact->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                            <a href="{{ URL::to('admin/contact/' . $contact->id . '/edit') }}"
                                class="btn btn-sm btn-warning mr-2">Edit</a>
                            <form action="{{ URL::to('admin/contact/' . $contact->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Anda Yakin akan Menghapus {{ $contact->name }}?')">Delete</button>
                            </form>
                        </div>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
