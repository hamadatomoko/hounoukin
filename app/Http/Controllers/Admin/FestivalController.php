<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Festival;

class FestivalController extends Controller
{
    public function add()
    {
        return view('admin.festival.create');
    }
  public function create(Request $request)
  {
     $this->validate($request, Festival::$rules);
     
      $festival = new Festival;
      $form = $request->all();
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      // データベースに保存する
      $festival->fill($form);
      $festival->save();
      
      return redirect('admin/festival/create');
  }
 public function edit(Request $request)
  {
      // 
      $festival= Festival::find($request->id);
      if (empty($festival)) {
        abort(404);    
      }
      return view('admin.festival.edit', ['festival_form' => $festival]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Festival::$rules);
    
      $festival = Festival::find($request->id);
      // 送信されてきたフォームデータを格納する
      $festival_form = $request->all();
      unset($festival_form['_token']);

      // 該当するデータを上書きして保存する
      $festival->fill($festival_form)->save();

      return redirect('admin/festival');
  } 
     public function index(Request $request)
  {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $festivals = Festival::where('title', $cond_name)->get();
      } else {
          // それ以外はすべての奉納者を取得する
          $festivals = Festival::all();
      }
      return view('admin.festival.index', ['festivals' => $festivals, 'cond_name' => $cond_name]);
  }//
}
