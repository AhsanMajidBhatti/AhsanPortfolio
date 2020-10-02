@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">

        <h2>Create Education</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create Education Page.</li>
        </ol>

        <form action="{{ route('education.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">University Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter University Name">
            </div>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">University Degree</label>
                <input type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" placeholder="Enter University Degree">
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
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">GPA/Grade Achieved</span>
                    </div>
                    <input type="text" name="gpa" class="form-control @error('gpa') is-invalid @enderror" placeholder="2.50 / B+">
                </div>
            </div>

            @error('gpa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">University Description (About Subjects / Environments)</label>
                <textarea name="description" id="summernote" row="3" class="form-control @error('degree') is-invalid @enderror"></textarea>
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