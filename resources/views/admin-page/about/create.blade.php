@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">

        <h2>Create About</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create About Page.</li>
        </ol>

        <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" placeholder="Enter First Name">
            </div>

            @error('fname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" placeholder="Enter Last Name">
            </div>

            @error('lname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email">
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter Phone Number">
            </div>

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="">Enter Address</label>
                <textarea name="address" id="summernote" class="form-control @error('address') is-invalid @enderror"></textarea>

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Additional Information</label>
                <textarea name="additional_info" id="summernote2" class="form-control @error('additional_info') is-invalid @enderror"></textarea>

                @error('additional_info')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Choose file</label>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection