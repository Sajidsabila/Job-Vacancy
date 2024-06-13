@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>

    {{-- <a href="{{ URL::to('admin/applyProcess/create') }}" class="my-2 btn btn-primary ">
        <i class="fas fa-plus" aria-hidden="true"> </i> &nbsp; Add</a> --}}
    <table class="table table-striped" id="datatable1">
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
                    <td>
                        <div class="d-flex">
                            {{-- <a href="{{ URL::to('/admin/contact/' . $contact->id . '/edit') }}"
                                class="btn btn-sm btn-warning mr-2">Edit</a> --}}
                            <form action="{{ URL::to('admin/contact', $contact->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
            @endforeach
            </tr>
        </tbody>
    </table>
@endsection
