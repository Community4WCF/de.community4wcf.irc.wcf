<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * Add additionalBoxes
 * 
 * @svn			$Id: IndexPageadditionalBoxesListener.class.php 1878 2012-03-01 20:47:59Z TobiasH87 $
 * @package		com.woltlab.community.gwsp.index.additionalBoxes
 */
class IndexPageadditionalBoxesListener implements EventListener
{
	/**
	 * @see		EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName)
	{
		// show
		WCF::getTPL()->append('additionalGWSPBoxes', WCF::getTPL()->fetch('indexPageadditionalBoxes'));
	}        
}
?>