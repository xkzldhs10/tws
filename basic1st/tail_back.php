

    </div>

    <?
$co_id = "company";

    $menuNum = "2";

    $menuNum2 = "1";
    ?>
<style>
    
#snb{width:100%; margin-top:-50px;}
    #snb {width:100%;}
    #snb > li.snb{width:100%;display:none;}
    #snb > li.snb.active{display:block !important;}
    #snb > li > h2{width:100%;background:#59b4e9;}
    #snb > li > h2 a{display:block;background:#407CA1; text-align:center; padding:40px 10px; color:#fff;}
    #snb > li > h2 a b{display:block;font-size:18px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
    #snb > li > h2 a sub{display:block;padding-top:10px;font-family:vardana;font-size:12px;letter-spacing:0.05em;font-weight:normal;filter:Alpha(opacity=50); opacity:0.5; -moz-opacity:0.5;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
    #snb > li .snb2dDown{display:none;}

    #snb > li > ul{}
    #snb > li > ul > li{border-bottom: 1px solid #ddd;}
    #snb > li > ul > li a{display:block;padding:15px;color:#666;-webkit-transition-duration: 0.2s;-webkit-transition-timing-function: ease;transition-duration: 0.2s;transition-timing-function: ease;}
    #snb > li > ul > li a b{font-size:13px;}
    #snb > li > ul > li a:hover{background:#f3f3f3;padding-left:20px;color:#000;-webkit-transition-duration: 0.2s;-webkit-transition-timing-function: ease;transition-duration: 0.2s;transition-timing-function: ease;}
    #snb > li > ul > li.snb2d.active a{background:#ddd;color:#000;}
    #snb > li > ul > li a{overflow:hidden;}
    #snb > li > ul > li a i{float:right;}
</style>
<script>
    $(document).ready(function(){
        $('#snb > li:nth-child(<?php echo $menuNum; ?>)').addClass("co_id<?php echo $co_id; ?> active");$('#snb > li:nth-child(<?php echo $menuNum; ?>) > ul > li:nth-child(<?php echo $menuNum2; ?>)').addClass("snb2d_co_id<?php echo $co_id; ?>  active");});</script>






    <? if(!defined('_INDEX_')) {?>
    <div id="aside"  style="width:20%;float:left">
       <!-- SNB // -->
        <?php /* 주의사항 아래 코드를 수정하시면 페이지 현재위치 및 서브메뉴,모바일메뉴가 정상작동되지 않을 수 있습니다. */ ?>
        <ul id="snb">
        <?php 
        $sql = " select * from {$g5['menu_table']} where me_use = '1' and length(me_code) = '2' order by me_order, me_id "; 
        $result = sql_query($sql, false); 
        for ($i=0; $row=sql_fetch_array($result); $i++) {
            $gnbM = explode("?",$row[me_link]); 
            $gnbM_kind_id = explode("=",$gnbM[1]); $gnbM_kind = $gnbM_kind_id[0]; 
            $gnbM_idA = $gnbM_kind_id[1]; $gnbM_lt = explode("&",$gnbM_idA); 
            $gnbM_id = $gnbM_lt[0]; 
            $gnbM_idL = $gnbM_kind_id[2]; 
        ?>
            <li class="snb <?php echo $gnbM_kind; ?>
                <?php echo $gnbM_id; ?><?php echo $gnbM_idL; ?> 
            <?php 
            $sql2 = " select * from {$g5['menu_table']} where me_use = '1' and length(me_code) = '4' and substring(me_code, 1, 2) = '{$row['me_code']}' order by me_order, me_id "; 
            $result2 = sql_query($sql2); 
            for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                $gnbM2 = explode("?",$row2[me_link]); 
                $gnbM_kind_id2 = explode("=",$gnbM2[1]); 
                $gnbM_kind2 = $gnbM_kind_id2[0]; 
                $gnbM_idA2 = $gnbM_kind_id2[1]; 
                $gnbM_lt2 = explode("&",$gnbM_idA2);
                $gnbM_id2 = $gnbM_lt2[0];
                $gnbM_idL2 = $gnbM_kind_id2[2]; if($k == 0)  echo ' ';
                echo $gnbM_kind2;
                echo $gnbM_id2; 
                echo $gnbM_idL2; echo ' ';}?>">
                
                <h2>
                    <a href="<?php echo G5_URL ?>/<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>">
                    <b><?php echo $row['me_name'] ?></b> 
                    </a>
                </h2>
                <?php 
                $sql2 = " select * from {$g5['menu_table']} where me_use = '1' and length(me_code) = '4' and substring(me_code, 1, 2) = '{$row['me_code']}' order by me_order, me_id "; 
                $result2 = sql_query($sql2); 
                for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                    $gnbM2 = explode("?",$row2[me_link]); 
                    $gnbM_kind_id2 = explode("=",$gnbM2[1]); 
                    $gnbM_kind2 = $gnbM_kind_id2[0]; 
                    $gnbM_idA2 = $gnbM_kind_id2[1]; 
                    $gnbM_lt2 = explode("&",$gnbM_idA2);
                    $gnbM_id2 = $gnbM_lt2[0];
                    $gnbM_idL2 = $gnbM_kind_id2[2]; 
                    if($k == 0) echo '<em class="snb2dDown"><i class="fa fa-angle-down"></i><u class="fa fa-angle-up"></u></em><ul class="snb2dul">'; ?>

                    <li class="snb2d snb2d_<?php echo $gnbM_kind2; ?>
                        <?php echo $gnbM_id2; ?><?php echo $gnbM_idL2; ?>">
                        <a href="<?php echo G5_URL ?>/<?php echo $cube_link ; ?>
                        <?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" >
                        <b><i class="fa fa-angle-right"></i> 

                         <?php echo $row2['me_name'] ?></b></a></li>

                        <?php } if($k > 0) echo '</ul>'; ?>
                    </li><?php } ?>
                    <li class="snb noInfoPageTit"></li>

                </ul>
        <!-- // SNB -->
    </div>
    <?}?>
</div>

<!-- } 콘텐츠 끝 -->

<hr>
<script>$(function() { /* 모바일용 메뉴바 */ var articleMgnb = $("#snb li.snb"); articleMgnb.addClass("hide"); $("#snb li.active").removeClass("hide").addClass("show"); $("#snb li.active .snb2dul").show(); $(".snb2dDown").click(function(){ var myArticle = $(this).parents("#snb li.snb"); if(myArticle.hasClass("hide")){ articleMgnb.addClass("hide").removeClass("show"); articleMgnb.find(".snb2dul").slideUp("fast"); myArticle.removeClass("hide").addClass("show"); myArticle.find(".snb2dul").slideDown("fast"); } else { myArticle.removeClass("show").addClass("hide");myArticle.find(".snb2dul").slideUp("fast"); } }); });</script>
<!-- 하단 시작 { -->
<footer id="realfooter">
footer 
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