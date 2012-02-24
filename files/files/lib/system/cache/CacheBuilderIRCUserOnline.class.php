<?PHP
// wcf imports
require_once(WCF_DIR.'lib/system/cache/CacheBuilder.class.php');

/**
 * @author		Marco Daries
 * @copyright	2011 MaDa-Network.de
 * @website		mada-network.de
 * @package		de.community4wcf.irc.wcf
 */
 
class CacheBuilderIRCUserOnline implements CacheBuilder {
	/**
	 * @see CacheBuilder::getData()
	 */
	public function getData($cacheResource) {
		$data = array();

		//if (@fsockopen('irc.european-network.eu', 80, $errnum, $errstr, 2)){
		$sourceURL = 'http://irc.european-network.eu/index.php?page=IRCServiceReadDatas&uniqueID='.IRCUSERONLINE_UNIQUEID;
		$filename = FileUtil::downloadFileFromHttp($sourceURL, 'ircService');
	
		$xml = simplexml_load_file($filename);

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
		//}
		return $data;
	}	
}

?>