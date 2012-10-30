<?php
// wcf imports
require_once(WCF_DIR.'lib/data/activityfeed/box/contenttype/ActivityFeedBoxContentType.class.php');

/**
 * @package		de.community4wcf.irc.activityFeed
 */

class IRCUserOnlineActivityFeedBoxContentType implements ActivityFeedBoxContentType {

	/**
	 * @see	ActivityFeedBoxContentType::getOptions()
	 */
	public static function getOptions() {}
	
	/**
	 * @see	ActivityFeedBoxContentType::validateOptions()
	 */
	public static function validateOptions(ActivityFeedBoxContentTypeObject $boxContentTypeObject, $boxContentOptions) {}
	
	/**
	 * @see	ActivityFeedBoxContentType::getTabs()
	 */
	public static function getTabs($boxContentOptions) {}
	
	/**
	 * @see	ActivityFeedBoxContentType::getContent()
	 */
	public static function getContent($boxContentOptions) {
    // check module and permission
    if(!WCF::getUser()->getPermission('canViewIRCUserOnlineActivity')) return;
	
		// set cache
		WCF::getCache()->addResource('ircUserOnline', WCF_DIR.'cache/cache.ircUserOnline.php', WCF_DIR.'lib/system/cache/CacheBuilderIRCUserOnline.class.php', 0, IRCUSERONLINE_CACHETIME);
		
		// get data from cache
		$datas = WCF::getCache()->get('ircUserOnline');
		
		// assign variables
		WCF::getTPL()->assign(array('datas' => $datas));
		
		// return box content
		return WCF::getTPL()->fetch('activityFeedBoxContentIRCUserOnline');
	}
}
?>