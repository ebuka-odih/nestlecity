<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAccount extends Mailable
{
    use Queueable, SerializesModels;

   public $data;
    public function __construct($data)
    {
      $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data['user'];
        $first_name =  $this->data['user']->first_name;
        $last_name =  $this->data['user']->last_name;
        $pass =  $this->data['user']->pass;
        $account_type =  $this->data['account']->account_type;
        $account_number =  $this->data['account']->account_number;
        return $this->from('noreply@nestlecity.com', "Nestlecity Bank")->subject('Nestlecity Bank')
            ->with(['data' => $data, 'first_name' => $first_name, 'last_name' => $last_name,
                'account_type' => $account_type, 'account_number' => $account_number, 'pass' => $pass])->markdown('emails.new_account');
    }
}
