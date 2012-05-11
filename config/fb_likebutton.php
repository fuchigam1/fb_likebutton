<?php
/**
 * [ADMIN] Facebook LikeButton
 *
 * @copyright		Copyright 2012, materializing.
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			fb_likebutton.config
 * @version			1.0.0
 * @license			MIT
 */
/**
 * システムナビ
 */
$config['BcApp.adminNavi.fb_likebutton'] = array(
		'name'		=> 'facebook LikeButton プラグイン',
		'contents'	=> array(
			array('name' => '表示設定', 
				'url' => array('admin' => true, 'plugin' => 'fb_likebutton', 'controller' => 'fb_likebutton_configs', 'action' => 'index')),
			array('name' => '表示確認', 
				'url' => array('admin' => true, 'plugin' => 'fb_likebutton', 'controller' => 'fb_likebutton', 'action' => 'index'))
	)
);
