<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * @author		Marco Daries
 * @copyright	2011-2012 MaDa-Network.de
 * @website		mada-network.de
 * @package		de.community4wcf.irc.standaloneapplication
 * @svn			$Id: IndexPageIRCUserOnlineListener.class.php 1874 2012-03-01 18:03:44Z TobiasH87 $
 */

class IndexPageIRCUserOnlineListener implements EventListener {
        /**
         * @see EventListener::execute()
         */
	public function execute($eventObj, $className, $eventName) {
		$datas = array();

		if(!in_array(PACKAGE_ID, explode(',', IRCUSERONLINE_WCF_SELECT_STANDALONEAPPLICATION))) return;
		
		if(!WCF::getUser()->getPermission('canViewIRCUserOnline')) return;
		
		WCF::getCache()->addResource('ircUserOnline', WCF_DIR.'cache/cache.ircUserOnline.php', WCF_DIR.'lib/system/cache/CacheBuilderIRCUserOnline.class.php', 0, IRCUSERONLINE_CACHETIME);
		$datas = WCF::getCache()->get('ircUserOnline');
		
		if(count($datas) > 0) {
			WCF::getTPL()->assign(array('datas' => $datas));
			WCF::getTPL()->append('additionalBoxes', WCF::getTPL()->fetch('ircUserOnline'));
		}
	}
}
?>