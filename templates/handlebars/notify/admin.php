<script id="notificationData" type="text/x-handlebars-template">

	{{#if data.adminLink}}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/notification/read?id={{data.id}}" consumed="{{data.consumed}}" redirect="{{siteUrl}}{{data.adminLink}}">
			<span class="cmt-click reader {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="notification"><em class="h6">{{{data.title}}}</em><br>{{{data.content}}}</span><hr>
		</li>
		{{else}}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/notification/read?id={{data.id}}" consumed="{{data.consumed}}">
			<span class="cmt-click reader {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="notification"><em class="h6">{{{data.title}}}</em><br>{{{data.content}}}</span><hr>
		</li>
	{{/if}}

</script>

<script id="reminderData" type="text/x-handlebars-template">

	{{#if data.adminLink}}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/reminder/read?id={{data.id}}" consumed="{{data.consumed}}" redirect="{{siteUrl}}{{data.adminLink}}">
			<span class="cmt-click reader {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="reminder"><em class="h6">{{{data.title}}}</em><br>{{{data.content}}}</span><hr>
		</li>
		{{else}}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/reminder/read?id={{data.id}}" consumed="{{data.consumed}}">
			<span class="cmt-click reader {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="reminder"><em class="h6">{{{data.title}}}</em><br>{{{data.content}}}</span><hr>
		</li>
	{{/if}}

</script>

<script id="activityData" type="text/x-handlebars-template">

	{{#if data.adminLink}}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/activity/read?id={{data.id}}" consumed="{{data.consumed}}" redirect="{{siteUrl}}{{data.adminLink}}">
			<span class="cmt-click reader {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="activity"><em class="h6">{{{data.title}}}</em><br>{{{data.content}}}</span><hr>
		</li>
		{{else}}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/activity/read?id={{data.id}}" consumed="{{data.consumed}}">
			<span class="cmt-click reader {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="activity"><em class="h6">{{{data.title}}}</em><br>{{{data.content}}}</span><hr>
		</li>
	{{/if}}

</script>
