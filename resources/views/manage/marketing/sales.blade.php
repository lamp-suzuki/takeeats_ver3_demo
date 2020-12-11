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
    <a class="current" href="{{ route('manage.marketing.sales', ['account' => $sub_domain]) }}">売上データ</a>
  </li>
  <li class="nav-sub-item">
    <a href="{{ route('manage.marketing.customer.index', ['account' => $sub_domain]) }}">顧客データ</a>
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
      <h2>売上データ</h2>
      <a href="#" class="btn btn-primary btn-icon ml-auto">
        <i data-feather="plus-circle"></i>
        <span class="ml-1">新規追加</span>
      </a>
    </div>
  </div>
</div>
{{-- .page-head --}}

<div class="page-main">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="p-3 bg-white rounded-lg mb-4">
          <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
            <h3 class="mb-0">売上金額</h3>
            <select class="form-control form-control-sm w-auto">
              <option selected>過去7日</option>
              <option>過去14日</option>
              <option>過去28日</option>
              <option>2020年4月</option>
              <option>2020年3月</option>
              <option>2020年2月</option>
              <option>2020年1月</option>
            </select>
          </div>
          <div class="chart-wrap">
            <p>
              ￥
              <span class="ml-1">235,118</span>
            </p>
            <canvas class="js-chart-line" data-chart="amount"></canvas>
          </div>
        </div>
      </div>
      {{-- .col --}}
      <div class="col-lg-6">
        <div class="p-3 bg-white rounded-lg mb-4">
          <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
            <h3 class="mb-0">注文数</h3>
            <select class="form-control form-control-sm w-auto">
              <option selected>過去7日</option>
              <option>過去14日</option>
              <option>過去28日</option>
              <option>2020年4月</option>
              <option>2020年3月</option>
              <option>2020年2月</option>
              <option>2020年1月</option>
            </select>
          </div>
          <div class="chart-wrap">
            <p>
              <span class="mr-1">168</span>
              件
            </p>
            <canvas class="js-chart-line" data-chart="count"></canvas>
          </div>
        </div>
      </div>
      {{-- .col --}}
      <div class="col-lg-6">
        <div class="p-3 bg-white rounded-lg mb-4">
          <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
            <h3 class="mb-0">平均注文単価</h3>
            <select class="form-control form-control-sm w-auto">
              <option selected>過去7日</option>
              <option>過去14日</option>
              <option>過去28日</option>
              <option>2020年4月</option>
              <option>2020年3月</option>
              <option>2020年2月</option>
              <option>2020年1月</option>
            </select>
          </div>
          <div class="chart-wrap">
            <p>
              ￥
              <span class="ml-1">1,399.51</span>
            </p>
            <canvas class="js-chart-line" data-chart="unitprice"></canvas>
          </div>
        </div>
      </div>
      {{-- .col --}}
      <div class="col-lg-6">
        <div class="p-3 bg-white rounded-lg mb-4">
          <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
            <h3 class="mb-0">会員数</h3>
            <select class="form-control form-control-sm w-auto">
              <option selected>過去7日</option>
              <option>過去14日</option>
              <option>過去28日</option>
              <option>2020年4月</option>
              <option>2020年3月</option>
              <option>2020年2月</option>
              <option>2020年1月</option>
            </select>
          </div>
          <div class="chart-wrap">
            <p>
              <span class="mr-1">250</span>
              人
            </p>
            <canvas class="js-chart-line" data-chart="follower"></canvas>
          </div>
        </div>
      </div>
      {{-- .col --}}
    </div>
  </div>
  {{-- .container --}}
</div>
{{-- .page-main --}}
@endsection