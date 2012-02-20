<div class="border titleBarPanel">
	<div class="containerHead">
		<h3>{lang}wbb.start.ircuseronline{/lang}</h3>
	</div>
	<ul class="dataList">
		{foreach from=$datas key=keys item=data}
           <li class="{cycle values='container-1,container-2'}">
				<div class="containerIcon">
					<img src="{icon}ircM.png{/icon}" alt="" />
				</div>
				<div class="containerContent">
					<p class="smallFont"> {$data.channelname} ({$data.usercount} {lang}wbb.start.ircuseronline.channeluser{/lang}):
					{if $data.useronlinelists|isset}
						{foreach from=$data.useronlinelists item=user}
							{counter assign=counter name=$data.channelname print=false}						
							{if $counter > 1}, {/if}<span{if $user.op} style="color:{IRCUSERONLINE_COLOR_OP}"{elseif $user.voice} style="color:{IRCUSERONLINE_COLOR_VOICE}"{/if}>{$user.nickname}</span>
						{/foreach}
					{/if}
					</p>
				</div>
			</li>
		{/foreach}
	</ul>
</div>