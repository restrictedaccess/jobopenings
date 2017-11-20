<!--
<div align="center" id="vid" style="margin-top:0px;">
<p><a href="/seminar/seminar.php"><img src="/images/book_seminar_btn.jpg" border="0" /></a></p>
</div>
-->
<div id="vid">
<img src="images/it-vid.jpg" border="0" style="padding-bottom:10px; cursor:pointer" onClick="popup_win('remotestaff_presentation.php', 860, 330)"/>
<p><strong>Remote Staff </strong>Presentation</p>
</div> <!-- End of Vid 2 -->

<a href="/jobopenings.php"><img src="images/icon-latest-job.jpg" /></a>

<div id="staffclass">
<table width="100%" cellpadding="0" cellspacing="0">

<?php
//parse all advertisement category
//jr_cat_id, cat_name
$script_file_name = "jobopenings.php";
$sql = $db->select()
	->from('job_category')
    ->where("status=?","posted");
$categories = $db->fetchAll($sql);	
foreach($categories as $category){

if($_GET['category_id'] == $category['category_id']){
	$display = "none";
}else{
	$display = "none";
}
?>
<tr id="tr_<?php echo $category['category_id'];?>" style="background:url(images/avail-staff-left-title-expanded-new.png);">
<td height="40" align="right" style="padding-right:5px;color:#FFFFFF; font-weight:bold; cursor:pointer;" onclick="MinMax(<?php echo $category['category_id'];?>)"><?php echo $category['category_name'];?></td>
</tr>

<tr><td align="right" style="padding-right:5px;">
<div id="tr_sub_<?php echo $category['category_id'];?>" style="display:<?php echo $display;?>">
    <ul>
    <?php
  $get_sub_categories_sql = $db -> select()
                              -> from(array('p'=>'posting'),array('p.sub_category_id'))
                              -> joinLeft(array('jsc'=>'job_sub_category'), 'p.sub_category_id = jsc.sub_category_id', array('jsc.sub_category_id AS sub_category_id', 'jsc.sub_category_name'))
                              -> where('jsc.category_id=?', $category['category_id'])
                              -> group('jsc.sub_category_id');
    $get_sub_categories = $db -> fetchAll($get_sub_categories_sql);
    $counter =0;
    foreach($get_sub_categories as $get_sub_category){
    $counter++;
    ?>
    <li><a href="<?php echo $script_file_name."?category_id=".$category['category_id']."&sub_category_id=".$get_sub_category['sub_category_id'];?>"><?php echo $get_sub_category['sub_category_name'];?></a></li>
    <?php } ?>
</ul>
</div>  
</td></tr>

<?php }//$hash_code = chr(rand(ord("a"), ord("z"))) . substr( md5( uniqid( microtime()) . $_SERVER[ 'REMOTE_ADDR' ] . $_GET['jr_cat_id'] ), 2, 17 );?>
</table>
</div>

  <!--<a href="adhocstaffing.php"><img src="images/btn-adhocstaffing.jpg" border="0" /></a><br />&nbsp;-->
  
<div id="sep">
<a href="javascript:popup_win8('webchat.php?hash=<?php echo $hash_code; ?>',700,600);"><img src="images/icon-livechat.jpg" width="170" height="60" border="0" /></a><br /><br />
</div>
<div align="center">
<img src="images/mb_52712.jpg" alt="" border="0"/><br />
<strong style="font-size:12px; font:Arial, Helvetica, sans-serif">As posted in Manila Bulletin<br />May 27, 2012</strong>
</div>
