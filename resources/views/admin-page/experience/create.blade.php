@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">

        <h2>Create Education</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create Education Page.</li>
        </ol>

        <form action="{{ route('experience.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Experience Title</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Title">
            </div>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Company Name</label>
                <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" placeholder="Enter Company Name">
            </div>

            @error('company')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Work Timeline</span>
                    </div>
                    <input type="text" name="started" class="form-control @error('started') is-invalid @enderror" placeholder="Started From (MM YYYY)">
                    <input type="text" name="ended" class="form-control @error('ended') is-invalid @enderror" placeholder="Ended To (MM YYYY)">
                </div>
            </div>

            @error('started')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @error('ended')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Company Description</label>
                <textarea name="description" id="summernote2" row="3" class="form-control @error('description') is-invalid @enderror"></textarea>
            </div>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Task & Achievements</label>
                <textarea name="achievements" id="summernote3" row="3" class="form-control @error('achievements') is-invalid @enderror"></textarea>
            </div>

            @error('achievements')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection