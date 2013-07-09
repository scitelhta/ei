<?php

require_once(dirname(__FILE__)."/../php/phpblog.php");	

$arts = getblogpage(0, 4, 1);
foreach($arts as $art) {
	$link="blog_{$art['id']}";
	$title=$art["title"];
	?>
	<div class="particulo">
		<a class="readmore jlink" href="./<?php print $link;?>">
			<div class="kmenu" name="ll_<?php print $link;?>"><?php print $title;?></div>
		</a>
		
	</div>
	
	<?php
}


?>

	<script type="text/javascript">
		$(".kmenu").mouseover(pmenuover);
		$(".kmenu").mouseleave(pmenuexit);
		$(".kmenu").click(pmenuclick);
		$(".jlink").click(jclick);

	</script>