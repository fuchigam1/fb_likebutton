<?php
/**
 * Facebook LikeButtonプラグイン設定コントローラー
 *
 * @copyright		Copyright 2012, materializing.
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			fb_likebutton.controllers
 * @version			1.0.0
 * @license			MIT
 */
class FbLikebuttonConfigsController extends AppController {
/**
 * コントローラー名
 * 
 * @var string
 * @access public
 */
	var $name = 'FbLikebuttonConfigs';
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
 * @var     array
 * @access  public
 */
	var $components = array('BcAuth','Cookie','BcAuthConfigure');
/**
 * ヘルパー
 * 
 * @var array
 * @access public
 */
	var $helpers = array(BC_FORM_HELPER);
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
		array('name' => 'Facebook LikeButton管理', 'url' => array('plugin' => 'fb_likebutton', 'controller' => 'fb_likebutton_configs', 'action' => 'index'))
	);
/**
 * beforeFilter
 * 
 * @return void
 * @access public
 */
	function beforeFilter(){
		
		parent::beforeFilter();

	}
/**
 * Facebook LikeButtonプラグイン設定
 * 
 * @return void
 * @access public
 */
	function admin_index() {

		if(!$this->data) {

			$datas = $this->FbLikebuttonConfig->findExpanded();

			// 返ってくる値をチェックして、空文字、FALSE、NULLの場合は0を入れる
			$datas['send_button'] = $this->FbLikebuttonConfig->checkEmpty($datas['send_button']);
			$datas['show_faces'] = $this->FbLikebuttonConfig->checkEmpty($datas['show_faces']);

			$this->data = array('FbLikebuttonConfig' => $datas);

		} else {

			if($this->data['FbLikebuttonConfig']['width']) {
				$this->data['FbLikebuttonConfig']['width'] = $this->FbLikebuttonConfig->convertNumeric($this->data['FbLikebuttonConfig']['width']);
			}

			$this->FbLikebuttonConfig->set($this->data);
			if($this->FbLikebuttonConfig->validates()) {

				if($this->FbLikebuttonConfig->saveKeyValue($this->data)) {

					$this->Session->setFlash('保存しました。');
					$this->redirect(array('action' => 'index'));

				} else {

					$this->Session->setFlash('保存に失敗しました。');
					$this->redirect(array('action' => 'index'));
					
				}

			} else {

				$this->Session->setFlash('入力値にエラーがあります。');

			}
			
		}

		// 選択値の設定値を取得
		$this->set('send_button', $this->FbLikebuttonConfig->send_button);
		$this->set('layout_style', $this->FbLikebuttonConfig->layout_style);
		$this->set('show_faces', $this->FbLikebuttonConfig->show_faces);
		$this->set('verb_to_display', $this->FbLikebuttonConfig->verb_to_display);
		$this->set('color_scheme', $this->FbLikebuttonConfig->color_scheme);
		$this->set('font', $this->FbLikebuttonConfig->font);
		$this->set('language', $this->FbLikebuttonConfig->language);

		$this->pageTitle = 'Facebook LikeButtonプラグイン設定';
		$this->help = 'fb_likebutton_configs_index';
	}

}
