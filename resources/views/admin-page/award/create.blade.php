@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">

        <h2>Create Award</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create Award Page.</li>
        </ol>

        <form action="{{ route('award.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Award Title</label>
                <input type="text" class="form-control @error('sidebar') is-invalid @enderror" name="award" placeholder="Enter Award Title">
            </div>

            @error('award')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection