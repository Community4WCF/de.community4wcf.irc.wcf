<?PHP
// wcf imports
require_once(WCF_DIR.'lib/system/cache/CacheBuilder.class.php');

/**
 * @author		Marco Daries
 * @copyright	2011 - 2012 MaDa-Network.de
 * @website		mada-network.de
 * @svn			$Id: CacheBuilderIRCUserOnline.class.php 1863 2012-02-28 14:52:27Z TobiasH87 $
 */
 
class CacheBuilderIRCUserOnline implements CacheBuilder {
	/**
	 * @see CacheBuilder::getData()
	 */
	public function getData($cacheResource) {
		$data = array();
		
		$sourceURL = 'http://irc.european-network.eu/index.php?page=IRCServiceReadDatas&uniqueID='.IRCUSERONLINE_UNIQUEID;
	
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

?>