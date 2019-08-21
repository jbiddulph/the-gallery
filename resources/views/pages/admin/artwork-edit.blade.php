@extends('layouts.admin')
@section('main-row')
    {{--Side--}}
    @include('layouts.inc.adminsidebar')
    <div class="col-md-8">
        <div class="category-header">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <a href="{{ route('artwork.index') }}"><button class="btn btn-sm btn-warning float-right">Artwork</button></a>
            <h3>Edit Artwork</h3>
            <img src="/images/gallery2/{{$artworks->photo ? $artworks->photo->file : 'default.jpg'}}" alt="{{$artworks->title}}" class="img-responsive img-rounded" width="200">
            <form action="/admin/artwork/update/{{$artworks->id}}" method="POST" enctype="multipart/form-data">@csrf
                <input type="hidden" name="id" value="{{$artworks->id}}">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$artworks->title}}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="photo_id">Picture:</label>
                            <input name="photo_id" class="form-control @error('photo_id') is-invalid @enderror" type="file" id="photo_id" value="{{$artworks->photo_id}}">
                            @error('photo_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $artworks->status=='1'?'selected':'' }}>Live</option>
                                <option value="0" {{ $artworks->status=='0'?'selected':'' }}>Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->name}}" {{$cat->name==$artworks->category?'selected':''}}>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" name="size" class="form-control @error('size') is-invalid @enderror" value="{{$artworks->size}}">
                    @error('size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="notes">Artist notes</label>
                    <textarea name="artistsnotes" class="form-control @error('artistsnotes') is-invalid @enderror" cols="30" rows="10">{{$artworks->artistsnotes}}</textarea>
                    @error('artistsnotes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Edit Artwork</button>
                </div>
            </form>

            <div class="categories-table table-responsive">
{{--                @if(count($categories)>0)--}}
{{--                    <table class="table">--}}
{{--                        <tr>--}}
{{--                            <th>ID</th>--}}
{{--                            <th>Name</th>--}}
{{--                            <th>Author</th>--}}
{{--                            <th>Created at</th>--}}
{{--                            <th>Updated at</th>--}}
{{--                            <th>Edit</th>--}}
{{--                            <th>Remove</th>--}}
{{--                        </tr>--}}
{{--                        @foreach($categories as $i=>$category)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $i + 1 }}</td>--}}
{{--                                <td>{{ $category->name }}</td>--}}
{{--                                <td>{{ $category->author }}</td>--}}
{{--                                <td>{{ $category->created_at }}</td>--}}
{{--                                <td>{{ $category->updated_at }}</td>--}}
{{--                                <td><a data-js="open-edit"><span id="{{ $category->id }}" class="btn btn-warning btn-sm">Edit</span></a></td>--}}
{{--                                <td><a data-js="open-remove"><span id="{{ $category->id }}" class="btn btn-danger btn-sm">Delete</span></a></td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </table>--}}
{{--                @endif--}}
            </div>
        </div>
    </div>
@endsection

