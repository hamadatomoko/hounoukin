@extends('layouts.admin')
@section('title', '登録済み奉納者の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>奉納者一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\DedicaterController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\DedicaterController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">奉納者名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name}}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-dedicater col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">名前</th>
                                <th width="20%">住所</th>
                                <th width="10%">電話番号</th>
                                <th width="10%">email</th>
                                <th width="30%">備考</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $dedicater)
                                <tr>
                                    <td>{{ \Str::limit($dedicater->name, 100) }}</td>
                                    <td>{{ \Str::limit($dedicater->address, 250) }}</td>
                                    <td>{{ \Str::limit($dedicater->call, 250) }}</td>
                                    <td>{{ \Str::limit($dedicater->email, 250) }}</td>
                                    <td>{{ \Str::limit($dedicater->memo, 250) }}</td>
                                     <td>
                                        <div>
                                            <a href="{{ action('Admin\DedicaterController@edit', ['id' => $dedicater->id]) }}">編集</a>
                                        </div>
                                         <div>
                                            <a href="{{ action('Admin\DedicaterController@detail', ['id' => $dedicater->id]) }}">詳細</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection