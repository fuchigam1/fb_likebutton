<?php
/**
 * [ADMIN] Facebook LikeButton
 *
 * @copyright		Copyright 2012, materializing.
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			fb_likebutton.views
 * @version			1.0.0
 * @license			MIT
 */
?>
<script type="text/javascript">
$(function(){

	$('#FbLikebuttonConfigLayoutStyle').change(function() {
		var dataLayout = $('#FbLikebuttonConfigLayoutStyle').val();
		var dataLayoutText;
		if(dataLayout == 1) {
			dataLayoutText = 'standard';
		}
		if(dataLayout == 2) {
			dataLayoutText = 'button_count';
		}
		if(dataLayout == 3) {
			dataLayoutText = 'box_count';
		}
		$('.fb-like').attr('data-layout', dataLayoutText);
	});

});
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo $language[$this->data['FbLikebuttonConfig']['language']] ?>/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="fb-like" 
		<?php if($this->data['FbLikebuttonConfig']['page_url']) : ?>data-href="<?php echo $this->data['FbLikebuttonConfig']['page_url'] ?>" <?php endif ?>
		data-send="<?php echo $send_button[$this->data['FbLikebuttonConfig']['send_button']] ?>" 
		data-layout="<?php echo $layout_style[$this->data['FbLikebuttonConfig']['layout_style']] ?>" 
		data-width="<?php echo $this->data['FbLikebuttonConfig']['width'] ?>" 
		data-show-faces="<?php echo $show_faces[$this->data['FbLikebuttonConfig']['show_faces']] ?>" 
		data-action="<?php echo $verb_to_display[$this->data['FbLikebuttonConfig']['verb_to_display']] ?>" 
		data-colorscheme="<?php echo $color_scheme[$this->data['FbLikebuttonConfig']['color_scheme']] ?>" 
		data-font="<?php echo $font[$this->data['FbLikebuttonConfig']['font']] ?>">
	</div>
