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
    if ($this->app->isClient('site') && $this->$app->get('offline'))
    {
			if ($tid = (int) $this->params->get('offlineTemplateid', 0))
			{
				$this->app->input->set('templateStyle', $tid);
			}
    }
	}
}
