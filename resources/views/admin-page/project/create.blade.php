@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">

        <h2>Create Project</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create Project Page.</li>
        </ol>

        <form action="{{ route('project.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Project Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Project Title">
            </div>

            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Languages</label>
                <input type="text" class="form-control @error('languages') is-invalid @enderror" name="languages" placeholder="Enter Project Languages">
            </div>

            @error('languages')
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
                <label for="exampleInputEmail1">Website URL</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="Enter Website URL">
            </div>

            @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Project Description</label>
                <textarea name="description"  id="summernote" row="3" class="form-control @error('description') is-invalid @enderror"></textarea>
            </div>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection