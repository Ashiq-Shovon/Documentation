<?php if(is_array($ad)): ?>
	<a href="<?php echo $ad['link_to_click']; ?>" target="_blank" style="margin: 0px; padding: 0px; display: inline-block;">
		<img src="<?php echo base_url('uploads/ad/thumbnails/'.$ad['ad_image']); ?>" width="<?php echo $ad['horizontal']; ?>px" height="<?php echo $ad['vertical']; ?>px" alt="<?php echo $ad['title']; ?>" style="margin: 0px; padding: 0px; display: block; max-width: <?php echo $ad['horizontal']; ?>px; max-height: <?php echo $ad['vertical']; ?>px; box-shadow: 0px 0px 10px 1px #f1f1f1; margin-left: auto; margin-right: auto;">
	</a>
<?php endif; ?>