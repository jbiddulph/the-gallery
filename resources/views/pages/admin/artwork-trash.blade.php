@extends('layouts.admin')
@section('main-row')
    {{--Side--}}
    @include('layouts.inc.adminsidebar')
    <div class="col-md-8">
        <div class="category-header">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <a href="{{ route('artwork.create') }}"><button class="btn btn-sm btn-primary float-right">Create</button></a>
            <h3>Trashed Artwork</h3>

            <div class="artwork-table table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($artworks)
                        @foreach($artworks as $artwork)
                            <tr>
                                <td><a href="/images/gallery2/{{$artwork->photo ? $artwork->photo->file : 'default.jpg'}}" data-lightbox="/images/gallery2/{{$artwork->name}}" data-title="{{$artwork->title}}"><img width="100" src="/images/gallery2/{{$artwork->photo ? $artwork->photo->file : 'default.jpg'}}" alt=""></a></td>
                                <td>{{$artwork->title}}</td>
                                <td>{{$artwork->size}}</td>
                                <td>{{$artwork->category}}</td>
                                @if($artwork->status == 1)
                                <td><a href="" class="badge badge-success">Live</a></td>
                                @else
                                <td><a href="" class="badge badge-primary">Draft</a></td>
                                @endif
                                <td>{{$artwork->artistsnotes}}</td>
                                <td>{{$artwork->created_at->diffForHumans()}}</td>
                                <td>{{$artwork->updated_at->diffForHumans()}}</td>
                                <td><a href="{{Route('artwork.restore', $artwork->id)}}" class="btn btn-success btn-sm">Restore</a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{ $artworks->links() }}
            </div>
        </div>
    </div>
@endsection

