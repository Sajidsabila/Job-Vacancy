@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>

    <table class="table table-striped" id="datatable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>No telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobseeker as $key => $jobseeker)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        {{ $jobseeker->first_name . ' ' . $jobseeker->last_name }}
                    </td>
                    <td>{{ $jobseeker->gender }}</td>
                    <td>{{ $jobseeker->phone }}</td>
            @endforeach
            </tr>
        </tbody>
    </table>
@endsection
