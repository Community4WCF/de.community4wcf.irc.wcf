	{if $additionalBoxes|isset}
		{cycle values='container-1,container-2' print=false advance=false}
		<div class="border infoBox">			
			{if $additionalBoxes|isset}{@$additionalBoxes}{/if}
		</div>
	{/if}