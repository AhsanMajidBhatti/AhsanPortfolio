@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Resume Experience Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Resume Experience Info</li>
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
                    <th>Company</th>
                    <th>Start From</th>
                    <th>End To</th>
                    <th>Description</th>
                    <th>Tasks/Achievements</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($experiences) > 0)
                    @foreach($experiences as $key => $experience)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $experience->name }}</td>
                        <td>{{ $experience->company }}</td>
                        <td>{{ $experience->started }}</td>
                        <td>{{ $experience->ended }}</td>
                        <td>{!! $experience->description !!}</td>
                        <td>{!! $experience->achievements !!}</td>
                        <td>
                            <a href="{{ route('experience.edit', [$experience->id]) }}">
                                <button class="btn btn-sm btn-primary">EDIT</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('experience.destroy', [$experience->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete?');">
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