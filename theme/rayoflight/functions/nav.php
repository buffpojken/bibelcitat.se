<?php
function custom_nav_btn_links($search=0, $page_num)
{
	$pageURL = 'http://';
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	if ($search == "") {
	$pos = strpos($pageURL,"/page/");
	$len = strlen($pageURL);
		if($pos > 0) {
			$pos = strpos($pageURL,"/page/");
			$pageURL = substr($pageURL, 0, $pos);
			return htmlentities($pageURL."/page/".$page_num);
		}
		if (substr($pageURL,$len-1) == "/") return htmlentities($pageURL."page/".$page_num);
		else return htmlentities($pageURL."/page/".$page_num);
	}
	else {
		$pos = strpos($pageURL,"&paged=");
		$len = strlen($pageURL);
		if($pos > 0) {
			$pos = strpos($pageURL,"&paged=");
			$pageURL = substr($pageURL, 0, $pos);
			return htmlentities($pageURL."&paged=".$page_num);
		}
		if (substr($pageURL,$len-1) == "/") return htmlentities($pageURL."&paged=".$page_num);
		else return htmlentities($pageURL."&paged=".$page_num);
	}
}


function customized_nav_btns($page_num,$max_num_pages,$search=0)
{
	if($page_num == ''){$page_num = '1';}
	if($max_num_pages > 1 ){
		?>
		<div class="list-footer">
			<a class="btn-1 btn-align-left btn-previous<?php if($page_num == $max_num_pages) echo "-disabled"; ?>" href="<?php if ($page_num < $max_num_pages OR $page_num == 1) {$new_page = $page_num + 1;} else {$new_page = $page_num;} echo custom_nav_btn_links($search, $new_page);?>
"><i>&nbsp;</i><b><span><?php printf (__('Previous posts','rayoflight'));?></span></b><u>&nbsp;</u></a>

			<a class="btn-1 btn-align-right btn-next<?php if($page_num == 1) echo "-disabled"; ?>" href="<?php if ($page_num > 1) { $new_page = $page_num - 1;} else {$new_page = 1;} echo custom_nav_btn_links($search, $new_page); ?>"><i>&nbsp;</i><b><span><?php printf (__('Next posts','rayoflight'));?></span></b><u>&nbsp;</u></a>
		</div>
		<?php
	}
}

function gallery_nav_btns($page_num,$max_num_pages,$search=0)
{
	if($page_num == '' && $page_num == 0){$page_num = '1';}
	if($max_num_pages > 1 ){
		?>
			<table>
				<tr>
					<td> 
						<a class="prev" href="<?php if ($page_num > 1) { $new_page = $page_num - 1;} else {$new_page = 1;} echo custom_nav_btn_links($search, $new_page); ?>">&laquo; <?php printf (__('Previous','rayoflight'));?></a>
						<?php
							if($page_num < 4 OR $max_num_pages < 8) {
								$start = 1;
								if($max_num_pages >= 7 ) {$end = 7;}
								else $end = $max_num_pages;
							}
							else {
								if($page_num + 3 > $max_num_pages) {
									$end = $max_num_pages;
									$start = $end - 7;
								}
								else {
									$start = $page_num - 3;
									$end = $page_num + 3;
								}
							}
							
							for($i = $start; $i <= $end; $i++)
							{
								?><a <?php if($i == $page_num) {?> class="active" <?php } ?> href="<?php echo custom_nav_btn_links($search, $i); ?>"><?php echo $i;?></a><?php
							}	
						?>
						<a class="next" href="<?php if ($page_num < $max_num_pages) {$new_page = $page_num + 1;} else {$new_page = $page_num;} echo custom_nav_btn_links($search, $new_page);?>"><?php printf (__('Next','rayoflight'));?> &raquo;</a>
					</td>
				</tr>
			</table>
		<?php
	}
}
?>