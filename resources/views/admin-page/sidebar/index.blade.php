@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Resume Sidebar Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Resume Sidebar Info</li>
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
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($sidebars) > 0)
                    @foreach($sidebars as $key => $sidebar)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $sidebar->sidebar }}</td>
                        <td>
                            <a href="{{ route('sidebar.edit', [$sidebar->id]) }}">
                                <button class="btn btn-sm btn-primary">EDIT</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('sidebar.destroy', [$sidebar->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete?');">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <td>No Sidebars to Display.</td>
                @endif
            </tbody>
        </table>
    </div>


@endsection