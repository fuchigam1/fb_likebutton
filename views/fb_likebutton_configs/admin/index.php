<?php
/**
 * [ADMIN] Facebook LikeButton プラグイン設定画面
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
$(window).load(function() {
	$("#FbLikebuttonConfigPageUrl").focus();
});
</script>

<?php echo $bcForm->create('FbLikebuttonConfig', array('action' => 'index')) ?>
<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
	<tr>
		<th><?php echo $bcForm->label('FbLikebuttonConfig.page_url', 'いいね！の対象URL') ?></th>
		<td>
			<?php echo $bcForm->input('FbLikebuttonConfig.page_url', array('type' => 'text', 'size' => '66')) ?>
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpPageUrl', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
					<?php echo $bcForm->error('FbLikebuttonConfig.page_url') ?>
					<div id="helptextPageUrl" class="helptext">
						<ul>
							<li>いいね！の対象となるURLを指定します。</li>
							<li>空の場合、現在のページが対象となります。</li>
						</ul>
					</div>
		</td>
	</tr>
	<tr>
		<th>レイアウトの指定</th>
		<td>
			<?php echo $bcForm->label('FbLikebuttonConfig.layout_style', 'レイアウトのスタイル') ?>
			<?php echo $bcForm->input('FbLikebuttonConfig.layout_style', array('type' => 'select', 'options' => $layout_style)) ?>
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpLayoutStyle', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
					<?php echo $bcForm->error('FbLikebuttonConfig.layout_style') ?>
					<div id="helptextLayoutStyle" class="helptext">
						<ul>
							<li>表示のレイアウトを指定します。</li>
						</ul>
					</div>
		</td>
	</tr>
	<tr>
		<th><?php echo $bcForm->label('FbLikebuttonConfig.show_faces', '顔アイコンを表示する') ?></th>
		<td>
			<?php echo $bcForm->input('FbLikebuttonConfig.show_faces', array('type' => 'checkbox')) ?>
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpShowFaces', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
					<?php echo $bcForm->error('FbLikebuttonConfig.show_faces') ?>
					<div id="helptextShowFaces" class="helptext">
						<ul>
							<li>ボタンの下にプロフィールの写真を表示するかどうかを指定します。</li>
							<li>※ standardレイアウト時のみ有効です。</li>
						</ul>
					</div>
		</td>
	</tr>
	<tr>
		<th><?php echo $bcForm->label('FbLikebuttonConfig.send_button', '送信ボタン付きにする') ?></th>
		<td>
			<?php echo $bcForm->input('FbLikebuttonConfig.send_button', array('type' => 'checkbox')) ?>
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpSendButton', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
					<?php echo $bcForm->error('FbLikebuttonConfig.send_button') ?>
					<div id="helptextSendButton" class="helptext">
						<ul>
							<li>「送る」ボタンを同時に表示させるかどうか？を指定します。</li>
							<li>「いいね！」ボタンがすべての友達と情報を共有できるのに対し、「送る」ボタンは共有したい情報を、選択した友達のみにプライベートメッセージとして送信できます。</li>
						</ul>
					</div>
		</td>
	</tr>
	<tr>
		<th>表示サイズの指定</th>
		<td>
			<?php echo $bcForm->label('FbLikebuttonConfig.width', '表示幅') ?>
			<?php echo $bcForm->input('FbLikebuttonConfig.width', array('type' => 'text', 'size' => '8')) ?> px
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpWidth', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
					<?php echo $bcForm->error('FbLikebuttonConfig.width') ?>
					<div id="helptextWidth" class="helptext">
						<ul>
							<li>表示する幅をピクセル単位で指定します。</li>
							<li>初期表示、及び入力がない時の表示幅は292px(ピクセル)になります。</li>
						</ul>
					</div>
		</td>
	</tr>
	<tr>
		<th><?php echo $bcForm->label('FbLikebuttonConfig.color_scheme', '色の指定') ?></th>
		<td>
			<?php echo $bcForm->input('FbLikebuttonConfig.color_scheme', array('type' => 'select', 'options' => $color_scheme)) ?>
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpColorScheme', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
					<?php echo $bcForm->error('FbLikebuttonConfig.color_scheme') ?>
					<div id="helptextColorScheme" class="helptext">
						<ul>
							<li>表示する色を指定します。</li>
							<li>light：白(透明・背景色なし)、dark：黒</li>
						</ul>
					</div>
		</td>
	<tr>
		<th><?php echo $bcForm->label('FbLikebuttonConfig.verb_to_display', '表示文字の指定') ?></th>
		<td>
			<?php echo $bcForm->input('FbLikebuttonConfig.verb_to_display', array('type' => 'select', 'options' => $verb_to_display)) ?>
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpVerbToDisplay', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
					<?php echo $bcForm->error('FbLikebuttonConfig.verb_to_display') ?>
					<div id="helptextVerbToDisplay" class="helptext">
						<ul>
							<li>表示する文字（動詞）を指定します。</li>
							<li>like：いいね！、recommend：おすすめ</li>
						</ul>
					</div>
		</td>
	<tr>
		<th><?php echo $bcForm->label('FbLikebuttonConfig.font', 'フォントの指定') ?></th>
		<td>
			<?php echo $bcForm->input('FbLikebuttonConfig.font', array('type' => 'select', 'options' => $font)) ?>
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpFont', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
					<?php echo $bcForm->error('FbLikebuttonConfig.font') ?>
					<div id="helptextFont" class="helptext">
						<ul>
							<li>ボタンの表示に用いるフォントを指定します。</li>
						</ul>
					</div>
		</td>
	</tr>
	<tr>
		<th><?php echo $bcForm->label('FbLikebuttonConfig.language', '表示言語') ?></th>
		<td>
			<?php echo $bcForm->input('FbLikebuttonConfig.language', array('type' => 'select', 'options' => $language)) ?>
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpLanguage', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
					<?php echo $bcForm->error('FbLikebuttonConfig.language') ?>
					<div id="helptextLanguage" class="helptext">
						<ul>
							<li>表示する言語を指定します。</li>
							<li>「ja_JP」… 日本語</li>
							<li>「en_US」… 英語</li>
						</ul>
					</div>
		</td>
	</tr>
</table>

<div class="submit">
	<?php echo $bcForm->submit('保　存', array('div' => false, 'class' => 'btn-orange button')) ?>
</div>

<?php echo $bcForm->end() ?>

<h3>現在の表示状態</h3>

<div class="align-center">
	<div id="DataList"><?php $bcBaser->element('fb_likebutton_configs/index_list') ?></div>
</div>
