@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center grid">

        @if($artworks)
            @foreach($artworks as $artwork)
                <div class="grid-item">
                    <div class="card">
                        <a href="/images/gallery2/{{$artwork->photo ? $artwork->photo->file : 'default.jpg'}}" data-lightbox="/images/gallery2/{{$artwork->name}}" data-title="{{$artwork->title}}"><img width="175" class="card-img-top" src="/images/gallery2/{{$artwork->photo ? $artwork->photo->file : 'default.jpg'}}" alt=""></a>
                        <div class="card-body">
                            <h5 class="card-title">{{$artwork->title}}</h5>
                            <h6>{{$artwork->size}}</h6>
                            <p>{{str_limit($artwork->artistsnotes, 50)}}</p>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#artwork{{$artwork->id}}">
                                view
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="artwork{{$artwork->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$artwork->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img width="175" class="card-img-top" src="/images/gallery2/{{$artwork->photo ? $artwork->photo->file : 'default.jpg'}}" alt="">
                                {{$artwork->artistsnotes}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    {{ $artworks->links() }}

                <a href="{{ route('admin') }}">Admin</a>
</div>
@endsection
