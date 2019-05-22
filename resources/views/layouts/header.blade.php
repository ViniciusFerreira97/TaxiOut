<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Taxi Lotação - Login</title>
    <link rel="shortcut icon" href="{{asset('img/faviconOficial.png')}}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('mdb/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('mdb/css/mdb.lite.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/modal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/user/template.css')}}" rel="stylesheet" type="text/css">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="http://js.pusher.com/3.1/pusher.min.js"></script>
</head>
@include('user.modais')
<body>
