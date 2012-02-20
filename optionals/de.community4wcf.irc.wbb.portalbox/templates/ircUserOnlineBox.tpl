<div class="border titleBarPanel" id="box{$box->boxID}">
	<div class="containerHead">
		<div class="containerIcon">
    		<a href="javascript: void(0)" onclick="openList('{@$box->getStatusVariable()}', { save:true })"><img src="{icon}minusS.png{/icon}" id="{@$box->getStatusVariable()}Image" alt="" /></a>
		</div>
		<div class="containerContent">
			<span>{lang}wbb.portal.box.ircuseronline.title{/lang}</span>
		</div>
	</div>
	<div class="container-1" id="{@$box->getStatusVariable()}">
		<div class="containerContent">
			{foreach from=$datas key=keys item=data}
				<p class="smallFont"> {$data.channelname} ({$data.usercount} {lang}wbb.portal.box.ircuseronline.channeluser{/lang}):
				{if $data.useronlinelists|isset}
					{foreach from=$data.useronlinelists item=user}
						{counter assign=counter name=$data.channelname print=false}						
						{if $counter > 1}, {/if}<span{if $user.op} style="color:{IRCUSERONLINE_COLOR_OP}"{elseif $user.voice} style="color:{IRCUSERONLINE_COLOR_VOICE}"{/if}>{$user.nickname}</span>
					{/foreach}
					{/if}
				</p>
			{/foreach}
		</div>
	</div>
</div>