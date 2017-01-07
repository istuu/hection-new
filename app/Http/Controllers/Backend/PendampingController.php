<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\WebarqController;
use App\Models\Pendamping;
use Table;
use Excel;

class PendampingController extends WebarqController
{
  public function __construct(Pendamping $model)
  {
    parent::__construct();
    $this->model = $model;
    $this->view = 'backend.pendamping.';
  }

  public function getData()
  {
    $model = $this->model->select('id','name','gender','nip','hp','birthplace','birthdate','jabatan','uk');

    $table = Table::of($model)
    ->addColumn('action',function($model){
      $status = $model->status == 'y' ? true : false;
      return \webarq::buttons($model->id , [] , $status);
    })
    ->make(true);

    return $table;
  }

  public function getIndex()
  {
    return view($this->view.'index');
  }

  public function getCreate()
  {
    return view($this->view.'_form',[
      'model'=>$this->model,
    ]);
  }

  public function postCreate(Requests\Backend\PendampingRequest $request)
  {
    try{
      $inputs = $request->all();
      $model = $this->model;
      return $this->save($model,$inputs);
    }catch(\Exception $e){
      echo $e->getMessage();
      return redirect(urlBackendAction('index'))->with('info', $e->getMessage());
    }
  }

  public function getUpdate($id)
  {
    return view($this->view.'_form',[
      'model'=>$this->model->findOrFail($id),
    ]);
  }

  public function postUpdate(Requests\Backend\PendampingRequest $request,$id)
  {
    try{
      $inputs = $request->all();
      $model = $this->model->findOrFail($id);
      return $this->update($model,$inputs);
    }catch(\Exception $e){
      echo $e->getMessage();
      return redirect(urlBackendAction('index'))->with('info', $e->getMessage());
    }
  }

  public function getDelete($id)
  {
    try{
      $model = $this->model->findOrFail($id);
      return $this->delete($model);
    }catch(\Exception $e){
      echo $e->getMessage();
      return redirect(urlBackendAction('index'))->with('info', $e->getMessage());
    }
  }

  public function getView($id)
  {
    $menu = injectModel('Menu');
    return view($this->view.'view',compact('model','menu'),[
      'model'=>$this->model->findOrFail($id),
    ]);
  }
  public function getExport(){
    try{
     $models = $this->model->select('id','name','gender','nip','hp','birthplace','birthdate','jabatan','uk','alamat_uk','alamat_rumah','created_at')->get();
     Excel::create('Data-Pendamping-Hection-2017', function($excel) use($models) {
        $excel->sheet('Sheet 1', function($sheet) use($models) {
          $sheet->fromArray($models);
        });
     })->export('xlsx');
      return redirect(urlBackendAction('index'))->with('success', 'Data has been exported');
    }catch(\Exception $e){
      echo $e->getMessage();
      return redirect(urlBackendAction('index'))->with('info', $e->getMessage());
    }
  }
}