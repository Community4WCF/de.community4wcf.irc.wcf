<?php
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * @author		Marco Daries
 * @copyright	2011 MaDa-Network.de
 * @website		mada-network.de
 * @package		de.community4wcf.irc.wbb
 */

class IndexPageIRCUserOnlineListener implements EventListener {
        /**
         * @see EventListener::execute()
         */
	public function execute($eventObj, $className, $eventName) {
		$datas = array();

		if(!WCF::getUser()->getPermission('user.board.canViewIRCUserOnline')) return;
		
		WCF::getCache()->addResource('ircUserOnline', WCF_DIR.'cache/cache.ircUserOnline.php', WCF_DIR.'lib/system/cache/CacheBuilderIRCUserOnline.class.php', 0, IRCUSERONLINE_CACHETIME);
		$datas = WCF::getCache()->get('ircUserOnline');
		
		if(count($datas) > 0) {
			WCF::getTPL()->assign(array('datas' => $datas));
			WCF::getTPL()->append('additionalBoxes', WCF::getTPL()->fetch('ircUserOnline'));
		}
	}
}
?>