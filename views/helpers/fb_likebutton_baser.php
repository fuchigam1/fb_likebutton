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
 * facebook LikeButton を表示する
 * 
 * @param array $options
 * @return string 
 */
	function getFblikeButton($options = array()) {

		$options = array_merge(
			array('permaLink' => true), $options
		);

		$FbLikebuttonConfig = ClassRegistry::init('FbLikebutton.FbLikebuttonConfig');
		$url = '/fb_likebutton/fb_likebutton/get_fb_likebutton';
		$datas = $this->requestAction($url);

		// options 指定で url => false の場合は、URL設定がなされていても空にする
		if(!$datas['page_url']) {
			// $siteUrl = Configure::read('BcEnv.siteUrl');
			// $datas['page_url'] = $siteUrl . $this->here;
			$dataHref = '';
		} else {
			$dataHref = 'data-href="' .$datas['page_url'] .'" ';
		}

		// [options]
		// page_url が空のときは、現在のページのURLを設定する
		if(!$options['permaLink']) {
			$dataHref = '';
		}

		// TODO font が空の際は表示させない
		// 行末の半角スペースは省く
		if(!$datas['font']) {
			$dataFont = '';
		} else {
			$dataFont = ' "data-font="' .$datas['font'] .'"';
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
		$html .= '<div class="fb-like" '.$dataHref.
				'data-send="' .$datas['send_button'] .
				'" data-layout="' .$datas['layout_style'] .
				'" data-width="' .$datas['width'] .
				'" data-show-faces="' .$datas['show_faces'] .
				'" data-action="' .$datas['verb_to_display'] .
				'" data-colorscheme="' .$datas['color_scheme'] .$dataFont.'"></div>';

		return $html;

	}

}
