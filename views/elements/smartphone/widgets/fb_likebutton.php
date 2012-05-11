<?php
/**
 * [PUBLISH][SMARTPHONE] Facebook LikeButton ウィジェット
 *
 * @copyright		Copyright 2012, materializing.
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			fb_likebutton.views
 * @version			1.0.0
 * @license			MIT
 */
$url = '/fb_likebutton/fb_likebutton/get_fb_likebutton';
$datas = $this->requestAction($url);
?>
<div class="widget widget-fb_likebutton widget-fb_likebutton-<?php echo $id ?>">
<?php if($name && $use_title): ?>
<h2><?php echo $name ?></h2>
<?php endif ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo $datas['language'] ?>/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="fb-like"
		<?php if($datas['page_url']) : ?> data-href="<?php echo $datas['page_url'] ?>"<?php endif ?> 
		data-send="<?php echo $datas['send_button'] ?>" 
		data-layout="<?php echo $datas['layout_style'] ?>" 
		data-width="<?php echo $datas['width'] ?>" 
		data-show-faces="<?php echo $datas['show_faces'] ?>" 
		data-action="<?php echo $datas['verb_to_display'] ?>" 
		data-colorscheme="<?php echo $datas['color_scheme'] ?>"
		<?php if($datas['font']) : ?> data-font="<?php echo $datas['font'] ?>"<?php endif ?>>
	</div>
</div>
