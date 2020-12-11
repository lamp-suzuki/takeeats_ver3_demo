<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>管理画面 | TakeEats</title>

  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="{{ asset('css/manage/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/manage/app.js') }}" defer></script>
</head>

<body>
  <header class="header-menu">
    <nav class="nav-main">
      <div class="logo">
        <a href="{{ route('manage.home', ['account' => $sub_domain]) }}">
          <img src="{{ asset('images/logo_head.png') }}" alt="TakeEats"
            srcset="{{ asset('images/logo_head.png') }} 1x, {{ asset('images/logo_head@2x.png') }} 2x" />
        </a>
      </div>
      {{-- .logo --}}
      <ul class="nav-main-list">
        <li class="nav-main-item">
          <a href="{{ route('manage.home', ['account' => $sub_domain]) }}"
            class="{{ (request()->segment(2) == 'home') ? 'current' : '' }}">
            <img src="{{ asset('images/icon_home.png') }}" alt=""
              srcset="{{ asset('images/icon_home.png') }} 1x, {{ asset('images/icon_home@2x.png') }} 2x" />
            <span>ホーム</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a href="#" class="{{ (request()->segment(2) == 'oreder') ? 'current' : '' }}">
            <img src="{{ asset('images/icon_list.png') }}" alt=""
              srcset="{{ asset('images/icon_list.png') }} 1x, {{ asset('images/icon_list@2x.png') }} 2x" />
            <span>注文履歴</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a href="#" class="{{ (request()->segment(2) == 'product') ? 'current' : '' }}">
            <img src="{{ asset('images/icon_dish.png') }}" alt=""
              srcset="{{ asset('images/icon_dish.png') }} 1x, {{ asset('images/icon_dish@2x.png') }} 2x" />
            <span>商品管理</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a href="#" class="{{ (request()->segment(2) == 'post') ? 'current' : '' }}">
            <img src="{{ asset('images/icon_mail.png') }}" alt=""
              srcset="{{ asset('images/icon_mail.png') }} 1x, {{ asset('images/icon_mail@2x.png') }} 2x" />
            <span>お知らせ</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a href="#" class="{{ (request()->segment(2) == 'marketing') ? 'current' : '' }}">
            <img src="{{ asset('images/icon_graf.png') }}" alt=""
              srcset="{{ asset('images/icon_graf.png') }} 1x, {{ asset('images/icon_graf@2x.png') }} 2x" />
            <span>マーケティング</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a href="#" class="{{ (request()->segment(2) == 'customize') ? 'current' : '' }}">
            <img src="{{ asset('images/icon_customize.png') }}" alt=""
              srcset="{{ asset('images/icon_customize.png') }} 1x, {{ asset('images/icon_customize@2x.png') }} 2x" />
            <span>カスタマイズ</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a href="#" class="{{ (request()->segment(2) == 'setting') ? 'current' : '' }}">
            <img src="{{ asset('images/icon_setting.png') }}" alt=""
              srcset="{{ asset('images/icon_setting.png') }} 1x, {{ asset('images/icon_setting@2x.png') }} 2x" />
            <span>設定</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a href="#" class="{{ (request()->segment(2) == 'support') ? 'current' : '' }}">
            <img src="{{ asset('images/icon_support.png') }}" alt=""
              srcset="{{ asset('images/icon_support.png') }} 1x, {{ asset('images/icon_support@2x.png') }} 2x" />
            <span>サポート</span>
          </a>
        </li>
      </ul>
    </nav>
    {{-- .nav-main --}}
    <nav class="nav-sub">
      @yield('pagemenu')
    </nav>
    {{-- .nav-sub --}}
  </header>
  {{-- /header --}}

  <main class="main">
    <nav class="spmenu">
      <div class="container">
        <div class="d-flex align-items-center">
          <button type="button" class="btn js-nav-main-toggle">
            <i data-feather="menu"></i>
          </button>
          <a class="d-block mx-auto" href="{{ route('manage.home', ['account' => $sub_domain]) }}">
            <img src="{{ asset('images/logo.png') }}" alt=""
              srcset="{{ asset('images/logo.png') }} 1x, {{ asset('images/logo@2x.png') }} 2x" />
          </a>
          <span></span>
        </div>
      </div>
    </nav>
    {{-- .spmenu --}}
    @yield('content')
  </main>
  {{-- .main --}}

  <footer class="footer py-1 px-3">
    <small class="d-block text-right">©2020 TakeEats</small>
  </footer>
  {{-- /footer --}}

  <div class="overlay"></div>

</body>

</html>