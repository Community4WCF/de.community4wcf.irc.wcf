{if $__wcf->session->getPermission('user.profile.canViewIRCUserOnline')}
<li class="box32 userIRCUserOnline">
	<span class="icon icon32 icon-comments"></span>
	
	<div>
		<div class="containerHeadline">
			<h1>{lang}wcf.index.ircuseronline{/lang}</h1>
			{hascontent}<h2>{content}{lang}wcf.index.ircuseronline.description{/lang}{/content}</h2>{/hascontent}
		</div>
		
		{foreach from=$datas key=keys item=data}
			<p class="smallFont"> {$data.channelname} ({$data.usercount} {lang}wcf.index.ircuseronline.channeluser{/lang}):
            	{if $data.useronlinelists|isset}
				{foreach from=$data.useronlinelists item=user}
					{counter assign=counter name=$data.channelname print=false}
					{if $counter > 1}, {/if}<span{if $user.op} style="color:{IRCUSERONLINE_COLOR_OP}"{elseif $user.voice} style="color:{IRCUSERONLINE_COLOR_VOICE}"{/if}>{$user.nickname}</span>
				{/foreach}
                {/if}
			</p>
		{/foreach}
		<p class="smallFont">{lang}wcf.index.ircuseronline.legende{/lang}: <span style="color:{IRCUSERONLINE_COLOR_OP}">{lang}wcf.index.ircuseronline.op{/lang}</span>, <span style="color:{IRCUSERONLINE_COLOR_VOICE}">{lang}wcf.index.ircuseronline.voice{/lang}</span></p>
	</div>
</li>
{/if}