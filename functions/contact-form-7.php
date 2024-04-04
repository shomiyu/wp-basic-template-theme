<?php
//----------------------------------------------------
// Contact Form 7
// 自動挿入のpタグとbrタグを削除
//----------------------------------------------------

add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}
