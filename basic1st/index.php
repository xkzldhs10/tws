<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>


<div id="bar1">
<img src="<?echo G5_THEME_IMG_URL?>/bar1.jpg" alt="bar1">
</div>

<div id="class-links">
    <a href="#" class="coffee">
      <p>THE COFFEE<br>TEACHING<br>CLASS</p>
     <img src="<?echo G5_THEME_IMG_URL?>/bg1.png" alt="bg1">
    </a>
    <a href="#" class="cake">
      <p>THE CAKE<br>TEACHING<br>CLASS</p>
    <img src="<?echo G5_THEME_IMG_URL?>/bg2.png" alt="bg2">
    </a>
  </div>

<div id="bar2">

<img src="<?echo G5_THEME_IMG_URL?>/bar2.jpg" alt="bar2">
</div>

<div class="latest_wr">
    <!--  사진 최신글2 { -->
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
 
    ?>
    <!-- } 사진 최신글2 끝 -->
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>