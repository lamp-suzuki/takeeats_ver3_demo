@extends('layouts.manage.app')

@section('pagemenu')
<div class="page-ttl">
  <span>マーケティング</span>
  <button type="button" class="btn js-nav-sub-toggle">
    <i data-feather="menu"></i>
  </button>
</div>
<ul class="nav-sub-list">
  <li class="nav-sub-item">
    <a href="{{ route('manage.marketing.sales', ['account' => $sub_domain]) }}">売上データ</a>
  </li>
  <li class="nav-sub-item">
    <a class="current" href="{{ route('manage.marketing.customer.index', ['account' => $sub_domain]) }}">顧客データ</a>
  </li>
  <li class="nav-sub-item">
    <a href="{{ route('manage.marketing.coupon.index', ['account' => $sub_domain]) }}">クーポン</a>
  </li>
  <li class="nav-sub-item">
    <a href="{{ route('manage.marketing.communication.index', ['account' => $sub_domain]) }}">コミュニケーション</a>
  </li>
</ul>
@endsection

@section('content')
<div class="page-head">
  <div class="container">
    <div class="d-flex justify-content-lg-between align-items-center">
      <h2>顧客データ</h2>
      <a href="#" class="btn btn-primary btn-icon ml-auto">
        <i data-feather="download"></i>
        <span class="ml-1">CSVダウンロード</span>
      </a>
    </div>
  </div>
</div>
{{-- .page-head --}}

<div class="page-main">
  <div class="container">

    {{-- 成功メッセージ --}}
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <span>{{ session('message') }}</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    {{-- エラーメッセージ --}}
    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <span>{{ session('error') }}</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="com-customer" data-toggle="tab" href="#tabs-customer" role="tab"
          aria-controls="customer" aria-selected="true">顧客一覧</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="com-group" data-toggle="tab" href="#tabs-group" role="tab" aria-controls="group"
          aria-selected="false">絞り込みグループ({{ count($groups) }})</a>
      </li>
    </ul>
    {{-- .nav-tabs --}}
    <div class="tab-content">
      <div class="tab-pane fade show active" id="tabs-customer" role="tabpanel">
        <div class="filter-form d-flex align-items-center justify-content-between flex-wrap mb-3">
          <form action="" method="post" class="col-md-6 p-0">
            @csrf
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text border-0">
                  <i class="mt-0" data-feather="search"></i>
                </div>
              </div>
              <input type="search" name="search" class="form-control form-control-sm border-0"
                value="@if($request->search){{ $request->search }}@endif" placeholder="名前・電話番号・メールで検索" />
            </div>
          </form>
          <div class="col-md-4 p-0 mt-md-0 mt-3">
            <button type="button" class="btn btn-block btn-dark" data-toggle="modal" data-target="#filtercustomer">
              <i data-feather="filter"></i>
              <span class="ml-1">絞り込み条件を設定する</span>
            </button>
          </div>
        </div>
        {{-- .filter-form --}}
        <div class="filter-badge mb-3">
          @if($request->status)
          @foreach ($request->status as $status)
          <button class="badge badge-pill">
            <span class="mr-1">{{ $status }}</span>
          </button>
          @endforeach
          @if($request->registerdate && $request->status[0] == '会員')
          <button class="badge badge-pill">
            <span class="mr-1">登録日：{{ date('Y/m/d', strtotime($request->registerdate)) }}〜</span>
          </button>
          @endif
          @endif
          @if($request->orderdate)
          <button class="badge badge-pill">
            <span class="mr-1">注文日：{{ date('Y/m/d', strtotime($request->orderdate)) }}〜</span>
          </button>
          @endif
          @if($request->ordercount && $request->ordercount > 1)
          <button class="badge badge-pill">
            <span class="mr-1">注文数：{{ number_format($request->ordercount) }}回〜</span>
          </button>
          @endif
          @if($request->orderamount)
          <button class="badge badge-pill">
            <span class="mr-1">注文額：{{ number_format($request->orderamount) }}円〜</span>
          </button>
          @endif
          @if($request->ordermethod)
          @foreach ($request->ordermethod as $ordermethod)
          <button class="badge badge-pill">
            <span class="mr-1">{{ $ordermethod }}</span>
          </button>
          @endforeach
          @endif
        </div>
        {{-- .filter-badge --}}
        <div class="table-wrap rounded-lg table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">名前</th>
                <th class="text-nowrap text-center" scope="col">連絡</th>
                <th scope="col" class="pc-only">最終注文日時</th>
                <th class="text-nowrap text-right pc-only" scope="col">注文回数</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $customer)
              @php
              $counts = count($customer);
              $data = $customer[0];
              @endphp
              <tr>
                <td>
                  @if($data->users_id !== null)
                  <i class="text-primary mr-2" data-feather="award"></i>
                  @else
                  <i class="text-white mr-2" data-feather="award"></i>
                  @endif
                  <a href="{{ route('manage.marketing.customer.detail', ['orderid' => $data->id, 'account' => $sub_domain]) }}"
                    class="text-body font-weight-bold">{{ $data->name }}</a>
                </td>
                <td class="text-center">
                  <a href="mailto:{{ $data->email }}" data-toggle="tooltip" data-placement="top" title="メール作成"
                    target="_blank">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:{{ $data->tel }}" data-toggle="tooltip" data-placement="top" title="電話をかける"
                    target="_blank">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">{{ date('Y/m/d H:i:s', strtotime($data->created_at)) }}</td>
                <td class="text-right pc-only">{{ number_format($counts) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-4">
          <ul class="pagination">
            {{-- <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li> --}}
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            {{-- <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li> --}}
          </ul>
        </div>
        {{-- .pagination --}}
      </div>
      {{-- .tab-pane --}}

      <div class="tab-pane fade" id="tabs-group" role="tabpanel">
        <div class="table-wrap rounded-lg table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">グループ名</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($groups as $group)
              <tr>
                <td>
                  <span class="text-body font-weight-bold">{{ $group->name }}</span>
                </td>
                <td class="text-right text-nowrap">
                  <a href="#" class="text-body">
                    <i data-feather="mail"></i>
                    <span class="ml-1">メールを送る</span>
                  </a>
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <i data-feather="more-vertical" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a class="dropdown-item"
                        href="{{ route('manage.marketing.customer.group.delete', ['account' => $sub_domain, 'id' => $group->id]) }}">削除</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{-- .tab-pane --}}
    </div>
    {{-- .tab-content --}}
  </div>
  {{-- .container --}}
  @if(session()->exists('customer_filters'))
  <div class="action-btn">
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#filtersave">
      <i data-feather="users"></i>
      <span class="mx-2">|</span>
      <span>この条件でグループを作成する</span>
    </button>
  </div>
  {{-- .action-btn --}}
  @endif
</div>
{{-- .page-main --}}
</main>
{{-- /main --}}

{{-- Modal --}}
<form action="" method="POST" class="modal fade" id="filtercustomer" tabindex="-1" aria-labelledby="filtercustomerLabel"
  aria-hidden="true">
  @csrf
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="filtercustomerLabel">絞り込み条件を設定する</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row m-0 pb-3 border-bottom align-items-center">
          <label for="follower" class="font-weight-bold col-sm-3 col-form-label">ステータス</label>
          <div class="col-sm-9">
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" name="status[]" class="custom-control-input" value="会員" id="follower" checked />
              <label class="custom-control-label" for="follower">会員</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" name="status[]" class="custom-control-input" value="ゲスト" id="not_follower"
                checked />
              <label class="custom-control-label" for="not_follower">非会員</label>
            </div>
          </div>
        </div>
        <div class="form-group row m-0 py-3 border-bottom align-items-center">
          <label class="font-weight-bold col-sm-3 col-form-label">最終注文日</label>
          <div class="col-sm-5">
            <div class="input-group">
              <input type="date" name="orderdate" class="form-control" placeholder="2020-01-01" />
              <div class="input-group-append">
                <span class="input-group-text" id="orderdate_text">以降</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row m-0 py-3 border-bottom align-items-center">
          <label class="font-weight-bold col-sm-3 col-form-label">
            <span>会員登録日</span>
            <small class="d-block form-text">※会員のみ</small>
          </label>
          <div class="col-sm-5">
            <div class="input-group">
              <input type="date" name="registerdate" class="form-control" placeholder="2020-01-01" />
              <div class="input-group-append">
                <span class="input-group-text" id="registerdate_text">以降</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row m-0 py-3 border-bottom align-items-center">
          <label for="orders_count" class="font-weight-bold col-sm-3 col-form-label">注文回数</label>
          <div class="col-sm-5">
            <div class="input-group">
              <input type="number" name="ordercount" class="form-control" aria-describedby="orders_count" value="1"
                max="999" />
              <div class="input-group-append">
                <span class="input-group-text" id="orders_count">回以上</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row m-0 py-3 border-bottom align-items-center">
          <label for="orders_amount" class="font-weight-bold col-sm-3 col-form-label">1回の注文金額</label>
          <div class="col-sm-5">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">￥</span>
              </div>
              <input type="number" name="orderamount" class="form-control" aria-describedby="orders_amount" value="" />
              <div class="input-group-append">
                <span class="input-group-text" id="orders_amount">以上</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row m-0 pt-3 align-items-center">
          <label class="font-weight-bold col-sm-3 col-form-label">注文方法</label>
          <div class="col-sm-9">
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" name="ordermethod[]" class="custom-control-input" id="oder_takeout" value="お持ち帰り"
                checked />
              <label class="custom-control-label" for="oder_takeout">お持ち帰り</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" name="ordermethod[]" class="custom-control-input" id="oder_delivery" value="デリバリー"
                checked />
              <label class="custom-control-label" for="oder_delivery">デリバリー</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" name="ordermethod[]" class="custom-control-input" id="oder_ec" value="通販"
                checked />
              <label class="custom-control-label" for="oder_ec">通販</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <div class="w-100 text-center col-md-4">
          <button type="submit" class="btn btn-block btn-primary">絞り込む</button>
        </div>
        <div class="w-100 text-center">
          <button type="reset" class="btn btn-link">設定をリセット</button>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="filters" value="on">
</form>

<form action="{{ route('manage.marketing.customer.group.add', ['account' => $sub_domain]) }}" method="POST"
  class="modal fade" id="filtersave" tabindex="-1" aria-labelledby="filtersaveLabel" aria-hidden="true">
  @csrf
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="filtersaveLabel">絞り込み条件を保存する</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row m-0 align-items-center">
          <label for="follower" class="font-weight-bold col-sm-3 col-form-label">グループ名</label>
          <div class="col-sm-9">
            <input type="text" name="groupname" class="form-control" />
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <div class="w-100 text-center col-md-4">
          <button type="submit" class="btn btn-block btn-primary">保存する</button>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection