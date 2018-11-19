<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<style>
    #header_wrap{width:1200px;height:100px;margin:20px auto;background:;position: relative;}
    #header_wrap>a{font-size:50px;padding: 10px;}
	.top_menu:after{content:"";clear: both;display: block;}
	.top_menu{position: absolute;top:15px;right:0;}
	.top_menu>li>a{padding-left: 20px;text-align:center;padding: 20px;}
	.top_menu>li{float:right;}	

	.menu{background:width:700px;right: 0;position: absolute;}
	.menu:after{content:"";clear: both;display: block;}
	.menu>li{float:right;}	
	.menu>li>a{font-size:15px;padding-right: 30px;}
	.menu>li>a:hover{color:#456888; font-weight:bold;}
	
	.lnb{background:}
	.lnb:after{content:"";clear: both;display: block;}
	.lnb>li{float:left;}
	.lnb>li>a{font-size:20px;padding-left:50px;}	
	.lnb>li>a:hover{color:#456888; font-weight:bold;}

	#recomm_book{width: 100%;height: 600px;background:blue;position: relative;}
	#prev{position: absolute;top:400px;left: 20px;}
	#next{position: absolute;top:400px;right:20px;}
    
	#bar1{width: 1920px;height:200px;}
	#bar2{width: 1920px;height:350px; margin:0 auto;}
	
	#realfooter{height: 100px;}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  #class-links{
    position: relative;
    width: 800px;
    height: 600px;
    margin: 20px auto;
  }
  #class-links a {
    position: absolute;
    display: block;
    width: 500px;
    height: 500px;
    padding: 10px;
    overflow: hidden;
  }
  #class-links img{
    width: 100%;
    height: 100%;
    transition: 1s;
  }

  #class-links a:hover img{
    transform: scale(1.2);
  }

  #class-links .coffee {
    top: 0;left: 0;
  }

  #class-links .cake {
    bottom: 0;right: 0;
  }
  #class-links p{
    position: absolute;
    padding: 40px;
    color: #fff;
    font-weight: bold;
    font-size: 40px;
    text-align: center;
    z-index: 1;
  }
  #class-links .cake p{
    bottom: 0;right: 0;
  }
	 
</style>
<script>
      $(document).ready(function(){
         $('.slider').bxSlider({
            auto:true,
            controls:false, 
            pager:false
         });
         
   

         $("#prev").on("click",function(){
            slider.goToPrevSlide();
         });
         $("#next").on("click",function(){
            slider.goToNextSlide();
         });
   
   
         });
      


		
	
</script>
<header id="header_wrap">

         <a href="<?php echo G5_URL ?>">LOGO</a>

		 <ul class="top_menu">
		 <li><a href="#">날씨</a></li>
		 <li><a href="#">흐림</a></li>
		 <li><a href="#">비</a></li>
		 <li><a href="#">장마</a></li>
		 </ul>
        
        <ul class="menu">
        <?php if ($is_member) {  ?>
      
     
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php"><i class="fa fa-cog" aria-hidden="true"></i> 정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> 로그아웃</a></li>
            <?php if ($is_admin) {  ?>
            <li class="tnb_admin"><a href="<?php echo G5_ADMIN_URL ?>"><b><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</b></a></li>
            <?php }  ?>
            <?php } else {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> 회원가입</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php"><b><i class="fa fa-sign-in" aria-hidden="true"></i> 로그인</b></a></li>
            <?php }  ?>
        </ul>

		

         <?php  include(G5_THEME_PATH.'/skin/nav/menu.php'); ?> 
          
            
        
</header>

<?php    if(defined('_INDEX_')) {     // index에서만 실행?>

    <section id="recomm_book">
    <ul class="slider">
		<li><img src="<?echo G5_THEME_IMG_URL?>/slider1.jpg" alt="a"></li>
		<li><img src="<?echo G5_THEME_IMG_URL?>/slider2.jpg" alt="a"></li>
		<li><img src="<?echo G5_THEME_IMG_URL?>/slider3.jpg" alt="a"></li>
	</ul>
    </section> 
	

<?}else{?>

    <section id="recomm_book">
    
    <!-- 현재위치 -->
    <span style="display:inline-block">
    <?php 
        $sql_menu = " select *  from ".$g5['menu_table']." 
        where me_use = '1' 
        and length(me_code) = '2' 
        order by me_order, me_id "; 
        $result_menu = sql_query($sql_menu, false); 
        


        for ($i=0; $rowMenu=sql_fetch_array($result_menu); $i++) { 
            $rowMenu_link = explode("=",$rowMenu['me_link']); 
           //echo $rowMenu_link[1];

            
      ?>      
         <a href="<?php echo $rowMenu['me_link']; ?>" target="_<?php echo $rowMenu['me_target']; ?>" style="display:none" id="menu_link<?php echo $i ?>"><?php echo $rowMenu['me_name']; ?></a>  

        <?}?>

    </span>
     >   
     <? if($bo_table){echo $board['bo_subject']; }else{echo $g5['title']; }
     ?>
     <!-- 현재위치끝 -->

    </section>

    <?}?>

    <div id="content" style="overflow:hidden">

        <?php 
        if(defined('_INDEX_')) {     // index에서만 실행
        ?>
            <div class="content" style="width:100%;">
        <?}else{?>
            <div class="content" style="width:75%;float:left">
        <?}?>
