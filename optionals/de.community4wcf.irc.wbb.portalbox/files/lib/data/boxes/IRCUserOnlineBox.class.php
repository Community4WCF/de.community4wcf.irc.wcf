<?php
// wbb imports
require_once(WBB_DIR.'lib/data/boxes/PortalBox.class.php');
require_once(WBB_DIR.'lib/data/boxes/StandardPortalBox.class.php');

/**
 * @author		Marco Daries
 * @copyright	2011 MaDa-Network.de
 * @website		mada-network.de
 * @package		de.community4wcf.irc.wbb.portalbox
 * @svn			$Id: IRCUserOnlineBox.class.php 1742 2011-02-07 16:21:11Z TobiasH87 $
 */
 
class IRCUserOnlineBox extends PortalBox implements StandardPortalBox {	
	/**	 
	 * @see StandardPortalBox::readData()
	 */
	public function readData() {
		$datas = array();
	
		WCF::getCache()->addResource('ircUserOnline', WCF_DIR.'cache/cache.ircUserOnline.php', WCF_DIR.'lib/system/cache/CacheBuilderIRCUserOnline.class.php', 0, IRCUSERONLINE_CACHETIME);
		$datas = WCF::getCache()->get('ircUserOnline');
		
		WCF::getTPL()->assign(array('datas' => $datas));
	}

	/**	 
	 * @see StandardPortalBox::getTemplateName()
	 */
	public function getTemplateName() {
		return 'ircUserOnlineBox';
	}
}
?>