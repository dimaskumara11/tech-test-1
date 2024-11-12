@extends('layout.layout-1')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Menampilkan pesan sukses -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <!-- Menampilkan error validasi -->
                    @if ($errors->any())
                        <div class="alert alert-danger pb-0 pl-0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="mb-4">Users List</h2>
                        </div>
                        <div>
                            <a href="{{ url('/users/create') }}" class="btn btn-info" title="Edit">
                                <span class="fa fa-plus"></span> Add User
                            </a>
                        </div>
                    </div>
                    <table id="users-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width=75px style="text-align: center">Num.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th width=150px style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item => $val)
                                <tr>
                                    <td align="center">{{ $item + 1 }}</td>
                                    <td>{{ $val->user_fullname }}</td>
                                    <td>{{ $val->user_email }}</td>
                                    <td>{{ $val->user_status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td align="center">
                                        <a href="{{ url("/users/$val->user_id/edit/") }}" class="btn btn-info"
                                            title="Edit">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <form action="{{ url('users', $val->user_id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')" title="Delete"><span
                                                    class="fa fa-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script_bottom')
@endpush
