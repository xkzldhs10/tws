

    </div>

    







    <? if(!defined('_INDEX_')) {?>
    <div id="aside"  style="width:20%;float:left">
       <?php  include(G5_THEME_PATH.'/skin/nav/mysubmenu.php'); ?> 
    </div>
    <?}?>
</div>

<!-- } 콘텐츠 끝 -->

<hr>

<footer id="realfooter">
이곳은,,, 푸터입니다..
</footer>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>