<?php
/**
 * Facebook LikeButtonプラグイン表示コントローラー
 *
 * @copyright		Copyright 2012, materializing.
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			fb_likebutton.controllers
 * @version			1.0.0
 * @license			MIT
 */
class FbLikebuttonController extends AppController {
/**
 * コントローラー名
 * 
 * @var string
 * @access public
 */
	var $name = 'FbLikebutton';
/**
 * モデル
 * 
 * @var array
 * @access public
 */
	var $uses = array('Plugin', 'FbLikebutton.FbLikebuttonConfig');
/**
 * コンポーネント
 * 
 * @var array
 * @access public
 */
	var $components = array('BcAuth','Cookie','BcAuthConfigure');
/**
 * ヘルパー
 *
 * @var array
 * @access public
 */
	var $helpers = array(BC_TEXT_HELPER, BC_TIME_HELPER, BC_FORM_HELPER, 'FbLikebutton.FbLikebuttonBaser');
/**
 * サブメニューエレメント
 *
 * @var array
 * @access public
 */
	var $subMenuElements = array('fb_likebutton');
/**
 * ぱんくずナビ
 *
 * @var string
 * @access public
 */
	var $crumbs = array(
		array('name' => 'プラグイン管理', 'url' => array('plugin' => '', 'controller' => 'plugins', 'action' => 'index')),
		array('name' => 'Facebook LikeButton管理', 'url' => array('plugin' => 'fb_likebutton', 'controller' => 'fb_likebutton', 'action' => 'index'))
	);
/**
 * beforeFilter
 * 
 * @return void
 * @access public
 */
	function beforeFilter(){

		parent::beforeFilter();
		$this->BcAuth->allow('get_fb_likebutton');

	}
/**
 * Facebook LikeButton を表示する
 * 
 * @return array
 * @access public 
 */
	function get_fb_likebutton() {

		$datas = $this->FbLikebuttonConfig->findExpanded();

		// 返ってくる値をチェックして、空文字、FALSE、NULLの場合は0を入れる
		$datas['send_button'] = $this->FbLikebuttonConfig->checkEmpty($datas['send_button']);
		$datas['show_faces'] = $this->FbLikebuttonConfig->checkEmpty($datas['show_faces']);

		$send_button = $this->FbLikebuttonConfig->send_button;
		$layout_style = $this->FbLikebuttonConfig->layout_style;
		$show_faces = $this->FbLikebuttonConfig->show_faces;
		$verb_to_display = $this->FbLikebuttonConfig->verb_to_display;
		$color_scheme = $this->FbLikebuttonConfig->color_scheme;
		$font = $this->FbLikebuttonConfig->font;
		$language = $this->FbLikebuttonConfig->language;

		$datas['send_button'] = $send_button[$datas['send_button']];
		$datas['layout_style'] = $layout_style[$datas['layout_style']];
		$datas['show_faces'] = $show_faces[$datas['show_faces']];
		$datas['verb_to_display'] = $verb_to_display[$datas['verb_to_display']];
		$datas['color_scheme'] = $color_scheme[$datas['color_scheme']];
		$datas['font'] = $font[$datas['font']];
		$datas['language'] = $language[$datas['language']];

		return $datas;

	}
/**
 * Facebook LikeButtonプラグイン表示
 *
 * @return void
 * @access public
 */
	function  admin_index() {

		$datas = $this->FbLikebuttonConfig->findExpanded();

		// 返ってくる値をチェックして、空文字、FALSE、NULLの場合は0を入れる
		$datas['send_button'] = $this->FbLikebuttonConfig->checkEmpty($datas['send_button']);
		$datas['show_faces'] = $this->FbLikebuttonConfig->checkEmpty($datas['show_faces']);

		// 選択値の設定値を取得
		$this->set('send_button', $this->FbLikebuttonConfig->send_button);
		$this->set('layout_style', $this->FbLikebuttonConfig->layout_style);
		$this->set('show_faces', $this->FbLikebuttonConfig->show_faces);
		$this->set('verb_to_display', $this->FbLikebuttonConfig->verb_to_display);
		$this->set('color_scheme', $this->FbLikebuttonConfig->color_scheme);
		$this->set('font', $this->FbLikebuttonConfig->font);
		$this->set('language', $this->FbLikebuttonConfig->language);

		$this->data = array('FbLikebuttonConfig' => $datas);

		$this->pageTitle = 'Facebook LikeButtonプラグイン';

	}

}
