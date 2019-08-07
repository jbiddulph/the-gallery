<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Ajax POST CALL XCSS Removal -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    {{-- Laravel admin CSS--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Setup Headers -->

</head>
<body>
@include('layouts.inc.messages')
<div class="container-fluid">
    <div class="row">
        @include('layouts.inc.modal')
        @yield('main-row')
    </div>
</div>
{{-- Laravel admin JS--}}
<script src="{{asset('js/app.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>
