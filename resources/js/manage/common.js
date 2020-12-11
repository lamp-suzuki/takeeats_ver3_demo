$(function () {
  // metaタグ
  let ua = navigator.userAgent.toLowerCase();
  let isiOS = ua.indexOf("iphone") > -1 || ua.indexOf("ipad") > -1;
  if (isiOS) {
    var viewport = document.querySelector('meta[name="viewport"]');
    if (viewport) {
      var viewportContent = viewport.getAttribute("content");
      viewport.setAttribute("content", viewportContent + ", user-scalable=no");
    }
  }

  // スマホメニュー
  $(".js-nav-main-toggle, .overlay").on("click", function () {
    document.querySelector("body").classList.toggle("open-main-menu");
  });

  // サブメニュー
  $(".js-nav-sub-toggle").on("click", function () {
    document.querySelector("body").classList.toggle("close-sub-menu");
  });

  // ツールチップ
  $('[data-toggle="tooltip"]').tooltip();

  // コピークリップボード
  if ($(".btn-clip-board").length > 0) {
    // ツールチップ初期化
    $(".btn-clip-board").attr("data-placement", "top");
    $(".btn-clip-board").attr("title", "コピーされました！");
    // ツールチップ有効化
    $(".btn-clip-board").tooltip({
      trigger: "manual",
    });
    // ツールチップ表示
    $(".btn-clip-board").on("click", function () {
      let $this = $(this);
      $($this).tooltip("show");
      setTimeout(function () {
        $($this).tooltip("hide");
      }, 1000);
    });
    // コピー処理
    $(".btn-clip-board").on("click", function () {
      let txt = $(this).children("span").attr("data-clip");
      let $textarea = $("<textarea></textarea>");
      $textarea.text(txt);
      $(this).append($textarea);
      $textarea.select();
      document.execCommand("copy");
      $textarea.remove();
    });
  }

  // アラートアイコン
  if ($(".alert-success").length) {
    $(".alert-success").prepend('<i data-feather="smile" class="mr-2 text-success"></i>');
  }
  if ($(".alert-warning").length) {
    $(".alert-warning").prepend('<i data-feather="meh" class="mr-2 text-warning"></i>');
  }
  if ($(".alert-danger").length) {
    $(".alert-danger").prepend('<i data-feather="alert-triangle" class="mr-2 text-danger"></i>');
  }

  // webicons
  const feather = require("feather-icons");
  feather.replace({
    width: 16,
    height: 16,
  });
});
