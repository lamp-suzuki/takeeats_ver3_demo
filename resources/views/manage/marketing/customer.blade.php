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
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="com-customer" data-toggle="tab" href="#tabs-customer" role="tab"
          aria-controls="customer" aria-selected="true">顧客一覧</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="com-group" data-toggle="tab" href="#tabs-group" role="tab" aria-controls="group"
          aria-selected="false">絞り込みグループ(1)</a>
      </li>
    </ul>
    <!-- .nav-tabs -->
    <div class="tab-content">
      <div class="tab-pane fade show active" id="tabs-customer" role="tabpanel">
        <div class="filter-form d-flex align-items-center justify-content-between flex-wrap mb-3">
          <form action="" method="post" class="col-md-6 p-0">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text border-0">
                  <i class="mt-0" data-feather="search"></i>
                </div>
              </div>
              <input type="text" class="form-control form-control-sm border-0" placeholder="顧客情報を検索" />
            </div>
          </form>
          <div class="col-md-4 p-0 mt-md-0 mt-3">
            <button type="button" class="btn btn-block btn-dark" data-toggle="modal" data-target="#filtercustomer">
              <i data-feather="filter"></i>
              <span class="ml-1">絞り込み条件を設定する</span>
            </button>
          </div>
        </div>
        <!-- .filter-form -->
        <div class="filter-badge mb-3">
          <button class="badge badge-pill">
            <span class="mr-1">会員</span>
            <i data-feather="x"></i>
          </button>
          <button class="badge badge-pill">
            <span class="mr-1">ゲスト</span>
            <i data-feather="x"></i>
          </button>
          <button class="badge badge-pill">
            <span class="mr-1">注文回数:2</span>
            <i data-feather="x"></i>
          </button>
        </div>
        <!-- .filter-badge -->
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
              <tr>
                <td>
                  <i class="text-primary mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">James Riney</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/12/01 11:36</td>
                <td class="text-right pc-only">12</td>
              </tr>
              <tr>
                <td>
                  <i class="text-primary mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">澤山 陽平</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/11/06 14:00</td>
                <td class="text-right pc-only">4</td>
              </tr>
              <tr>
                <td>
                  <i class="text-white mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">吉澤 美弥子</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/10/21 10:11</td>
                <td class="text-right pc-only">3</td>
              </tr>
              <tr>
                <td>
                  <i class="text-white mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">津田 遼</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/09/12 11:20</td>
                <td class="text-right pc-only">3</td>
              </tr>
              <tr>
                <td>
                  <i class="text-white mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">小林 恭子</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/09/01 11:20</td>
                <td class="text-right pc-only">3</td>
              </tr>
              <tr>
                <td>
                  <i class="text-white mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">西村 賢</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/08/04 14:10</td>
                <td class="text-right pc-only">3</td>
              </tr>
              <tr>
                <td>
                  <i class="text-white mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">大森 貴之</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/08/01 11:36</td>
                <td class="text-right pc-only">3</td>
              </tr>
              <tr>
                <td>
                  <i class="text-white mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">小林 翔太郎</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/07/31 18:24</td>
                <td class="text-right pc-only">3</td>
              </tr>
              <tr>
                <td>
                  <i class="text-white mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">世古 圭</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/07/31 11:23</td>
                <td class="text-right pc-only">3</td>
              </tr>
              <tr>
                <td>
                  <i class="text-white mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">井口 彰太</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/07/14 14:45</td>
                <td class="text-right pc-only">3</td>
              </tr>
              <tr>
                <td>
                  <i class="text-white mr-2" data-feather="award"></i>
                  <a href="./customers_detail.html" class="text-body font-weight-bold">中澤 理香</a>
                </td>
                <td class="text-center">
                  <a href="mailto:info@example.com" data-toggle="tooltip" data-placement="top" title="メール作成">
                    <i data-feather="mail"></i>
                  </a>
                  <span class="mx-2 text-light">|</span>
                  <a href="tel:000-000-0000" data-toggle="tooltip" data-placement="top" title="電話をかける">
                    <i data-feather="phone"></i>
                  </a>
                </td>
                <td class="pc-only">2020/07/14 11:46</td>
                <td class="text-right pc-only">3</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-4">
          <ul class="pagination">
            <!-- <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li> -->
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li> -->
          </ul>
        </div>
        <!-- .pagination -->
      </div>
      <!-- .tab-pane -->
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
              <tr>
                <td>
                  <a href="./customers.html" class="text-body font-weight-bold">今月お買い上げ頂いたお客様</a>
                </td>
                <td class="text-right text-nowrap">
                  <a href="./communication_add.html" class="text-body">
                    <i data-feather="mail"></i>
                    <span class="ml-1">メールを送る</span>
                  </a>
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <i data-feather="more-vertical" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">削除</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- .tab-pane -->
    </div>
    <!-- .tab-content -->
  </div>
  <!-- .container -->
  <div class="action-btn">
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#filtersave">
      <i data-feather="users"></i>
      <span class="mx-2">|</span>
      <span>この条件でグループを作成する</span>
    </button>
  </div>
  <!-- .action-btn -->
</div>
<!-- .page-main -->
</main>
<!-- /main -->

<!-- Modal -->
<div class="modal fade" id="filtercustomer" tabindex="-1" aria-labelledby="filtercustomerLabel" aria-hidden="true">
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
              <input type="checkbox" class="custom-control-input" id="follower" checked />
              <label class="custom-control-label" for="follower">会員</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="not_follower" checked />
              <label class="custom-control-label" for="not_follower">非会員</label>
            </div>
          </div>
        </div>
        <div class="form-group row m-0 py-3 border-bottom align-items-center">
          <label class="font-weight-bold col-sm-3 col-form-label">最終注文日</label>
          <div class="col-sm-5">
            <input type="date" class="form-control" placeholder="2020-01-01" />
          </div>
        </div>
        <div class="form-group row m-0 py-3 border-bottom align-items-center">
          <label class="font-weight-bold col-sm-3 col-form-label">
            <span>会員登録日</span>
            <small class="d-block form-text">※会員のみ</small>
          </label>
          <div class="col-sm-5">
            <input type="date" class="form-control" placeholder="2020-01-01" />
          </div>
        </div>
        <div class="form-group row m-0 py-3 border-bottom align-items-center">
          <label for="orders_count" class="font-weight-bold col-sm-3 col-form-label">注文回数</label>
          <div class="col-sm-5">
            <div class="input-group">
              <input type="number" class="form-control" aria-describedby="orders_count" value="1" max="999" />
              <div class="input-group-append">
                <span class="input-group-text" id="orders_count">回以上</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row m-0 py-3 border-bottom align-items-center">
          <label for="orders_count" class="font-weight-bold col-sm-3 col-form-label">1回の注文金額</label>
          <div class="col-sm-5">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">￥</span>
              </div>
              <input type="number" class="form-control" aria-describedby="orders_count" value="1000" />
              <div class="input-group-append">
                <span class="input-group-text" id="orders_count">以上</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row m-0 pt-3 align-items-center">
          <label class="font-weight-bold col-sm-3 col-form-label">注文方法</label>
          <div class="col-sm-9">
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="oder_takeout" checked />
              <label class="custom-control-label" for="oder_takeout">お持ち帰り</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="oder_delivery" checked />
              <label class="custom-control-label" for="oder_delivery">デリバリー</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="oder_ec" />
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
</div>

<div class="modal fade" id="filtersave" tabindex="-1" aria-labelledby="filtersaveLabel" aria-hidden="true">
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
            <input type="text" name="" class="form-control" />
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
</div>

@endsection