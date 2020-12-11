<?php

namespace App\Http\Controllers\Manage\Marketing;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    // 一覧
    public function index($account)
    {
        $manage = Auth::guard('manage')->user();
        $communications = DB::table('communications')->where('manages_id', $manage->id)->get();
        $templates = DB::table('templates')->where('manages_id', $manage->id)->get();
        $coupons = DB::table('coupons')->where('manages_id', $manage->id)->get();

        return view('manage.marketing.communication', [
          'communications' => $communications,
          'templates' => $templates,
          'coupons' => $coupons,
        ]);
    }

    // 追加
    public function add($account)
    {
        $manage = Auth::guard('manage')->user();
        $templates = DB::table('templates')->where('manages_id', $manage->id)->get();
        $groups = DB::table('groups')->where('manages_id', $manage->id)->get();
        $coupons = DB::table('coupons')->where('manages_id', $manage->id)->get();

        return view('manage.marketing.communicationadd', [
            'templates' => $templates,
            'coupons' => $coupons,
            'groups' => $groups,
        ]);
    }

    // 保存
    public function confirm($account)
    {
        try {
            $manage = Auth::guard('manage')->user();
            // DB::table('communications')->insert([
            //     groups_id
            //     title
            //     content
            //     coupon
            // ]);
            session()->flash('message', 'コミュケーションが追加されました。');
        } catch (\Throwable $th) {
            report($th);
            // session()->flash('error', 'コミュケーションが追加されました。');
        }
        return redirect()->route('manage.marketing.communication.index', ['account' => $account]);
    }
}
