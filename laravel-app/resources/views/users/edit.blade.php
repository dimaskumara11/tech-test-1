@extends('layout.layout-1')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                    <form action="{{ url('users', $data->user_id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fullname">Fullname</label>
                                    <input type="text" name="fullname" class="form-control" placeholder="Ex. Dimas"
                                        value="{{ old('fullname', $data->user_fullname) }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Ex. admin@example.com" value="{{ old('email', $data->user_email) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="***">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="text" class="form-control" name="confirm_password" placeholder="***">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="status">Status</label> <br>
                                    <input type="radio" name="status" value="1"
                                        {{ old('status', $data->user_status) == '1' ? 'checked' : '' }}> Active &emsp;
                                    <input type="radio" name="status" value="0"
                                        {{ old('status', $data->user_status) == '0' ? 'checked' : '' }}> InActive
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <a href="{{ url('/users') }}" class="btn btn-danger mr-2" type="submit">Cancel</a>
                                <button class="btn btn-primary" type="submit">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script_bottom')
@endpush
