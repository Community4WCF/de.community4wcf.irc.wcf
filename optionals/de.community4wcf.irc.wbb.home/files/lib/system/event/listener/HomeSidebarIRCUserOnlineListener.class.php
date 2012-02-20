<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * @package		de.community4wcf.irc.wbb.home
 * @svn			$Id: HomeSidebarIRCUserOnlineListener.class.php 1828 2011-08-29 16:48:03Z TobiasH87 $
 */
class HomeSidebarIRCUserOnlineListener implements EventListener {
	/**
	 * @see EventListener::execute()
	 */
    public function execute($eventObj, $className, $eventName) { 
		$datas = array();
		
		// check permission
		if(!WCF::getUser()->getPermission('user.home.canViewIRCUserOnline')) return;
		
		// register cache
		WCF::getCache()->addResource('ircUserOnline', WCF_DIR.'cache/cache.ircUserOnline.php', WCF_DIR.'lib/system/cache/CacheBuilderIRCUserOnline.class.php', 0, IRCUSERONLINE_CACHETIME);
		// get cache
		$datas = WCF::getCache()->get('ircUserOnline');
		
		// has irc users/datas
		if(count($datas) > 0) {
			// assign varibales
			WCF::getTPL()->assign(array('datas' => $datas));
			// append template
			WCF::getTPL()->append('additionalHomeContent4', WCF::getTPL()->fetch('ircUserOnlineHome'));
		}
	}
}
?>
