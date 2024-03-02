<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;
use Carbon\Carbon;
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

    public function search(Request $request)

            {
                
                $search = $request->search;

                $user  = Auth::user();
                $users = $user->id;

                // Utilize a model Order para buscar o pedido com o número informado

                $order = Order::where('id', $search)->first();
                
                if ($order) {
                    $order::with('orderList')->first();
                
                    return view('summary.search', compact('order', 'users'));
                }else {
                    // Se o pedido não for encontrado

                return redirect()->route('summary.index')->with('nfound', 'pedido não encontrado');
                }
            }

  // No seu controller
  public function salesChartData()
  {
      $salesData = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
          ->whereMonth('created_at', '=', now()->month)
          ->whereYear('created_at', '=', now()->year)
          ->groupBy('date')
          ->get();
  
      $date = [];
      $total = [];
      $dateMonth = ''; // Inicialize a variável fora do loop
  
      foreach ($salesData as $data) {
          $date[] = Carbon::parse($data->date)->format('d');
          $dateMonth = Carbon::parse($data->date)->translatedFormat('F');
          $total[] = $data->total;
      }
  
      $dataLabel = 'Gráfico de Total de Vendas no mês';
      $dataDete = implode(',', $date);
      $dataTotal = implode(',', $total);
  
      return view('summary.sales', compact('dataLabel', 'dataDete', 'dataTotal', 'dateMonth'));
  }
  
        public function productGraphic()

            {
                $products = Product::where('category_id', 1)->get();
                $data = [];
            
                foreach ($products as $product) {
                    $quantity = OrderList::where('product_id', $product->id)->sum('quamtity');
                    $data[] = [
                        'productName' => $product->name,
                        'quantity' => $quantity,
                    ];
                }
           
                return view('summary.productGraphic', compact('data'));
            }

}