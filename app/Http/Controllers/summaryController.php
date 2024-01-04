<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class summaryController extends Controller
{
    public function index()
    {
        return view('summary.index');
    }

    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');


        if (empty($start_date)) {
            $start_date = Carbon::now()->startOfDay();
        }

        if (empty($end_date)) {
            $end_date = Carbon::now()->endOfDay();
        }

        $orders = Order::whereBetween('created_at', [$start_date, $end_date])->get();
        $count = Order::whereBetween('created_at', [$start_date, $end_date])->get()->count();

      $totalCash  = $orders->where('payment', '0')->sum('total');
      $totalCard  = $orders->where('payment', '1')->sum('total');
        $total = $totalCash + $totalCard;


        return view('summary.filtered', compact('totalCash', 'totalCard', 'count', 'orders', 'total'));
    }
}
