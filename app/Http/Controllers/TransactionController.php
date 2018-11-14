<?php

namespace Carbon\Laravel;
namespace App\Http\Controllers;


use ConsoleTVs\Charts\Builder\Chart;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Facades\Charts;
use Phpml\Regression\LeastSquares;




class TransactionController extends Controller
{
    public function showTransaction()
    {
        $now = Carbon::now()->format('F');

        $data = DB::table('sys_transaction')
            ->select('product_name','invoice_date', DB::raw('SUM(product_sales_total) as total_sales'))
            ->whereMonth('invoice_date','=', Carbon::now()->format('m'))
            ->groupBy('product_name')
            ->orderBy('total_sales', 'DESC')
            ->limit(3)
            ->get();

        return view('pages.transaction', compact('data', 'now'));

    }

    public function searchTransaaction(Request $request)
    {
        $month = $request->month;
        $limit = $request->limit;

        $data = DB::table('sys_transaction')
            ->select('product_id','product_name','invoice_date', DB::raw('SUM(product_sales_total) as total_sales'))
            ->whereMonth('invoice_date','=', $month)
            ->groupBy('product_name')
            ->orderBy('total_sales', 'DESC')
            ->limit($limit)
            ->get();


        $now = date("F", mktime(0, 0, 0, $month, 1));
        return view('pages.transaction', compact('data', 'now'));
    }

    public function chartTransaction()
    {


        $data = DB::table('sys_transaction')
            ->select(DB::raw('SUM(product_sales_total) as total_sales'), DB::raw('DATE_FORMAT(invoice_date, "%M") as month'))
            ->whereYear('invoice_date','=', 2017)
            ->groupBy( DB::raw('MONTH(invoice_date)'))
            ->orderBy('invoice_date', 'asc')
            ->get();
//        dd($data);
        $chart = Charts::create('line', 'chartjs')
            ->title('Sales Chart')
            ->elementLabel('Sales')
            ->labels($data->pluck('month'))
            ->values($data->pluck('total_sales'));
        return view('pages.chart_transaction', ['chart'=>$chart]);

    }

    public function regresion()
    {
        $data = DB::table('sys_transaction')
            ->select(DB::raw('SUM(product_sales_total) as total_sales'))
            ->whereYear('invoice_date','=', 2017)
            ->groupBy( DB::raw('MONTH(invoice_date)'))
            ->orderBy('invoice_date', 'asc')
            ->get()
            ->pluck('total_sales');

        foreach ($data as $object)
        {
            $new = (int)$object;
            $arrays[] = (array)$new;
        }

        $samples = $arrays;
        $targets = [4, 5, 6, 7, 8, 9];

        $regression = new LeastSquares();
        $regression->train($samples, $targets);

        dd($regression);

    }
}
