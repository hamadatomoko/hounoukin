@extends('layouts.admin')
@section('title', '登録済みお祭りの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>お祭り一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\FestivalController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\FestivalController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">お祭り名</label>
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
                                <th width="10%">お祭りの名前</th>
                            
                                <th width="30%">備考</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($festivals as $festival)
                                <tr>
                                    <td>{{ \Str::limit($festival->name, 100) }}</td>
                                    
                                    <td>{{ \Str::limit($festival->memo, 250) }}</td>
                                     <td>
                                        <div>
                                            <a href="{{ action('Admin\FestivalController@edit', ['id' => $festival->id]) }}">編集</a>
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