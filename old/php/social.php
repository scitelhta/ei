<?php

//$alink = "http://www.estudiantesdelinstante.net/{$link}";
$alink = str_replace("http://localhost/", "http://estudiantesdelinstante.net/", $link);;



?>

<style type="text/css">

.fb-sharebutton {
	background:url("./images/fbs.jpg");
	width:82px;
	height:18px;
}

.fb-compartir {
	position: absolute;
	left: 300px;
	width:82px;
	height:18px;
	cursor:pointer;
}

</style>

<script type="text/javascript">

function fbshareclick(e)
{
	var url = e.currentTarget.getAttribute("url");
	if (!url) return;
	

};

function sociales() {
	

	
	FB.XFBML.parse();
	
	gapi.plusone.go();
	
	twttr.widgets.load();

	
};
</script>


<div class="article_tools" >
	<div class="tooltip_outs">
		<div class="tooltip_gplus">

		<div class="g-plusone"  data-size="medium"  data-href="<?php echo $alink;?>"></div>
		</div>
		<div class="tooltip_twitter">
			<a href="http://twitter.com/share" class="twitter-share-button" data-related="estudiainstante" data-lang="es" data-size="medium" data-count="horizontal"
			data-url="<?php echo $alink;?>" data-text="<?php echo $title; ?>"
			>Twittear</a>
		</div>

		<div class="tooltip_fb">
		
			<div class="fb-like" data-href="<?php echo $alink;?>"  
						data-send="false" data-layout="button_count" data-width="50" data-show-faces="false">
			</div>
		</div>
		
		<!--div style="position:absolute !important; left:280px;top:-3px;">
		<fb:share-button  > 
			<meta name="title" content="<?php echo $title; ?>" /> 
			<link rel="target_url" href="<?php echo $alink; ?>" />
		</fb:share-button>
		</div>
		<div style="position:absolute !important; left:350px;top:0px;" class="fb-send" data-href="<?php print $alink ?>"></div-->

	</div>
</div>

<div class="fb-comments" data-href="<?php print $alink ?>" data-num-posts="2" data-width="750"></div>


<?php
if ((!isset($isblog)) || (!$isblog)):
?>

<script type="text/javascript">

sociales();	

</script>

<?php
endif;
?>
