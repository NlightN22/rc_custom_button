<?php
/**
 * Roundcube Plugin Cloud Button
 * Plugin to add button in taskbar to open cloud storage.
 *
 * @version 1.0.1
 * @author Alexander Pushkin <san4op@icloud.com>
 * @copyright Copyright (c) 2017, Alexander Pushkin
 * @link https://github.com/san4op/roundcube_cloud_button
 * @license GNU General Public License, version 3
 */

class cloud_button extends rcube_plugin
{
	private $url;

	function init()
	{
		$this->load_config();
		$this->url = rcube::get_instance()->config->get('cloud_button_url', '');

		if (!$this->url) {
			return;
		}

		$this->include_stylesheet($this->local_skin_path() . '/cloud_button.css');
		$this->add_texts('localization/');

		$this->add_button(array(
			'label'      => 'cloud_button.cloud',
			'href'       => $this->url,
			'target'     => '_blank',
			'class'      => 'button-cloud',
			'classsel'   => 'button-cloud button-selected',
			'innerclass' => 'button-inner'
		), 'taskbar');
	}
}

?>