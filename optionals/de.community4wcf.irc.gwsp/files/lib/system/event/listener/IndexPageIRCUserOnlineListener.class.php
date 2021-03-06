<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * @author		Marco Daries
 * @copyright	2011-2012 MaDa-Network.de
 * @website		mada-network.de
 * @package		de.community4wcf.irc.gwsp
 * @svn			$Id: IndexPageIRCUserOnlineListener.class.php 1878 2012-03-01 20:47:59Z TobiasH87 $
 */

class IndexPageIRCUserOnlineListener implements EventListener {
        /**
         * @see EventListener::execute()
         */
	public function execute($eventObj, $className, $eventName) {
		$datas = array();

		if(!WCF::getUser()->getPermission('user.gewinnspiel.canViewIRCUserOnline')) return;
		
		WCF::getCache()->addResource('ircUserOnline', WCF_DIR.'cache/cache.ircUserOnline.php', WCF_DIR.'lib/system/cache/CacheBuilderIRCUserOnline.class.php', 0, IRCUSERONLINE_CACHETIME);
		$datas = WCF::getCache()->get('ircUserOnline');
		
		if(count($datas) > 0) {
			WCF::getTPL()->assign(array('datas' => $datas));
			WCF::getTPL()->append('additionalBoxes', WCF::getTPL()->fetch('ircUserOnline'));
		}
	}
}
?>