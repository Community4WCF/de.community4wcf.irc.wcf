<?php
namespace wcf\system\cache\builder;
use wcf\system\WCF;

/**
 * Caches the IRC User Online List.
 * 
 * @author		Marco D. / Tobias H.
 * @copyright	2010-2014 Community4WCF
 * @license		CC by-sa <http://creativecommons.org/licenses/by-sa/3.0/>
 * @package		de.community4wcf.irc.wcf
 * @subpackage	system.cache.builder
 * @category	Community Framework
 */
class IRCUserOnlineCacheBuilder extends AbstractCacheBuilder {
	/**
	 * @see	\wcf\system\cache\builder\AbstractCacheBuilder::$maxLifetime
	 */
	protected $maxLifetime = 3600;

	/**
	 * @see	\wcf\system\cache\builder\ICacheBuilder::getData()
	 */
	
	public function getData($cacheResource) {
		$data = array();
		
		$sourceURL = 'https://ircservices.ison.ws/index.php?page=IRCServiceReadDatas&uniqueID='.IRCUSERONLINE_UNIQUEID;
	
		$xml = @simplexml_load_file($sourceURL);
		if(!empty($xml)) {
			$count = 0;
			foreach ($xml->channel as $channel) {			
				$data[$count]['channelname'] = StringUtil::trim($channel->channelname);
				$data[$count]['usercount'] = 0;			
			
				$count2 = 0;
				foreach ($channel->useronlinelist->useronline as $useronlinelist) {								
					$data[$count]['useronlinelists'][$count2]['nickname'] = StringUtil::trim($useronlinelist->nickname);
					$data[$count]['useronlinelists'][$count2]['voice'] = StringUtil::trim($useronlinelist->voice);
					$data[$count]['useronlinelists'][$count2]['op'] = StringUtil::trim($useronlinelist->op);
					$data[$count]['usercount']++;
					$count2++;
				}
			
				$count++;
			}
		}
		return $data;
	}
}