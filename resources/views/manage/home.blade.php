@extends('layouts.manage.app')

@section('pagemenu')
<div class="page-ttl">
  <span>ホーム</span>
  <button type="button" class="btn js-nav-sub-toggle">
    <i data-feather="menu"></i>
  </button>
</div>
<ul class="nav-sub-list">
  {{-- <li class="nav-sub-item">
    <a href="#">売上データ</a>
  </li>
  <li class="nav-sub-item">
    <a href="#">顧客データ</a>
  </li>
  <li class="nav-sub-item">
    <a href="#">クーポン</a>
  </li>
  <li class="nav-sub-item">
    <a href="#">コミュニケーション</a>
  </li> --}}
</ul>
@endsection

@section('content')
<div class="page-head">
  <div class="container">
    <div class="d-flex justify-content-lg-between align-items-center">
      <h2>ホーム</h2>
      {{-- <a href="./communication_add.html" class="btn btn-primary btn-icon ml-auto">
        <i data-feather="plus-circle"></i>
        <span class="ml-1">新規追加</span>
      </a> --}}
    </div>
  </div>
</div>
{{-- .page-head --}}

<div class="page-main">
  <div class="container">
  </div>
  {{-- .container --}}
</div>
{{-- .page-main --}}
@endsection