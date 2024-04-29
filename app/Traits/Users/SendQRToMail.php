<?php
namespace App\Traits\Users;

use App\Mail\SendQRTiketsToUsersEmail;
use App\Models\TicketQr;
use App\Models\User;
use Mail;

trait SendQRToMail
{
    public function sendQR($id)
    {

      $user = auth('api')->user();

      $list_qr_ids = $this->getList()->pluck('id')->toArray();

      if(in_array($id, $list_qr_ids)){
          $qr = TicketQr::find($id);
          // $email = $user->email;
      $email = 'narine@webex.am';

          $result = mail::send(new SendQRTiketsToUsersEmail($qr, $email));
          dd(11);
      }
      // $purchase = $user->purchases;
      // $payment = $purchase->pluck('payment')->where('status', '!=', null);

      // $purchase_items = $payment->pluck('purchase')->pluck('purchased_items')->flatten();

      // return $purchase_items;

    }
}