{if $datas|count > 0}
	<div class="container-1">
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
	</div>
{else}
	<p>{lang}wcf.activityfeed.boxcontenttype.ircuseronline.nouseronline{/lang}</p>
{/if}