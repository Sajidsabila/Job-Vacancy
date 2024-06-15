@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h3>{{ $title }}</h3>
    <table class="table table-striped" id="datatable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Logo Perusahaan </th>
                <th>Nama Perusahaan </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $key => $company)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>

                        <img src="{{ asset('storage/' . $company->logo) }}" style = "width: 200px; "></img>
                    </td>
                    <td>{{ $company->company_name }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ URL::to('/admin/list-perusahaan/' . $company->id) }}"
                                class="mr-2 btn btn-info btn-sm">Info</a>
                        </div>
                    </td>
            @endforeach
            </tr>
        </tbody>
    </table>
@endsection
