<?php
namespace GHSVS\Plugin\System\OfflineGhsvs\Extension;

\defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;

class OfflineGhsvs extends CMSPlugin
{
	protected $autoloadLanguage = true;

	function onAfterRoute()
	{
		$app = $this->getApplication();

    if ($app->isClient('site') && $app->get('offline')
			&& (int) $app->getIdentity()->id === 0)
    {
			if ($tid = (int) $this->params->get('offlineTemplateid', 0))
			{
				$this->getApplication()->input->set('templateStyle', $tid);
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
