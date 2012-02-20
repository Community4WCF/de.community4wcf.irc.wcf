<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * @author		Marco Daries
 * @copyright	2011 MaDa-Network.de
 * @website		mada-network.de
 * @package		de.community4wcf.irc.gms
 * @svn			$Id: IndexPageIRCUserOnlineListener.class.php 1742 2011-02-07 16:21:11Z TobiasH87 $
 */

class IndexPageIRCUserOnlineListener implements EventListener {
        /**
         * @see EventListener::execute()
         */
	public function execute($eventObj, $className, $eventName) {
		$datas = array();

		if(!WCF::getUser()->getPermission('user.guilded.canViewIRCUserOnline')) return;
		
		WCF::getCache()->addResource('ircUserOnline', WCF_DIR.'cache/cache.ircUserOnline.php', WCF_DIR.'lib/system/cache/CacheBuilderIRCUserOnline.class.php', 0, IRCUSERONLINE_CACHETIME);
		$datas = WCF::getCache()->get('ircUserOnline');
		
		if(count($datas) > 0) {
			WCF::getTPL()->assign(array('datas' => $datas));
			WCF::getTPL()->append('additionalBoxes', WCF::getTPL()->fetch('ircUserOnline'));
		}
	}
}
?>