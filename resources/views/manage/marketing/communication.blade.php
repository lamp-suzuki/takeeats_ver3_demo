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
    <a class="current" href="{{ route('manage.marketing.communication.index', ['account' => $sub_domain]) }}">コミュニケーション</a>
  </li>
</ul>
@endsection

@section('content')
<div class="page-head">
  <div class="container">
    <div class="d-flex justify-content-lg-between align-items-center">
      <h2>コミュケーション</h2>
      <a href="{{ route('manage.marketing.communication.add', ['account' => $sub_domain]) }}" class="btn btn-primary btn-icon ml-auto">
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

    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="com-mail" data-toggle="tab" href="#tabs-mail" role="tab" aria-controls="mail" aria-selected="true">未送信(1)</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="com-send" data-toggle="tab" href="#tabs-send" role="tab" aria-controls="send" aria-selected="false">送信済(1)</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="com-temp" data-toggle="tab" href="#tabs-temp" role="tab" aria-controls="temp" aria-selected="false">テンプレート(1)</a>
      </li>
    </ul>
    {{-- .nav-tabs --}}
    <div class="tab-content">
      <div class="tab-pane fade show active" id="tabs-mail" role="tabpanel">
        <div class="table-wrap rounded-lg table-responsive">
          <table class="table table--align-middle">
            <thead>
              <tr>
                <th scope="col" class="text-nowrap">ステータス</th>
                <th scope="col" class="text-nowrap">件名</th>
                <th scope="col" class="pc-only text-nowrap">配信方法</th>
                <th scope="col" class="pc-only">更新日</th>
                <th scope="col" class="pc-only">添付</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <span class="status">未送信</span>
                </td>
                <td class="font-weight-bold"><a href="./communication_add.html" class="text-body">【CoralCafe】会員様限定クーポン</a></td>
                <td class="pc-only">メール</td>
                <td class="pc-only">2020/11/01 09:23</td>
                <td class="pc-only">クーポン名</td>
                <td class="text-right">
                  <div class="dropdown">
                    <i data-feather="more-vertical" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="./communication_add.html">編集</a>
                      <a class="dropdown-item" href="#">削除</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="status status-done">予約済</span>
                </td>
                <td class="font-weight-bold"><a href="./communication_add.html" class="text-body">【CoralCafe】会員様限定クーポン</a></td>
                <td class="pc-only">メール</td>
                <td class="pc-only">2020/10/28 13:55</td>
                <td class="pc-only">クーポン名</td>
                <td class="text-right">
                  <div class="dropdown">
                    <i data-feather="more-vertical" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="./communication_add.html">編集</a>
                      <a class="dropdown-item" href="#">削除</a>
                    </div>
                  </div>
                </td>
              </tr>
              {{-- <tr>
                <td>
                  <span class="status status-done">送信予約済</span>
                </td>
                <td class="font-weight-bold"><a href="./communication_add.html" class="text-body">【CoralCafe】予約サイトがオープンしました！</a></td>
                <td>メール</td>
                <td>2020/07/01 15:00</td>
                <td>-</td>
                <td class="text-right">
                  <div class="dropdown">
                    <i data-feather="more-vertical" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="./communication_add.html">編集</a>
                      <a class="dropdown-item" href="#">削除</a>
                    </div>
                  </div>
                </td>
              </tr> --}}
            </tbody>
          </table>
        </div>
        {{-- .table-wrap --}}
        <div class="mt-4">
          <ul class="pagination">
            {{-- <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li> --}}
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            {{-- <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li> --}}
          </ul>
        </div>
        {{-- .pagination --}}
      </div>
      {{-- .tab-pane --}}

      <div class="tab-pane fade" id="tabs-send" role="tabpanel">
        <div class="table-wrap rounded-lg table-responsive">
          <table class="table table--align-middle">
            <thead>
              <tr>
                <th scope="col">件名</th>
                <th scope="col" class="pc-only">配信方法</th>
                <th scope="col">送信日</th>
                <th scope="col" class="pc-only">添付</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="font-weight-bold"><a href="./communication_add.html" class="text-body">【CoralCafe】予約サイトがオープンしました！</a></td>
                <td class="pc-only">メール</td>
                <td>2020/11/01 17:00</td>
                <td class="pc-only">オープン記念クーポン</td>
                <td class="text-right">
                  <div class="dropdown">
                    <i data-feather="more-vertical" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">詳細</a>
                      <a class="dropdown-item" href="#">削除</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        {{-- .table-wrap --}}
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

      <div class="tab-pane fade" id="tabs-temp" role="tabpanel">
        <div class="table-wrap rounded-lg table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">名前</th>
                <th scope="col">更新日</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="font-weight-bold">
                  <a href="#" class="text-body">挨拶用</a>
                </td>
                <td>2020/07/03 09:45</td>
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
            </tbody>
          </table>
        </div>
      </div>
      {{-- .tab-pane --}}
    </div>
    {{-- .tab-content --}}
  </div>
  {{-- .container --}}
</div>
{{-- .page-main --}}
@endsection