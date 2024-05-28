<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\User;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function withdraw(Request $request)
    {
        $userId = $request->input('user_id');
        $userAmount = $request->input('amount');
        $userAmount = floatval($userAmount);

        $user = User::find($userId);

        if ($user) {
            if ($user->account_type == 'individual') {
                $today = Carbon::now()->dayOfWeek;
                if ($today == Carbon::FRIDAY) {
                    $fee = 0;
                } else {
                    if ($userAmount <= 1000) {
                        $fee = 0;
                        // dd($userAmount);
                    } else {
                        $remainingAmount = $userAmount - 1000;
                        $fee = $remainingAmount * 0.00015;
                        // dd($fee);
                    }                    
                }
            } else {
                $totalWithdrawal = $user->total_withdrawal + $userAmount;
                if ($totalWithdrawal > 50000) {
                    $fee = $userAmount * 0.00015;
                } else {
                    $fee = $userAmount * 0.00025;
                }
            }

            $user->balance -= ($userAmount + $fee);
            $balance = $user->balance;
            $lastTx = $userAmount;
            $user->save();

            // dd("Balance: ".$user->balance, "Fee: ".$fee);

            return view('frontend.index', compact('balance', 'fee', 'lastTx'));
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }


}
