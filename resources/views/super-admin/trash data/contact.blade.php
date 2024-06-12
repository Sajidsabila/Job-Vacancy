@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    <h3>{{ $title }}</h3>
    <table id="datatable1" class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $index => $contact)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->description }}</td>
                    <td class="aligh-middle">
                        <div class="d-flex">
                            <a href="{{ URL::to('/admin/restore-contact/' . $contact->id) }}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            <form action="{{ URL::to('/admin/delete-contact/' . $contact->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $contact->contact }} secara permanen')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
