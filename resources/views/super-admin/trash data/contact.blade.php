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
                    <td class="aligh-middle">{{ $index + 1 }}</td>
                    <td class="aligh-middle">{{ $contact->date }}</td>
                    <td class="aligh-middle">{{ $contact->name }}</td>
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
