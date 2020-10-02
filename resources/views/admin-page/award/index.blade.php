@extends('admin-page.layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Resume Award Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Resume Award Info</li>
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
                    <th>Award & Certification</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($awards) > 0)
                    @foreach($awards as $key => $award)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $award->award }}</td>
                        <td>
                            <a href="{{ route('award.edit', [$award->id]) }}">
                                <button class="btn btn-sm btn-primary">EDIT</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('award.destroy', [$award->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete?');">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <td>No Awards to Display.</td>
                @endif
            </tbody>
        </table>
    </div>


@endsection