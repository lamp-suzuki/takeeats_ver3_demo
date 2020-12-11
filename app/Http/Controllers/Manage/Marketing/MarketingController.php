<?php

namespace App\Http\Controllers\Manage\Marketing;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    // 売上データ
    public function sales($account)
    {
        $orders = DB::table('orders');
        return view('manage.marketing.sales');
    }

    // 顧客データ
    public function customer($account, Request $request)
    {
        $manage = Auth::guard('manage')->user();

        $groups = DB::table('groups')->where('manages_id', $manage->id)->get();
        if ($groups == null) {
            $groups = [];
        }

        $customers = DB::table('orders')->where('manages_id', $manage->id);

        // キーワード検索
        if ($request->has('search') && $request->search != '' && $request->search != null) {
            $customers->where('tel', 'LIKE', "%{$request->search}%")
                ->orWhere('name', 'LIKE', "%{$request->search}%")
                ->orWhere('furigana', 'LIKE', "%{$request->search}%")
                ->orWhere('email', 'LIKE', "%{$request->search}%");
        }

        // 絞り込み
        if ($request->has('filters') && $request->filters == 'on') {
            $request->session()->put('customer_filters', $request->input()); // セッション保存
            if (is_array($request->status) && count($request->status) > 0) {
                if (count($request->status) != 2) {
                    if ($request->status[0] == '会員') {
                        // 会員のみ
                        $customers->where('users_id', '!=', null);
                        // 会員登録+初回注文
                        if ($request->registerdate != '' && $request->registerdate != null) {
                        }
                    } else {
                        // 非会員のみ
                        $customers->where('users_id', null);
                    }
                }
            }
            if ($request->orderdate != '' && $request->orderdate != null) {
                $customers->whereBetween('created_at', [$request->orderdate, date('Y-m-d H:i:s')]);
            }
            if ($request->ordercount != '' && $request->ordercount != null && $request->ordercount > 2) {
            }
            if ($request->orderamount != '' && $request->orderamount != null) {
                $customers->where('total_amount', '>=', $request->orderamount);
            }
            if (is_array($request->ordermethod) && count($request->ordermethod) > 0) {
                if (array_search('お持ち帰り', $request->ordermethod) === false) {
                    $customers->where('service', '!=', 'お持ち帰り');
                }
                if (array_search('デリバリー', $request->ordermethod) === false) {
                    $customers->where('service', '!=', 'デリバリー');
                }
                if (array_search('通販', $request->ordermethod) === false) {
                    $customers->where('service', '!=', '通販');
                }
            }
        }

        $result = $customers->orderByDesc('created_at')->get()->groupBy('email');

        return view('manage.marketing.customer', [
            'groups' => $groups,
            'customers' => $result,
            'request' => $request,
        ]);
    }

    // 顧客データ詳細
    public function customer_detail($account, $orderid)
    {
        // 注文データ
        $order = DB::table('orders')->find($orderid);

        // 注文回数
        $orders = DB::table('orders')->where('email', $order->email)->get();

        // 会員情報
        if ($order->users_id !== null) {
            $users = DB::table('users')->find($order->users_id);
        } else {
            $users = null;
        }
        return view('manage.marketing.customerdetail', [
            'orders' => $orders,
            'users' => $users,
        ]);
    }

    // 顧客データダウンロード
    public function customer_download($account)
    {
    }

    // グループ追加
    public function group_add($account, Request $request)
    {
        try {
            $manage = Auth::guard('manage')->user();
            $filters = $request->session()->get('customer_filters');
            DB::table('groups')->insert([
                'manages_id' => $manage->id,
                'name' => $request->input('groupname'),
                'status' => implode(",", $filters['status']),
                'orderdate' => $filters['orderdate'],
                'registerdate' => $filters['registerdate'],
                'ordercount' => (int)$filters['ordercount'],
                'orderamount' => (int)$filters['orderamount'],
                'ordermethod' => implode(",", $filters['ordermethod']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            session()->flash('message', 'グループが追加されました。');
        } catch (\Throwable $th) {
            report($th);
            // session()->flash('error', 'グループが追加されました。');
        }
        return redirect()->route('manage.marketing.customer.index', ['account' => $account]);
    }

    // グループ削除
    public function group_delete($account, $id, Request $request)
    {
        try {
            DB::table('groups')->where('id', $id)->delete();
            session()->flash('message', 'グループが削除されました。');
        } catch (\Throwable $th) {
            report($th);
            // session()->flash('error', 'エラーが');
        }
        return redirect()->route('manage.marketing.customer.index', ['account' => $account]);
    }
}
