@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="col-md-12 d-flex flex-wrap justify-content-between">
        <ul class="filtrz">
            <li data-filter="all"> <button class="btn btn-success">All items</button> </li>
            @foreach(App\Category::all() as $cat)
                <li data-filter="{{$cat->name}}"> <button class="btn btn-info">{{$cat->name}}</button></li>
            @endforeach
            <!-- For a shuffle control add -->
            <li data-shuffle><button class="btn btn-warning">Shuffle items</button> </li>
            <!-- For sorting controls add -->
            <li data-sortAsc><button class="btn btn-success">Ascending</button></li>
            <li data-sortDesc><button class="btn btn-success">Descending</button></li>
        </ul>
        <!-- To choose the value by which you want to sort add -->
        <div class="form-group right-search">
            <select data-sortOrder class="form-control">
                <option value="index"> Position </option>
                <option value="sortData"> Custom Data </option>
            </select>
            <!-- To create a search control -->
            <input type="text" class="searchBar form-control" name="filtr-search" value="" placeholder="Your search" data-search="">
        </div>
    </div>

{{--    <div class="row justify-content-center grid filter-container">--}}
    <div class="filter-container">
        @if($artworks)
            @foreach($artworks as $artwork)

                <div class="grid-item filtr-item" data-category="{{$artwork->category}}" data-sort="{{$artwork->title}}">
                    <div class="card">
                        <h5 class="card-title">{{$artwork->title}}</h5>
                        <a href="/images/gallery2/{{$artwork->photo ? $artwork->photo->file : 'default.jpg'}}" data-lightbox="/images/gallery2/{{$artwork->name}}" data-title="{{$artwork->title}}"><img width="175" class="card-img-top" src="/images/gallery2/{{$artwork->photo ? $artwork->photo->file : 'default.jpg'}}" alt=""></a>
                        <div class="card-body">

                            <h6>{{$artwork->size}}</h6>
                            <p>{{str_limit($artwork->artistsnotes, 50)}}</p>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#artwork{{$artwork->id}}">
                                view
                            </button>
                            @guest
                                @else
                                @if(Auth::user()->name === 'John Biddulph')
                                    <a href="{{Route('artwork.edit', $artwork->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                    @else
                                    x
                                @endif
                            @endguest
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
