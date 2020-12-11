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
    <a href="{{ route('manage.marketing.customer.index', ['account' => $sub_domain]) }}">顧客データ</a>
  </li>
  <li class="nav-sub-item">
    <a class="current" href="{{ route('manage.marketing.coupon.index', ['account' => $sub_domain]) }}">クーポン</a>
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
      <h2>クーポン</h2>
      <a href="{{ route('manage.marketing.coupon.add', ['account' => $sub_domain]) }}"
        class="btn btn-primary btn-icon ml-auto">
        <i data-feather="plus-circle"></i>
        <span class="ml-1">新規追加</span>
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
    <div class="table-wrap rounded-lg table-responsive table--align-middle">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ステータス</th>
            <th scope="col">名前</th>
            <th scope="col" class="pc-only">コード</th>
            <th scope="col" class="pc-only">更新日時</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($coupons as $coupon)
          <tr>
            <td>
              @if($coupon->send === 0)
              <span class="status">未配布</span>
              @else
              <span class="status status-done">配布済</span>
              @endif
            </td>
            <td class="font-weight-bold">
              <span class="text-body font-weight-bold">{{ $coupon->name }}</span>
            </td>
            <td class="pc-only">{{ $coupon->code }}</td>
            <td class="pc-only">{{ date('Y/m/d H:i:s', strtotime($coupon->updated_at)) }}</td>
            <td class="text-right">
              <div class="dropdown">
                <i data-feather="more-vertical" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">編集</a>
                  <a class="dropdown-item" href="#">削除</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  {{-- .container --}}
</div>
{{-- .page-main --}}
@endsection