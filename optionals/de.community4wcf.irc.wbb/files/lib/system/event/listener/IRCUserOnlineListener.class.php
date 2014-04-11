<?php
namespace wbb\system\event\listener;
use wcf\system\cache\builder\IRCUserOnlineCacheBuilder;
use wcf\system\event\IEventListener;
use wcf\system\WCF;

/**
 * IRC User Online.
 * 
 * @author		Marco D. / Tobias H.
 * @copyright	2010-2014 Community4WCF
 * @license		CC by-sa <http://creativecommons.org/licenses/by-sa/3.0/>
 * @package		de.community4wcf.irc.wbb
 * @subpackage	system.cache.builder
 * @category	Community Framework
 */

class IRCUserOnlineListener implements IEventListener {
	/**
	 * @see	\wcf\system\event\IEventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		if (!WCF::getSession()->getPermission('user.profile.canViewIRCUserOnline')) return;
		
		$datas = array();
		
		WCF::getCache()->addResource('ircUserOnline', 'wcf\cache\cache.ircUserOnline.php', 'wcf\lib\system\cache\CacheBuilderIRCUserOnline.class.php', 0, IRCUSERONLINE_CACHETIME);
		$datas = WCF::getCache()->get('ircUserOnline');
		
		if(count($datas) > 0) {
			WCF::getTPL()->assign(array('datas' => $datas));
			//WCF::getTPL()->append('additionalBoxes', WCF::getTPL()->fetch('ircUserOnline'));
		}
	}
}
?>