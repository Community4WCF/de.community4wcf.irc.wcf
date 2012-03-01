<div class="{cycle values='container-1,container-2'}">
	<div class="containerIcon"><img src="{icon}ircM.png{/icon}" alt="" /></div>
	<div class="containerContent">
		<h3>{lang}wcf.index.ircuseronline{/lang}</h3> 
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
		{if IRCUSERONLINE_WCF_ENABLE_LEGEND}<p class="smallFont">{lang}wcf.index.ircuseronline.legende{/lang}: <span style="color:{IRCUSERONLINE_COLOR_OP}">{lang}wcf.index.ircuseronline.op{/lang}</span>, <span style="color:{IRCUSERONLINE_COLOR_VOICE}">{lang}wcf.index.ircuseronline.voice{/lang}</span>{/if}
	</div>
</div>