@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Resume Sidebar Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Resume Education Info</li>
        </ol>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Start From</th>
                    <th>End To</th>
                    <th>GPA/Grade</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($educations) > 0)
                    @foreach($educations as $key => $education)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $education->name }}</td>
                        <td>{{ $education->degree }}</td>
                        <td>{{ $education->started }}</td>
                        <td>{{ $education->ended }}</td>
                        <td>{{ $education->GPA }}</td>
                        <td>{!! $education->description !!}</td>
                        <td>
                            <a href="{{ route('education.edit', [$education->id]) }}">
                                <button class="btn btn-sm btn-primary">EDIT</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('education.destroy', [$education->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete?');">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <td>No Education to Display.</td>
                @endif
            </tbody>
        </table>
    </div>


@endsection