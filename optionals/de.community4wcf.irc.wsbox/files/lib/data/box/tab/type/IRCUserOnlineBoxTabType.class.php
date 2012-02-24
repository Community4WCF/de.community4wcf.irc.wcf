<?php
// wcf imports
require_once(WCF_DIR.'lib/data/box/tab/type/AbstractBoxTabType.class.php');

/**
 * @author		Marco Daries
 * @copyright	2012 MaDa-Network.de
 * @website		mada-network.de
 * @package		de.community4wcf.irc.wsbox
 * @svn			$Id: IRCUserOnlineBoxTabType.class.php 1859 2012-02-24 19:00:08Z TobiasH87 $
 */
 
class IRCUserOnlineBoxTabType extends AbstractBoxTabType {
	/**
	 * @see	BoxTabType::getData()
	 */
	public function getData(BoxTab $boxTab) {
		$datas = array();
	
		WCF::getCache()->addResource('ircUserOnline', WCF_DIR.'cache/cache.ircUserOnline.php', WCF_DIR.'lib/system/cache/CacheBuilderIRCUserOnline.class.php', 0, IRCUSERONLINE_CACHETIME);
		$datas = WCF::getCache()->get('ircUserOnline');
		
		WCF::getTPL()->assign(array('datas' => $datas));
	}
	
	/**
	 * @see	BoxTabType::isAccessible()
	 */
	public function isAccessible(BoxTab $boxTab) {
		return (WCF::getUser()->getPermission('canViewIRCUserOnlineBox'));
	}
	
	/**
	 * @see	BoxTabType::getTemplateName()
	 */	
	public function getTemplateName() {
		return 'ircUserOnlineBoxTabType';
	}
}
?>