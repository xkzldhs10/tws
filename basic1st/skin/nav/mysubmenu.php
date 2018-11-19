﻿<script type="text/javascript"> 
function display_submenu(num) { 
    document.getElementById("mysub"+num).style.display="block"; 
    document.getElementById("menu_link"+num).style.display="block"; 
} 
</script> 

<style TYPE="text/css"> 
#mysubmenu {margin:0px 0 0 0;} 
#mysubmenu ul {list-style:none; margin:0; padding:0;} 
#mysubmenu li { margin: 0; list-style: none;} 
#mysubmenu .leftmenu_b {line-height:30px; margin-bottom:0px; background-color:#E7EDF1; border-bottom:0.5px solid #dddddd; text-align:center; font-size:15px; font-weight:bold;} 
#mysubmenu .leftmenu_s {line-height:30px; margin-bottom:0px; padding-left:20px; background-color:#ffffff; border-bottom:0.5px solid #e6e6e6;} 
#mysubmenu a {text-decoration:none; display:block;} 
#mysubmenu a:hover {color:blue;} 
</style> 

<script> 
// 지우지 말아주세요. 새창 등에서도 사용합니다. 
// $(document).ready(function() { 
//     $("#mysubmenu a").on("click", function(e){ //링크 클릭시 
//         var $data_midtxt = $(this).attr("data-midtxt"); 
//         if( $data_midtxt ){ 
//             $.cookie('sub_midtxt', $data_midtxt, { path: '/' }); 
//         } else { 
//             $.cookie('sub_midtxt', null, { path: '/' }); 
//         } 
//     }); 
// }); 
</script> 

<div id="mysubmenu"> 
<?php 
    $sql = " select *  from ".$g5['menu_table']." 
    where me_use = '1' 
    and length(me_code) = '2' 
    order by me_order, me_id "; 
    $result = sql_query($sql, false); 
    $gnb_zindex = 999; // gnb_1dli z-index 값 설정용 

    for ($i=0; $row=sql_fetch_array($result); $i++) { 
        ?> 
        <ul id="mysub<?php echo $i ?>" style="display:none;"> 
            <li class="leftmenu_b"> <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name']; ?></a></li> 
        
            <?php 
            $sql2 = " select * from ".$g5['menu_table']." 
            where me_use = '1' 
            and length(me_code) = '4' 
            and substring(me_code, 1, 2) = '".$row['me_code']."' 
            order by me_order, me_id "; 
            $result2 = sql_query($sql2); 
            
            //좌측 서브메뉴 전체 리스트에서 현재 페이지에 해당하는 대메뉴 리스트만 보여줌 
            if ( ($row['me_name']==$board['bo_subject'])||($row['me_name']==$g5['title']) ) { 
            //if(strpos($row['me_link'], $_GET['bo_table']) !== false) { 
                echo ("<script language='javascript'> display_submenu(" .$i. " ); </script> "); 
            } 
            
            for ($k=0; $row2=sql_fetch_array($result2); $k++) { 
                if($k == 0) { 
                    echo '<ul>'.PHP_EOL; 
                } 
                ?> 
                <li class="leftmenu_s"<?php 
                    if ($row2['me_link']) { 
                        $me_link0 = explode("=",$row2['me_link']); 
                        if ( ($me_link0[1]==$board['bo_table'])||($me_link0[1]==$co_id) ) { 
                        //if(strpos($row2['me_link'], $_GET['bo_table']) !== false) { 
                            echo " style='background-color:#eff3ff;'"; 
                        } 
                    } else {    
                        if ( ($row2['me_name']==$board['bo_subject'])||($row2['me_name']==$g5['title']) ) { 
                        //if ( strpos($row2['me_link'], $_GET['bo_table']) !== false ) { 
                            echo " style='background-color:#eff3ff;'"; 
                        } 
                    } 
                    ?>><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name']; ?></a> 
                </li> 
                <?php 
        
                //좌측 서브메뉴 전체 리스트에서 현재 페이지에 해당하는 대메뉴 리스트만 보여줌 
                if ($row2['me_link']) { 
                    $me_link0 = explode("=",$row2['me_link']); 
                    if ( ($me_link0[1]==$board['bo_table'])||($me_link0[1]==$co_id) ) { 
                     //   echo $i;
                    //if(strpos($row2['me_link'], $_GET['bo_table']) !== false) { 
                        echo ("<script language='javascript'> display_submenu(" .$i. " ); </script> "); 
                    } 
                } else {    
                    if ( ($row2['me_name']==$board['bo_subject'])||($row2['me_name']==$g5['title']) ) { 
                    //if(strpos($row2['me_link'], $_GET['bo_table']) !== false) { 
                        echo ("<script language='javascript'> display_submenu(" .$i. " ); </script> "); 
                    } 
                } 
            } 
            
            if($k > 0) { 
                echo '</ul>'.PHP_EOL; 
            } 
            ?> 
        </ul> 
        <?php 
    } 
    ?> 
</div>