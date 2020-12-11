<?php

namespace App\Http\Controllers\Manage\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    // 売上データ
    public function sales($account)
    {
      return view('manage.marketing.sales');
    }

    // 顧客データ
    public function customer($account)
    {
      return view('manage.marketing.customer');
    }

    // 顧客データ詳細
    public function customer_detail($account, $orderid)
    {
      return view('manage.marketing.customerdetail');
    }
}
