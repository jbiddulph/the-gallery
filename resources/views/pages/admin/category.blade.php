@extends('layouts.admin')
@section('main-row')
    {{--Side--}}
    @include('layouts.inc.adminsidebar')
    <div class="col-md-8">
        <div class="category-header">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
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
{{--                        <td><a data-js="open-edit"><span id="{{ $category->id }}" class="btn btn-warning btn-sm">Edit</span></a></td>--}}
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editCategorymodal{{ $category->id }}">
                                Edit
                            </button>

                            <!-- Edit Category Modal -->
                            <div class="modal fade" id="editCategorymodal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('category.edit')}}" method="POST">@csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><a data-js="open-remove"><span id="{{ $category->id }}" class="btn btn-danger btn-sm">Delete</span></a></td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection

