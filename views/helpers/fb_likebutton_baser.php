<?php
/**
 * Facebook LikeButton ヘルパー
 *
 * @copyright		Copyright 2012, materializing.
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			fb_likebutton.views
 * @version			1.0.0
 * @license			MIT
 */
class FbLikebuttonBaserHelper extends AppHelper {
/**
 *
 * @return string 
 */
	function getFblikeButton() {

		$FbLikebuttonConfig = ClassRegistry::init('FbLikebutton.FbLikebuttonConfig');
		$url = '/fb_likebutton/fb_likebutton/get_fb_likebutton';
		$datas = $this->requestAction($url);

		// TODO page_url が空のときは、現在のページのURLを設定する
		if(!$datas['page_url']) {
			// $siteUrl = Configure::read('BcEnv.siteUrl');
			// $datas['page_url'] = $siteUrl . $this->here;
			$dataHref = '';
		} else {
			$dataHref = 'data-href="' .$datas['page_url'] .'" ';
		}

		$html = '<div id="fb-root"></div>';

		$html .= '
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/' .$datas['language'] .'/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));</script>';
		$html .= '
			<div class="fb-like" 
				'.$dataHref.'
				data-send="' .$datas['send_button'] .'" 
				data-layout="' .$datas['layout_style'] .'" 
				data-width="' .$datas['width'] .'" 
				data-show-faces="' .$datas['show_faces'] .'" 
				data-action="' .$datas['verb_to_display'] .'" 
				data-colorscheme="' .$datas['color_scheme'] .'" 
				data-font="' .$datas['font'] .'">
			</div>
		';

		return $html;

	}

}
