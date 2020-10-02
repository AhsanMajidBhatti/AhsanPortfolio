@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">

        <h2>Update Sidebar</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Update Sidebar Page.</li>
        </ol>

        <form action="{{ route('sidebar.update', [$sidebar->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
            <div class="form-group">
                <label for="exampleInputEmail1">Sidebar Name</label>
                <input type="text" class="form-control @error('sidebar') is-invalid @enderror" name="sidebar" value="{{ $sidebar->sidebar }}">
            </div>

            @error('sidebar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection