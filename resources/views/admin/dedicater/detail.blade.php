@extends('layouts.admin')
@section('title', '奉納者の詳細')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>奉納者詳細</h2>
                <form action="{{ action('Admin\DedicationMoneyController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $dedicater_form->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="address">住所</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="address" rows="10">{{ $dedicater_form->address }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="call">電話番号</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="call" value="{{ $dedicater_form->call}}">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2" for="email">email</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="email" value="{{ $dedicater_form->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="memo">備考</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="10">{{ $dedicater_form->memo }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $dedicater_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="奉納者の登録">
                        </div>
                    </div>
                </form>
                <div>
                     <a href="{{ action('Admin\DedicationMoneyController@add', ['id' =>  $dedicater_form->id]) }}">奉納金の追加</a>
                 </div>
            </div>
        </div>
    </div>
@endsection
