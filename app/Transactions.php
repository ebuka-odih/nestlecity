<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //


    protected $guarded = [];

    public function status()
    {
        if ($this->status < 0)
        {
            return "<span class='badge light badge-danger'>Canceled</span>";
        }elseif($this->status == 0)
        {
            return "<span class='badge light badge-warning'>Pending</span>";
        }
        return "<span class='badge light badge-success'>Successful</span>";
    }


    public function admin_status()
    {
        if ($this->status < 0)
        {
            return "<span class='badge light badge-danger'>Canceled</span>";
        }elseif($this->status == 0)
        {
            return "<span class='badge light badge-warning'>Pending</span>";
        }
        return "<span class='badge light badge-success'>Successful</span>";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function getTransactionIdAttribute()
    {
        $trans_id = (string) Str::uuid();

        if (strlen($trans_id) >= 15) {
            $short_s = substr($trans_id, 0, 10).substr($trans_id, -5);
            return "#".$short_s;
        }
        else {
            return "#".$trans_id;
        }
//        return "#".$trans_id;
    }


    public function credit_type()
    {
//        $debit = Transactions::whereUserId('user_id')->where('debit', '=', 1);
        if ($this->debit == 1){
            return "Debit";
        }elseif ($this->credit = 1)
        {
            return "Credit";
        }
        return $this->credit_type();
    }

    public function transaction_type()
    {
        $transactions = Transactions::whereUserId(auth()->id())->where('debit', 0);
        if ($transactions){
            return $transactions;
        }
        return $this->transactions;
    }




}
