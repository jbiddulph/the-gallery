@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Main page</div>
                <a href="{{ route('admin') }}">Admin</a>
                <div class="card-body">
                    hello
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
