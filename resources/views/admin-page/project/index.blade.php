@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Resume Projects Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Resume Projects Info</li>
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
                    <th>Project Title</th>
                    <th>Languages</th>
                    <th>Start From</th>
                    <th>End To</th>
                    <th>URL</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($projects) > 0)
                    @foreach($projects as $key => $project)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->languages }}</td>
                        <td>{{ $project->started }}</td>
                        <td>{{ $project->ended }}</td>
                        <td>{{ $project->url }}</td>
                        <td>{!! $project->description !!}</td>
                        <td>
                            <a href="{{ route('project.edit', [$project->id]) }}">
                                <button class="btn btn-sm btn-primary">EDIT</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('project.destroy', [$project->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete?');">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <td>No Projects to Display.</td>
                @endif
            </tbody>
        </table>
    </div>


@endsection