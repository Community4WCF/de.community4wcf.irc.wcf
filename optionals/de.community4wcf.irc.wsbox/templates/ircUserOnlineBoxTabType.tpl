{if $boxTabData|count}
		<ul class="dataList">
			{foreach from=$boxTabData item=data}
				<li class="{cycle values='container-1,container-2'}">
					<div class="containerIcon">
						<img src="{icon}ircM.png{/icon}" alt="" />
					</div>
					<div class="containerContent">
						{foreach from=$datas key=keys item=data}
						<p class="smallFont">{$data.channelname} ({$data.usercount} {lang}wcf.box.ircuseronline.channeluser{/lang}):</p>
							{if $data.useronlinelists|isset}
							{foreach from=$data.useronlinelists item=user}
								{counter assign=counter name=$data.channelname print=false}						
								{if $counter > 1}, {/if}<span{if $user.op} style="color:{IRCUSERONLINE_COLOR_OP}"{elseif $user.voice} style="color:{IRCUSERONLINE_COLOR_VOICE}"{/if}>{$user.nickname}</span>
							{/foreach}
							{/if}
						<p class="smallFont">{lang}wcf.box.ircuseronline.legende{/lang}: <span style="color:{IRCUSERONLINE_COLOR_OP}">{lang}wcf.box.ircuseronline.op{/lang}</span>, <span style="color:{IRCUSERONLINE_COLOR_VOICE}">{lang}wcf.box.ircuseronline.voice{/lang}</span>
						{/foreach}
					</div>
				</li>
			{/foreach}
		</ul>
{else}
	{lang}wcf.box.noIRCUserOnline{/lang}
{/if}