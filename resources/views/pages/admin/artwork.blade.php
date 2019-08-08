@extends('layouts.admin')
@section('main-row')
    {{--Side--}}
    @include('layouts.inc.adminsidebar')
    <div class="col-md-8">
        <div class="category-header">
            <a href="{{ route('artwork.create') }}"><button class="btn btn-sm btn-primary float-right">Create</button></a>
            <h3>Artwork</h3>

            <div class="artwork-table table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>title</th>
                        <th>size</th>
                        <th>category</th>
                        <th>artistsnotes</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>&nbsp;</th>
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
                                <td>{{$artwork->artistsnotes}}</td>
                                <td>{{$artwork->created_at->diffForHumans()}}</td>
                                <td>{{$artwork->updated_at->diffForHumans()}}</td>
{{--                                <td><a href="{{Route('artwork2.edit', $artwork->id)}}" class="btn btn-info">Edit</a></td>--}}
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

