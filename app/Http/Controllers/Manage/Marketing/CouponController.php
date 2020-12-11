<?php

namespace App\Http\Controllers\Manage\Marketing;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // 一覧
    public function index($account)
    {
        $manage = Auth::guard('manage')->user();
        $coupons = DB::table('coupons')->where('manages_id', $manage->id)->get();
        return view('manage.marketing.coupon', [
          'coupons' => $coupons,
        ]);
    }

    // 編集
    public function add($account)
    {
        return view('manage.marketing.couponadd');
    }

    // 追加
    public function confirm($account, Request $request)
    {
        try {
            $manage = Auth::guard('manage')->user();
            DB::table('coupons')->insert([
                'manages_id' => $manage->id,
                'name' => $request->input('coupon_name'),
                'code' => $request->input('coupon_code'),
                'genre' => $request->input('coupon_genre'),
                'genre_val' => (int)$request->input('coupon_genre_val'),
                'timeslimit' => (int)$request->input('timeslimit'),
                'must_amount' => (int)$request->input('must_amount'),
                'period_start' => $request->input('period_start'),
                'period_end' => $request->input('period_end'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            session()->flash('message', 'クーポンが追加されました。');
        } catch (\Throwable $th) {
            report($th);
            session()->flash('error', 'グループが削除されました。');
        }
        return redirect()->route('manage.marketing.coupon.index', ['account' => $account]);
    }
}
