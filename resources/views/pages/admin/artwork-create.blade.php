@extends('layouts.admin')
@section('main-row')
    {{--Side--}}
    @include('layouts.inc.adminsidebar')
    <div class="col-md-8">
        <div class="category-header">
            <a href="{{ route('artwork.index') }}"><button class="btn btn-sm btn-warning float-right">Artwork</button></a>
            <h3>Create Artwork</h3>
            <form action="{{ route('artwork.store') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="photo_id">Picture:</label>
                            <input name="photo_id" class="form-control" type="file" id="photo_id">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Live</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" name="size" class="form-control">
                </div>
                <div class="form-group">
                    <label for="notes">Artist notes</label>
                    <textarea name="artistsnotes" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Add Artwork</button>
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

