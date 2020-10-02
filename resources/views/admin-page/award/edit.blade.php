@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">

        <h2>Update Award</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Update Award Page.</li>
        </ol>

        <form action="{{ route('award.update', [$award->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
            <div class="form-group">
                <label for="exampleInputEmail1">Sidebar Name</label>
                <input type="text" class="form-control @error('award') is-invalid @enderror" name="award" value="{{ $award->award }}">
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