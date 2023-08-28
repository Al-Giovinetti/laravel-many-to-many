@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <div class="card">
            <ul class="list-unstyled p-3">
                <li> <strong> ID </strong> {{ $project['id']}}</li>
                <li> <strong>Title</strong> {{ $project['title']}}</li>
                <li class="py-2">
                    @if(str_starts_with($project->image,'http'))
                        <img src="{{ $project->image }}" alt="image {{ $project->title }}">
                    @else
                        <img src="{{ asset('storage/'. $project->image) }}" alt="image . ' ' .{{ $project->title }}">
                    @endif
                </li> 
                <li> <strong>Description</strong> {{ $project['description']}}</li>
                <li> <strong>Number of attachments</strong> {{ $project['attachments']}}</li>
                <li> <strong>Last modified</strong> {{ $project->updated_at}}</li>
            </ul>
            <div class="d-flex p-3">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-primary ">Go back</a>
                <a href="{{ route('admin.projects.edit',$project) }}" class="btn btn-sm btn-success mx-3">Edit</a>
                <form action="{{ route('admin.projects.destroy',$project) }}" class="d-inline-block" method="POST">
                @csrf
                @method("DELETE")

                    <button type="submit" class="btn btn-sm btn-warning">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
