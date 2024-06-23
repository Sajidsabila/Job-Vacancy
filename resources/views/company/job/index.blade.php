@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    <a href={{ URL::to('/companie/lowongan-kerja/create') }} class="btn btn-primary mb-3"><i class="fas fa-plus"
            aria-hidden="true"></i>ADD</a>
    <table id="datatable1" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Posisi</th>
                <th>Range Gaji</th>
                <th>Status Publish</th>
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
                        @if ($job->status == 'Unactive' || $job->status == 'Nonactive')
                            <span class="badge badge-danger">{{ $job->status }}</span>
                        @else
                            <span class="badge badge-success">{{ $job->status }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ URL::to('/companie/lowongan-kerja/' . $job->id) }}"
                                class="mr-2 btn btn-info btn-sm">Info</a>
                            @if (!$job->order || $job->order->status == 'Unpaid')
                                <a href="{{ URL::to('/companie/lowongan-kerja/create-publish/' . $job->id) }}"
                                    class="mr-2 btn btn-success btn-sm">Publish</a>
                            @elseif ($job->order->status == 'Paid')
                                <a href="{{ URL::to('/companie/lowongan-kerja/show-invoice/' . $job->id) }}"
                                    class="mr-2 btn btn-primary btn-sm">Receipt</a>
                            @endif
                            <a href="{{ URL::to('/companie/lowongan-kerja/' . $job->id . '/edit') }}"
                                class="mr-2 btn btn-warning btn-sm">Edit</a>
                            <form action="{{ URL::to('/companie/lowongan-kerja/' . $job->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('apakah Yakin Ingin Menghapus {{ $job->title }}')">
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
