import setParameter from "./modules/setParameter"

jQuery(function ($) {
  $(window).on("load", function () {
    // ユーザID生成
    setParameter()
  })
})
