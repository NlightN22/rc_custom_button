<?php
/**
 * Cloud Button
 *
 * Plugin to add button to open cloud storage.
 *
 * @date 2017-03-14
 * @version 0.1
 * @author Alexander Pushkin
 * @url https://github.com/san4op/roundcube_cloud_button
 * @licence GNU GPLv3
 */

class cloud_button extends rcube_plugin
{
	private $title;
	private $url;

	function init()
	{
		$rcmail = rcube::get_instance();

		$this->title = $rcmail->config->get('cloud_button_title', 'cloud_button.cloud');
		$this->url = $rcmail->config->get('cloud_button_url', '');

		if (!$this->url) {
			return;
		}

		$this->add_texts('localization/', true);
		$this->include_stylesheet($this->local_skin_path() . '/cloud_button.css');

		$this->add_button(array(
			'href' => $this->url,
			'class'   => 'button-cloud',
			'classsel' => 'button-cloud button-selected',
			'innerclass' => 'button-inner',
			'label'   => $this->title,
		), 'taskbar');
	}

}

?>