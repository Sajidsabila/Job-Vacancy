@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>Trash {{ $title }}</h3>
    <table id="datatable1" class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Benefit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($benefits as $index => $benefit)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $benefit->benefit }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ URL::to('/companie/benefit/' . $benefit->id) }}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            {{-- <a href="{{ URL::to('/companie/benefit/' . $benefit->id . '/edit') }}"
                                class="mr-2 btn btn-warning btn-sm">Edit</a> --}}
                            <form action="{{ URL::to('/companie/benefit/' . $benefit->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $benefit->title }} secara permanent?')">
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
