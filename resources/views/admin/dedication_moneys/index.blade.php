@extends('layouts.admin')
@section('title', '登録済み奉納金の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>奉納金一覧</h2>
        </div>
         <div class="col-md-4">
                <a href="{{ action('Admin\DedicationMoneyController@generate_pdf') }}" role="button" class="btn btn-primary">印刷</a>
            </div>
        <div class="row">
            <div class="list-dedication-moneys col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">日付</th>
                                <th width="20%">名前</th>
                                <th width="10%">金額</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $dedication_money)
                                <tr>
                                    <td>{{ \Str::limit($dedication_money->date, 100) }}</td>
                                    <td>{{ \Str::limit($dedication_money->dedicater->name, 250) }}</td>
                                    <td>{{ \Str::limit($dedication_money->money, 250) }}</td>
                                    
                                    
                                     <td>
                                        <div>
                                            <a href="{{ action('Admin\DedicationMoneyController@edit', ['id' => $dedication_money->id]) }}">編集</a>
                                        </div>
                                         <div>
                                            <a href="{{ action('Admin\DedicationMoneyController@delete', ['id' => $dedication_money->id]) }}">削除</a>
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