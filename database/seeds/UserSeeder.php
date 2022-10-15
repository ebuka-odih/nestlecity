<?php

use App\Account;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{


    public function autoCreate($user_id){
        $accounts = Account::orderBy('created_at', 'desc')->first();
        if($accounts){
            $last_account_num = $accounts->account_number ;
        }else {
            $last_account_num = '1000000000';
        }

        $account_num = (int)$last_account_num + 1;

        $save = Account::create(['user_id' => $user_id, 'account_number' => $account_num]);

        $user = User::findOrFail($user_id);

//        $user->notify(new NewAccount($save));

    }

    public function run(Request $request)
    {
        $user2 = User::where('email', '=', 'user@fedstatebank.com')->first();
        if($user2 === null){
           $user3 = User::create([
                'first_name' => 'Fedstatebank',
                'last_name' => 'User',
                'status' => 1,
                'user_role' => 0,
                'account_type' => "Savings",
                'email' => 'user@fedstatebank.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('IjWAEOcQGp*!&!*'),
            ]);
            $this->autoCreate($user3->id);
        }
    }

}
