@extends('layouts.admin')
@section('main-row')
    {{--Side--}}
    @include('layouts.inc.adminsidebar')
    <div class="col-md-8">
        <div class="category-header">
            <h3>Categories</h3>
            <form action="{{route('category.add')}}" method="post">@csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="categoryName" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Add Category</button>
                </div>
            </form>

            <div class="categories-table table-responsive">
                @if(count($categories)>0)
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                    @foreach($categories as $i=>$category)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->author }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td><a data-js="open-edit"><span id="{{ $category->id }}" class="btn btn-warning btn-sm">Edit</span></a></td>
                        <td><a data-js="open-remove"><span id="{{ $category->id }}" class="btn btn-danger btn-sm">Delete</span></a></td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection

