<?php

namespace App\Services;

use App\Models\Event;
use App\Services\Log\LogService;
use App\Traits\Event\EventNotificationTrait;
use Illuminate\Support\Facades\DB;
use Auth;

class ChangeStatusService
{
  use EventNotificationTrait;

  public static function change_status($request)
  {
// dd($request->all());
      $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN);
      // dd($request->status,$status);
      $data = ['status' => $status];

      $update = DB::table($request->tb_name)
        ->where('id', $request->id)
        ->update([$request->field_name => $status]);
        // array:4 [ // app\Services\ChangeStatusService.php:13
        //   "id" => "3"
        //   "tb_name" => "events"
        //   "status" => "true"
        //   "field_name" => "status"
        // ]
        if($request->tb_name == 'events' ){
          $event = Event::find($request->id);
          if($event->status==1){
            $instance = app(ChangeStatusService::class);
           $aa = $instance->get($request->id);

          }
        }

      LogService::store($data, Auth::id(), $request->tb_name, "change_status");

      return $update ? $update : false;

  }
  public function get ($id){

    $notification=$this->sendEvent($id);

  }
}
