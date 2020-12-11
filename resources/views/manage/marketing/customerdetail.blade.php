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
    <a class="current" href="{{ route('manage.marketing.customer', ['account' => $sub_domain]) }}">顧客データ</a>
  </li>
  <li class="nav-sub-item">
    <a href="#">クーポン</a>
  </li>
  <li class="nav-sub-item">
    <a href="#">コミュニケーション</a>
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
    <div class="row">
      <div class="col-lg-3 mb-lg-0 mb-4">
        <div class="p-3 bg-white rounded-lg">
          <p>
            <i class="text-primary" data-feather="award"></i>
            <span>会員</span>
          </p>
          <div class="my-3 text-center">
            <img src="./dist/images/icon_user.png" alt="会員"
              srcset="./dist/images/icon_user.png 1x, ./dist/images/icon_user@2x.png 2x" />
          </div>
          <p class="profile-name text-center">
            <span class="d-block small">ヤマダ タロウ</span>
            <span class="d-block h3">山田 太郎</span>
          </p>
          <hr />
          <p class="small">
            <span class="d-block text-secondary">メールアドレス</span>
            <span class="d-block">info@exapmle.com</span>
          </p>
          <p class="small">
            <span class="d-block text-secondary">電話番号</span>
            <span class="d-block">000-000-0000</span>
          </p>
          <p class="small mb-0">
            <span class="d-block text-secondary">住所</span>
            <span class="d-block">
              〒604-0024
              <br />
              京都府京都市中京区下妙覚寺町195 KMGビル4F
            </span>
          </p>
        </div>
      </div>
      <!-- .col -->
      <div class="col-lg-9">
        <div class="p-3 bg-white rounded-lg">
          <ul class="nav nav-tabs bg-white" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link bg-white active" id="com-order" data-toggle="tab" href="#tabs-order" role="tab"
                aria-controls="order" aria-selected="true">注文履歴(5)</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link bg-white" id="com-point" data-toggle="tab" href="#tabs-point" role="tab"
                aria-controls="point" aria-selected="false">ポイント履歴(5)</a>
            </li>
          </ul>
          <!-- .nav-tabs -->
          <div class="tab-content">
            <div class="table-wrap table-responsive tab-pane fade show active" id="tabs-order" role="tabpanel">
              <table class="table table--align-middle">
                <thead>
                  <tr>
                    <th class="text-nowrap pc-only" scope="col">日付</th>
                    <th class="text-nowrap pc-only" scope="col">注文方法</th>
                    <th class="text-nowrap" scope="col">内容</th>
                    <th class="text-nowrap" scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="pc-only">2020/11/11 10:32</td>
                    <td class="pc-only">
                      <span class="py-1 px-3 bg-info">テイクアウト</span>
                    </td>
                    <td>2点 合計 ¥2,940</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-secondary m-0">注文詳細</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="pc-only">2020/11/11 10:32</td>
                    <td class="pc-only">
                      <span class="py-1 px-3 bg-info">テイクアウト</span>
                    </td>
                    <td>2点 合計 ¥2,940</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-secondary m-0">注文詳細</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="pc-only">2020/11/11 10:32</td>
                    <td class="pc-only">
                      <span class="py-1 px-3 bg-info">テイクアウト</span>
                    </td>
                    <td>2点 合計 ¥2,940</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-secondary m-0">注文詳細</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="pc-only">2020/11/11 10:32</td>
                    <td class="pc-only">
                      <span class="py-1 px-3 bg-info">テイクアウト</span>
                    </td>
                    <td>2点 合計 ¥2,940</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-secondary m-0">注文詳細</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="table-wrap table-responsive tab-pane fade" id="tabs-point" role="tabpanel">
              <table class="table table--align-middle">
                <thead>
                  <tr>
                    <th scope="col" class="pc-only">日付</th>
                    <th scope="col">内容</th>
                    <th scope="col" class="text-right">ポイント</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="pc-only">2020/11/11 10:32</td>
                    <td>キャンペーンポイント獲得</td>
                    <td class="text-right">
                      <span class="font-weight-bold">+1,000</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pc-only">2020/11/11 10:32</td>
                    <td>購入ポイント獲得</td>
                    <td class="align-middle text-right">
                      <span class="font-weight-bold">+52</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pc-only">2020/11/11 10:32</td>
                    <td>ポイント使用</td>
                    <td class="text-right">
                      <span class="font-weight-bold text-primary">-500</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- .tab-content -->
        </div>
      </div>
      <!-- .col -->
    </div>
    <!-- .row -->
  </div>
  <!-- .container -->
</div>
<!-- .page-main -->
@endsection