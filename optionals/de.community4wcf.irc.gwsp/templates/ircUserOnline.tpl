<div class="{cycle values='container-1,container-2'}">
	<div class="containerIcon"><img src="{icon}ircM.png{/icon}" alt="" /></div>
	<div class="containerContent">
		<h3>{lang}gws.index.ircuseronline{/lang}</h3> 
		{foreach from=$datas key=keys item=data}
			<p class="smallFont"> {$data.channelname} ({$data.usercount} {lang}gws.index.ircuseronline.channeluser{/lang}):
            	{if $data.useronlinelists|isset}
				{foreach from=$data.useronlinelists item=user}
					{counter assign=counter name=$data.channelname print=false}						
					{if $counter > 1}, {/if}<span{if $user.op} style="color:{IRCUSERONLINE_COLOR_OP}"{elseif $user.voice} style="color:{IRCUSERONLINE_COLOR_VOICE}"{/if}>{$user.nickname}</span>
				{/foreach}
                {/if}
			</p>
		{/foreach}
		<p class="smallFont">{lang}gws.index.ircuseronline.legende{/lang}: <span style="color:{IRCUSERONLINE_COLOR_OP}">{lang}gws.index.ircuseronline.op{/lang}</span>, <span style="color:{IRCUSERONLINE_COLOR_VOICE}">{lang}gws.index.ircuseronline.voice{/lang}</span>
	</div>
</div>