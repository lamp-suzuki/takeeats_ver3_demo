<?php

namespace App\Http\Controllers\Manage\Setting\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $manage = Auth::guard('manage')->user();
        $shops = DB::table('shops')->where('manages_id', $manage->id)->get();
        if ($shops == null) {
            $shops = [];
        }
        return view('manage.shop.index', [
            'shops' => $shops
        ]);
    }
}
