{if $datas|count > 0}
	<ul class="dataList">
		<li class="{cycle values='container-1,container-2'}">
			{foreach from=$datas key=keys item=data}
				<p class="smallFont"> {$data.channelname} ({$data.usercount} {lang}wcf.activityfeed.boxcontenttype.ircuseronline.channeluser{/lang}):
					{if $data.useronlinelists|isset}
					{foreach from=$data.useronlinelists item=user}
						{counter assign=counter name=$data.channelname print=false}						
						{if $counter > 1}, {/if}<span{if $user.op} style="color:{IRCUSERONLINE_COLOR_OP}"{elseif $user.voice} style="color:{IRCUSERONLINE_COLOR_VOICE}"{/if}>{$user.nickname}</span>
					{/foreach}
					{/if}
				</p>
			{/foreach}
		</li>
	</ul>
{else}
	<p>{lang}wcf.activityfeed.boxcontenttype.ircuseronline.nouseronline{/lang}</p>
{/if}