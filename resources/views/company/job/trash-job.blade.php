@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>Trash {{ $title }}</h3>
    <table id="datatable1" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Posisi</th>
                <th>Range Gaji</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $key => $job)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ number_format($job->salary) }}</td>
                    <td>
                        {{-- 
                        <div class="d-flex">
    
                            <a href="{{ URL::to('/admin/user/' . $user->id)}}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            <form action="{{URL::to('/admin/delete-user/' . $user->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $user->email }} secara permanen')">
                                    Hapus
                                </button>
                            </form>
                        </div> --}}

                        <div class="d-flex">
                            <a href="{{ URL::to('/companie/restore-lowongan-kerja/' . $job->id) }}"
                                class="mr-2 btn btn-success btn-sm">Restore</a>
                            {{-- <a href="{{ URL::to('/companie/lowongan-kerja/' . $job->id . '/edit') }}"
                                class="mr-2 btn btn-warning btn-sm">Edit</a> --}}
                            <form action="{{ URL::to('/companie/delete-lowongan-kerja/' . $job->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $job->title }} secara permanent?')">
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
