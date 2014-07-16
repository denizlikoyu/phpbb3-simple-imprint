<?php

/**
*
* @package phpBB Extension - Crizzo Simple Imprint
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace crizzo\simpleimprint;

class crizzo_simpleimprint_migration extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['simpleimprint_enable']);
	}

	public function update_data()
	{
		return array(
		array('config.add', array('simpleimprint_enable', 1)),
		array('custom', array(array($this, 'simpleimprint_info'))),
	);
	}

	public function simpleimprint_info()
	{
		$text_config = new \phpbb\config\db_text($this->db, $this->table_prefix . 'config_text');
		$text_config->set_array(array(
		'simpleimprint' => '',
		'simpleimprint_uid' => '',
		'simpleimprint_bitfield' => '',
		'simpleimprint_flags' => OPTION_FLAG_BBCODE + OPTION_FLAG_SMILIES + OPTION_FLAG_LINKS,
		));
	}
}