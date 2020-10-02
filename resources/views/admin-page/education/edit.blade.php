@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">

        <h2>Update Education</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Update Education Page.</li>
        </ol>

        <form action="{{ route('education.update', [$education->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
            <div class="form-group">
                <label for="exampleInputEmail1">University Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $education->name }}">
            </div>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">University Degree</label>
                <input type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ $education->degree }}">
            </div>

            @error('degree')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">University Timeline</span>
                    </div>
                    <input type="text" name="started" class="form-control @error('started') is-invalid @enderror" value="{{ $education->started }}">
                    <input type="text" name="ended" class="form-control @error('ended') is-invalid @enderror" value="{{ $education->ended }}">
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
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">GPA/Grade Achieved</span>
                    </div>
                    <input type="text" name="gpa" class="form-control @error('gpa') is-invalid @enderror" value="{{ $education->GPA }}">
                </div>
            </div>

            @error('gpa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">University Description (About Subjects / Environments)</label>
                <textarea name="description" id="summernote" row="3" class="form-control @error('degree') is-invalid @enderror">{{ $education->description }}</textarea>
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