<?php
/**
 * Facebook LikeButton プラグイン設定モデル
 *
 * @copyright		Copyright 2012, materializing.
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			fb_likebutton.models
 * @version			1.0.0
 * @license			MIT
 */
class FbLikebuttonConfig extends AppModel {
/**
 * モデル名
 * @var string
 * @access public
 */
	var $name = 'FbLikebuttonConfig';
/**
 * プラグイン名
 * @var string
 * @access public
 */
	var $plugin = 'FbLikebutton';
/**
 * DB設定
 * @var string
 * @access public
 */
	var $useDbConfig = 'plugin';
/**
 * バリデーション
 *
 * @var array
 * @access public
 */
	var $validate = array(
			'page_url'	=> array(
				array(
					'rule'		=>	'url',
					'message'	=>	'URL形式で入力して下さい。',
					'allowEmpty'	=> true
				)
			),
			'width'		=> array(
				'rule'			=>	'numeric',
				'message'		=>	'半角数字で入力して下さい。',
				'allowEmpty'	=> true
			)
	);
/**
 * 表示設定値
 *
 * @var array
 * @access public
 */
	var $send_button = array(
		'0'		=>	'false',
		'1'		=>	'true'
	);
	var $layout_style = array(
		'1'		=>	'standard',
		'2'		=>	'button_count',
		'3'		=>	'box_count'
	);
	var $show_faces = array(
		'0'		=>	'false',
		'1'		=>	'true'
	);
	var $verb_to_display = array(
		'1'		=>	'like',
		'2'		=>	'recommend'
	);
	var $color_scheme = array(
		'1'		=>	'light',
		'2'		=>	'dark'
	);
	var $font = array(
		'0'		=>	'',
		'1'		=>	'arial',
		'2'		=>	'lucida grande',
		'3'		=>	'segoe ui',
		'4'		=>	'tahoma',
		'5'		=>	'trebuchet ms',
		'6'		=>	'verdana'
	);
	var $language = array(
		'1'		=>	'ja_JP',
		'2'		=>	'en_US'
	);
/**
 * チェックして、空文字、FALSE、NULL なら0を返す
 *
 * @param int $param
 * @return int
 */
	function checkEmpty($param) {
		if(!$param) {
			$param = 0;
		}
		return $param;
	}
/**
 * 全角文字を半角に変換して返す
 * ※ 全角数字で入力があった場合はそれを許容するため
 * 
 * @param mixed $str
 * @return string
 */
	function convertNumeric($str) {

		return mb_convert_kana($str, 'a', 'UTF-8');

	}

}
