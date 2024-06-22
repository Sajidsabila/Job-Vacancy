@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>
        {{ $title }}</h3>
    <table class="table table-striped" id="datatable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perusahaan </th>
                <th>Status Pengajuan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $key => $company)
                <tr>
                    <td>{{ $key + 1 }}</td>

                    <td>{{ $company->company_name }}</td>
                    <td>
                        @if ($company->status == 'Submission')
                            <span class="badge badge-primary">Menunggu Persetujuan</span>
                        @elseif($company->status == 'Accept')
                            <span class="badge badge-success">Diterima</span>
                        @else
                            <span class="badge badge-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex flex-row">
                            <a href="{{ URL::to('/admin/list-perusahaan/' . $company->id) }}"
                                class="btn btn-info btn-sm mr-2">Info</a>
                            @if ($company->status == 'Accept')
                                <span class="btn btn-success btn-sm mr-2 disabled">Terima</span>
                            @else
                                <a href="{{ url('/admin/list-perusahaan/accept/' . $company->id) }}"
                                    class="btn btn-success btn-sm mr-2">Terima</a>
                            @endif

                            @if ($company->status == 'Reject')
                                <span class="btn btn-danger btn-sm mr-2 disabled">Tolak</span>
                            @else
                                <a href="{{ URL::to('/admin/list-perusahaan/reject/' . $company->id) }}"
                                    class="btn btn-danger btn-sm mr-2">Tolak</a>
                            @endif
                        </div>
                    </td>
            @endforeach
            </tr>
        </tbody>
    </table>
@endsection
