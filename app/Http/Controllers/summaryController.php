<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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

        $totalCard  = $orders->where('payment', '0')->sum('total');
        $totalCash  = $orders->where('payment', '1')->sum('total');
        $total = $totalCash + $totalCard;


        return view('summary.filtered', compact('totalCash', 'totalCard', 'count', 'orders', 'total'));
    }

    public function search(Request $request){
        
        $search = $request->search;

        $user  = Auth::user();
        $users = $user->id;
        // Utilize a model Order para buscar o pedido com o número informado
        $order = Order::where('id', $search)->first();
        
        if ($order) {
            $order::with('orderList')->first();
           
            return view('summary.search', compact('order', 'users'));
        }else {
            // Se o pedido não for encontrado, você pode lidar com isso conforme necessário
           return redirect()->route('summary.index')->with('nfound', 'pedido não encontrado');
        }
    }
    

}