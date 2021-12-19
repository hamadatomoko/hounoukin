{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '奉納金新規作成')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>奉納金新規作成</h2>
                 <h2>名前　{{ $dedicater->name}}</h2>　
                <form action="{{ action('Admin\DedicationMoneyController@create') }}" method="post" enctype="multipart/form-data">

 

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="date">日付</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="money">金額</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="money" value="{{ old('money') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="memo">備考</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="memo" value="{{ old('memo') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="email">祭り</label>
                        <div class="col-md-10">
                            {{--
                            <select name="example1">
                                <option value="サンプル1">選択肢のサンプル1</option>
                                <option value="サンプル2">選択肢のサンプル2</option>
                                <option value="サンプル3">選択肢のサンプル3</option>
                                <option value="サンプル4">選択肢のサンプル4</option>
                                <option value="サンプル5">選択肢のサンプル5</option>
                            </select>
                            --}}
                            {{Form::select('festival_id',$festivals)}}
                        </div>
                    </div>
                    <input type="hidden"  name="dedicater_id" value="{{ $dedicater->id }}"> 
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection