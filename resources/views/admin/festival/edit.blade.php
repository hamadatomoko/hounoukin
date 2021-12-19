{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')



@section('title', 'お祭り編集')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お祭り編集</h2>
                <form action="{{ action('Admin\FestivalController@update') }}" method="post" enctype="multipart/form-data">

 

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">お祭名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $festival_form->name}}">
                        </div>
                    </div>
                  
                　 <div class="form-group row">
                        <label class="col-md-2" for="memo">備考</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="10">{{ $festival_form->memo}}</textarea>
                        </div>
                    </div>
                      <input type="hidden" name="id" value="{{ $festival_form->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection