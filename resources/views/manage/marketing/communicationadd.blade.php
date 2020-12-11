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
    <a href="{{ route('manage.marketing.coupon.index', ['account' => $sub_domain]) }}">クーポン</a>
  </li>
  <li class="nav-sub-item">
    <a class="current"
      href="{{ route('manage.marketing.communication.index', ['account' => $sub_domain]) }}">コミュニケーション</a>
  </li>
</ul>
@endsection

@section('content')
<div class="page-head">
  <div class="container">
    <div class="d-flex justify-content-lg-between align-items-center">
      <h2>コミュケーション</h2>
    </div>
  </div>
</div>
{{-- .page-head --}}

<div class="page-main">
  <div class="container">
    <div class="mb-4">
      <a href="{{ route('manage.marketing.communication.index', ['account' => $sub_domain]) }}"
        class="btn btn-info rounded-pill">
        <i data-feather="arrow-left"></i>
        <span class="ml-1">一覧に戻る</span>
      </a>
    </div>
    {{-- prevbtn --}}
    @if(count($groups) == 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <span>送信グループがまだ作成されていません。<a
          href="{{ route('manage.marketing.customer.index', ['account' => $sub_domain]) }}">こちら</a>から作成ください。</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <form action="{{ route('manage.marketing.communication.confirm', ['account' => $sub_domain]) }}" method="post" class="p-3 rounded-lg bg-white" name="communication_add">
      @csrf
      <div class="form-group row m-0 py-3 border-bottom">
        <label class="col-sm-3 col-form-label">
          <span>テンプレート</span>
          <span class="badge badge-light">任意</span>
        </label>
        <div class="col-sm-9">
          <div class="row mx-0">
            <div class="col-md">
              <select class="custom-select">
                <option>テンプレートを選択</option>
                @foreach ($templates as $template)
                <option value="{{ $template->id }}">{{ $template->name }}</option>
                @endforeach
              </select>
            </div>
            {{-- .col --}}
            <div class="col-md mt-md-0 mt-2">
              <button type="button" class="btn btn-dark">本文に反映</button>
            </div>
            {{-- .col --}}
          </div>
          {{-- .row --}}
          <div class="custom-control custom-checkbox mt-3">
            <input type="checkbox" class="custom-control-input" id="savecheck" />
            <label class="custom-control-label" for="savecheck">このメールをテンプレートに保存する</label>
          </div>
          {{-- .form-check --}}
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 border-bottom align-items-center">
        <label for="target" class="col-sm-3 col-form-label">送信グループ</label>
        <div class="col-sm-9">
          <select class="custom-select" id="target" name="groups_id">
            <option value="">送信グループを選択</option>
            @foreach ($groups as $group)
            <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 border-bottom align-items-center">
        <label for="title" class="col-sm-3 col-form-label">件名</label>
        <div class="col-sm-9">
          <input type="text" name="title" class="form-control" id="title" />
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 border-bottom align-items-center">
        <label for="title" class="col-sm-3 col-form-label">本文</label>
        <div class="col-sm-9">
          <p>以下の置換文字をご利用いただけます。クリックでコピーしてください。</p>
          <div class="d-flex flex-wrap">
            <button type="button" class="btn-clip-board mr-2 mb-2">
              <span data-clip="%%customer_name%%">お客様名</span>
              <i data-feather="copy"></i>
            </button>
          </div>
          {{-- .d-flex --}}
          <textarea cols="30" rows="10" class="form-control" name="content"></textarea>
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 align-items-center">
        <label class="col-sm-3 col-form-label">予約配信</label>
        <div class="col-sm-9">
          <div class="row mx-0">
            <div class="col">
              <input type="date" name="date" value="" class="form-control" placeholder="2020-01-01">
            </div>
            <div class="col">
              <input type="time" name="time" value="" class="form-control" placeholder="12:00">
            </div>
          </div>
        </div>
      </div>
      {{-- .form-group --}}
      <div class="form-group row m-0 py-3 align-items-center">
        <label class="col-sm-3 col-form-label">クーポン配布</label>
        <div class="col-sm-9">
          <div class="input-toggle-switch">
            <input type="checkbox" name="coupon_flag" id="coupon_flag" class="input-toggle-switch--hideshow"
              data-toggle="#coupon_select" />
            <label class="check" for="coupon_flag">
              <span></span>
            </label>
          </div>
        </div>
      </div>
      {{-- .form-group --}}
      <div id="coupon_select" class="form-group row m-0 py-3 border-top align-items-center" style="display: none">
        <label class="col-sm-3 col-form-label">クーポンの選択</label>
        <div class="col-sm-9">
          <div class="row align-items-center">
            <div class="col-md">
              <select id="coupon_select_item" class="custom-select" name="coupon">
                <option value="">クーポンを選択</option>
                @foreach ($coupons as $coupon)
                <option value="{{ $coupon->code }}">{{ $coupon->name }}</option>
                @endforeach
              </select>
              @if(count($coupons) == 0)
              <div class="alert alert-danger alert-dismissible fade show shadow-sm mt-3" role="alert">
                <span>クーポンがまだ作成されていません。<a
                    href="{{ route('manage.marketing.coupon.add', ['account' => $sub_domain]) }}">こちら</a>から作成ください。</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
            </div>
            {{-- .col --}}
            <div id="coupon_select_code" class="col-md mt-md-0 mt-2" style="display: none">
              <button type="button" class="btn-clip-board">
                <span data-clip=""></span>
                <i data-feather="copy"></i>
              </button>
            </div>
            {{-- .col --}}
          </div>
          {{-- .row --}}
        </div>
      </div>
      {{-- .form-group --}}
    </form>
    <div class="form-group mt-4 d-lg-block d-none text-center">
      <button type="button" class="btn btn-primary" onclick="document.communication_add.submit()">保存する</button>
    </div>
    <div class="form-group mt-4 d-lg-none">
      <button type="button" class="btn btn-block btn-primary" onclick="document.communication_add.submit()">保存する</button>
    </div>
    {{-- submit --}}
  </div>
  {{-- .container --}}
</div>
{{-- .page-main --}}
@endsection