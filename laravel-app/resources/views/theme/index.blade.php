@extends('layout.layout-1')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('theme.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="background">Background Image</label>
                                    <input type="file" name="background" class="form-control mb-3">
                                    @if ($theme && $theme->background)
                                        <a href="{{ $theme->background }}" target="_blank"><img
                                                src="{{ $theme->background }}" alt="Background Image" width="100"></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" class="form-control mb-3">
                                    @if ($theme && $theme->logo)
                                        <a href="{{ $theme->logo }}" target="_blank">
                                            <img src="{{ $theme->logo }}" alt="Logo" width="100"></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">

                                <div class="form-group">
                                    <label for="menu_order">Menu Order</label>
                                    @foreach ($menus as $item => $value)
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <p>{{ $value->name }}</p>
                                                    <input type="text" name="menu_order[{{ $value->id }}]"
                                                        class="form-control" placeholder="Ex. 1"
                                                        value="{{ $value->sort }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="menu_icons">Menu Icons</label>
                                    @foreach ($menus as $item => $value)
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <p>{{ $value->name }}</p>
                                                    <input type="text" name="menu_icons[{{ $value->id }}]"
                                                        class="form-control" placeholder="Ex. 1"
                                                        value="{{ $value->icon }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
