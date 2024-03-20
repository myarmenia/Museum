<?php
namespace App\Traits\Museum;
use App\Models\Event;
use App\Models\Museum;

trait MuseumTrait
{
  public function getAllMuseums($request)
  {


      if (request()->type == 'event') {
// $request['start_date']='2024-03-11';
        $request['status'] = 1;
      }

      $data = Museum::filter($request->all())->get();
      return $data;

  }

  public function getMuseumEvents($id)
  {
    return Event::where(['museum_id' => $id, 'status' => 1])->get();
  }

}
