<?php
\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;

class PlgSystemOfflineGhsvs extends CMSPlugin
{
	protected $app;
	protected $autoloadLanguage = true;

	function onAfterRoute()
	{
    if ($this->app->isClient('site') && $this->app->get('offline')
			&& (int) Factory::getUser()->get('id') === 0)
    {
			if ($tid = (int) $this->params->get('offlineTemplateid', 0))
			{
				$this->app->input->set('templateStyle', $tid);
			}
    }
	}

/* 	public function onAfterInitialise()
	{

	if (JFactory::getApplication()->isClient('site') && JFactory::getApplication()->get('offline', 0))
	{

	$urls = array(
	'/impressum',
	'/programmierer-schnipsel/joomla/172-notfall-hack-configuration-php-auslesen',
	'/datenschutz',
	);

	if (in_array(JUri::getInstance()->getPath(), $urls))
	{
	JFactory::getApplication()->set('offline', 0);
	}
	}

	} */


}
