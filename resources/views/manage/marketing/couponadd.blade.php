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
    </div>
  </div>
</div>
{{-- .page-head --}}

<div class="page-main">
  <div class="container">
    <div class="mb-4">
      <a href="{{ route('manage.marketing.coupon.index', ['account' => $sub_domain]) }}"
        class="btn btn-info rounded-pill">
        <i data-feather="arrow-left"></i>
        <span class="ml-1">一覧に戻る</span>
      </a>
    </div>
    {{-- prevbtn --}}
    <form action="{{ route('manage.marketing.coupon.confirm', ['account' => $sub_domain]) }}" method="post"
      class="bg-white p-3 rounded-lg" name="coupon_add">
      @csrf
      <div class="form-group row m-0 pb-3 border-bottom align-items-center">
        <label for="coupon_name" class="col-sm-2 col-form-label">クーポン名</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="例）年末年始100円OFFクーポン" />
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 border-bottom align-items-center">
        <label for="coupon_code" class="col-sm-2 col-form-label">クーポンコード</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="英数字10文字以内（大文字小文字は区別）" />
        </div>
        <div class="col-sm-5 mt-sm-0 mt-2">
          <button type="button" class="btn btn-sm btn-outline-secondary" id="auto_coupon_code">自動入力</button>
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 border-bottom align-items-center">
        <label for="code" class="col-sm-2 col-form-label">クーポン内容</label>
        <div class="col-sm-3 mb-sm-0 mb-2">
          <select class="custom-select" name="coupon_genre">
            <option value="discount">値引き</option>
            <option value="off">%OFF</option>
          </select>
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text js-coupongenre-symbol">￥</div>
            </div>
            <input type="number" class="form-control" placeholder="50" name="coupon_genre_val" />
            <div class="input-group-append">
              <div class="input-group-text js-coupongenre-text">引き</div>
            </div>
          </div>
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 border-bottom align-items-center">
        <label for="code_code" class="col-sm-2 col-form-label">使用回数</label>
        <div class="col-sm-10">
          <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="timeslimit" id="inlineRadio1" value="0" checked />
            <label class="custom-control-label" for="inlineRadio1">1人1回まで</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="timeslimit" id="inlineRadio2" value="1" />
            <label class="custom-control-label" for="inlineRadio2">何度でも可</label>
          </div>
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 border-bottom align-items-center">
        <label for="code_code" class="col-sm-2 col-form-label">
          <span>使用制限</span>
          <span class="badge badge-light">任意</span>
        </label>
        <div class="col-sm-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">￥</div>
            </div>
            <input type="number" class="form-control" placeholder="1000" name="must_amount" />
            <div class="input-group-append">
              <div class="input-group-text">以上</div>
            </div>
          </div>
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 align-items-center">
        <label for="code_code" class="col-sm-2 col-form-label">有効期限</label>
        <div class="col-sm-10">
          <div class="form-inline">
            <input type="date" class="form-control form-control-sm w-sm-auto" placeholder="2020-01-01"
              name="period_start" />
            <span class="mx-1">〜</span>
            <input type="date" class="form-control form-control-sm w-sm-auto" placeholder="2020-02-01"
              name="period_end" />
          </div>
        </div>
      </div>
      {{-- .form-group --}}
    </form>
    <div class="form-group mt-4 d-lg-block d-none text-center">
      <button type="button" class="btn btn-primary" onclick="document.coupon_add.submit()">保存する</button>
    </div>
    <div class="form-group mt-4 d-lg-none">
      <button type="button" class="btn btn-block btn-primary" onclick="document.coupon_add.submit()">保存する</button>
    </div>
    {{-- submit --}}
  </div>
  {{-- .container --}}
</div>
{{-- .page-main --}}
@endsection