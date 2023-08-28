@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <th scope="row">{{ $project['id'] }}</th>
                    <td> {{ $project['title'] }} </td>
                    <td class="overflow-y-hidden w-50"> {{ $project['description'] }}</td>
                    <td >
                        <a href="{{route('admin.projects.show', $project)}}" class="btn btn-sm btn-primary ">View</a>
                        <a href=" {{ route('admin.projects.edit', $project) }} " class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('admin.projects.destroy',$project) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method("DELETE")

                            <button type="submit" class="btn btn-sm btn-warning">
                                Delete
                            </button>
                        </form>
                    </td>    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $projects->links() }}
        <div class="new-project d-flex justify-content-center">
            <a href="{{route('admin.projects.create') }}" class="btn btn-primary w-25 ">Create a new project</a>
        </div>
    </div>    
</div>

@endsection
