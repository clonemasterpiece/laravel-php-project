@extends("layouts.layout")

@section("title") Error page @endsection

@section("content")
    <h1>An error has occurred.</h1>
    <h2>Please reach our support with this ID {{ $errorId }}</h2>
@endsection
