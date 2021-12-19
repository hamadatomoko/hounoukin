@extends('layouts.admin')

@section('content')
<div class="container">
<a href="{{ action('Admin\DedicaterController@index') }}">奉納者の管理</a>
{{--<a href="{{ action('Admin\DedicationMoneyController@index')}}">奉納金の管理</a>--}}
</div>
@endsection
