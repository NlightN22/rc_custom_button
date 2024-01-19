<?php

class custom_button extends rcube_plugin
{
	private $url;
	private $target;
	private $label;

	function init()
	{
		$this->load_config();
		$this->url = rcube::get_instance()->config->get('custom_button_url', '');
		$this->target = rcube::get_instance()->config->get('custom_button_target', '');
		$this->label = rcube::get_instance()->config->get('custom_button_label', '');

		if (!$this->url) {
			return;
		}

		$this->include_stylesheet($this->local_skin_path() . '/custom_button.css');

		$this->add_button(array(
			'type'       => 'link',
			'content'    => $this->label,
			'href'       => $this->url,
			'target'     => $this->target,
			'class'      => 'button-custom',
			'classsel'   => 'button-custom button-selected',
			'innerclass' => 'button-inner'
		), 'taskbar');
	}
}

?>