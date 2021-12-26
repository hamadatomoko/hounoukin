<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dedicater;
use App\DedicationMoney;
use App\Festival;
class DedicationMoneyController extends Controller
{ 

  public function add(Request $request)
  {
     $festivals=Festival::pluck('name','id') ;// 
      $dedicater= Dedicater::find($request->id);
      if (empty($dedicater)) {
        abort(404);    
      }
      return view('admin.dedication_moneys.create', ['dedicater' => $dedicater,'festivals'=>$festivals]);
  }
 //
  public function create(Request $request)
  {
     $this->validate($request, DedicationMoney::$rules);
     
      $dedication_money = new DedicationMoney;
      $form = $request->all();
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      // データベースに保存する
      $dedication_money->fill($form);
      $dedication_money->save();
      
      return redirect('admin/dedication_moneys/create');
  }
   public function index(Request $request)
  {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $posts = DedicationMoney::where('title', $cond_name)->get();
      } else {
          // それ以外はすべての奉納者を取得する
          $posts = DedicationMoney::all();
      }
      return view('admin.dedication_moneys.index', ['posts' => $posts, 'cond_name' => $cond_name]);
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
  public function delete(Request $request)
  {
   }//
    public function generate_pdf() {
      $posts = DedicationMoney::all();

        $pdf = \PDF::loadView('admin.dedication_moneys.generate_pdf',compact('posts'));
        return $pdf->stream('title.pdf');

    }
}
