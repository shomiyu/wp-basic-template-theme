import scrollTop from "./modules/scrollTop"
import setParameter from "./modules/setParameter"

jQuery(function ($) {
  $(window).on("load", function () {
    // ユーザID生成
    setParameter()

    // TOPへ戻るボタンをクリックでスムーススクロール
    scrollTop("js-goToTop", 150)
  })
})
