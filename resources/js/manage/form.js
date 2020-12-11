$(function () {
  // クーポンの種類
  $('[name="coupon_genre"]').on("change", function () {
    if ($(this).val() == "discount") {
      $(".js-coupongenre-symbol").text("￥");
      $(".js-coupongenre-text").text("引き");
    } else if ($(this).val() == "off") {
      $(".js-coupongenre-symbol").text("");
      $(".js-coupongenre-text").text("%OFF");
    }
  });

  // クーポン選択
  // 有効
  $(".input-toggle-switch--hideshow").on("change", function () {
    let toggle_selector = $(this).attr("data-toggle");
    if ($(this).prop("checked") == true) {
      $(toggle_selector).fadeIn();
    } else {
      $(toggle_selector).fadeOut();
    }
  });
  // 選択
  $("#coupon_select_item").on("change", function () {
    if ($(this).val() != null && $(this).val() != "") {
      $("#coupon_select_code").fadeIn();
      $("#coupon_select_code .btn-clip-board span").text($(this).val());
      $("#coupon_select_code .btn-clip-board span").attr("data-clip", $(this).val());
    } else {
      $("#coupon_select_code").fadeOut();
      $("#coupon_select_code .btn-clip-board span").text("");
      $("#coupon_select_code .btn-clip-board span").attr("data-clip", "");
    }
  });

  // クーポンコードの自動生成<TODO:バックエンドで制御>
  $("#auto_coupon_code").on("click", function () {
    $("#code_code").val(get_unique_str(10));
  });

  // メール送信予約
  $("#send_reserve_flag").on("change", function () {
    if ($(this).prop("checked") == true) {
      $("#action_name").text("保存");
    } else {
      $("#action_name").text("送信");
    }
  });
});

function get_unique_str(len) {
  let l = len;
  let c = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  let cl = c.length;
  let r = "";
  for (let i = 0; i < l; i++) {
    r += c[Math.floor(Math.random() * cl)];
  }
  return r;
}
