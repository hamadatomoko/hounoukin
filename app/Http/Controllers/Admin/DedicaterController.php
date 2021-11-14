<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dedicater;
class DedicaterController extends Controller
{
    public function add()
  {
      return view('admin.dedicater.create');
  }
 //
  public function create(Request $request)
  {
     $this->validate($request, Dedicater::$rules);
     
      $dedicater = new Dedicater;
      $form = $request->all();
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      // データベースに保存する
      $dedicater->fill($form);
      $dedicater->save();
      
      return redirect('admin/dedicater/create');
  }
   public function index(Request $request)
  {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $posts = Dedicater::where('title', $cond_name)->get();
      } else {
          // それ以外はすべての奉納者を取得する
          $posts = Dedicater::all();
      }
      return view('admin.dedicater.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }
 public function edit(Request $request)
  {
      // 
      $dedicater= Dedicater::find($request->id);
      if (empty($dedicater)) {
        abort(404);    
      }
      return view('admin.dedicater.edit', ['dedicater_form' => $dedicater]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Dedicater::$rules);
    
      $dedicater = Dedicater::find($request->id);
      // 送信されてきたフォームデータを格納する
      $dedicater_form = $request->all();
      unset($dedicater_form['_token']);

      // 該当するデータを上書きして保存する
      $dedicater->fill($dedicater_form)->save();

      return redirect('admin/dedicater');
  }
}
