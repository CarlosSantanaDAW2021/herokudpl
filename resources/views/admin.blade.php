@extends("layouts.admin-main")
@section("content")
  @if(Session::has("correcto"))
    <div class="alert alert-success">{{Session::get("correcto")}}</div>
  @endif
@stop