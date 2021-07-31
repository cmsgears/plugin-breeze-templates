<script id="orgNotificationData" type="text/x-handlebars-template">

	{{#if data.link}}
		<li cmt-app="orgNotify" cmt-controller="notification" cmt-action="hread" action="orgnotify/notification/read?id={{data.id}}" consumed="{{data.consumed}}" redirect="{{siteUrl}}{{data.link}}">
			<span class="cmt-click {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="notification"><b>{{{data.title}}}</b> - {{{data.content}}}</span>
		</li>
	{{else}}
		<li cmt-app="orgNotify" cmt-controller="notification" cmt-action="hread" action="orgnotify/notification/read?id={{data.id}}" consumed="{{data.consumed}}">
			<span class="cmt-click {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="notification"><b>{{{data.title}}}</b> - {{{data.content}}}</span>
		</li>
	{{/if}}

</script>

<script id="orgReminderData" type="text/x-handlebars-template">

	{{#if data.link}}
		<li cmt-app="orgNotify" cmt-controller="notification" cmt-action="hread" action="orgnotify/reminder/read?id={{data.id}}" consumed="{{data.consumed}}" redirect="{{siteUrl}}{{data.link}}">
			<span class="cmt-click {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="reminder"><b>{{{data.title}}}</b> - {{{data.content}}}</span>
		</li>
	{{else}}
		<li cmt-app="orgNotify" cmt-controller="notification" cmt-action="hread" action="orgnotify/reminder/read?id={{data.id}}" consumed="{{data.consumed}}">
			<span class="cmt-click {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="reminder"><b>{{{data.title}}}</b> - {{{data.content}}}</span>
		</li>
	{{/if}}

</script>

<script id="orgActivityData" type="text/x-handlebars-template">

	{{#if data.link}}
		<li cmt-app="orgNotify" cmt-controller="notification" cmt-action="hread" action="orgnotify/activity/read?id={{data.id}}" consumed="{{data.consumed}}" redirect="{{siteUrl}}{{data.link}}">
			<span class="cmt-click {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="activity"><b>{{{data.title}}}</b> - {{{data.content}}}</span>
		</li>
	{{else}}
		<li cmt-app="orgNotify" cmt-controller="notification" cmt-action="hread" action="orgnotify/activity/read?id={{data.id}}" consumed="{{data.consumed}}">
			<span class="cmt-click {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="activity"><b>{{{data.title}}}</b> - {{{data.content}}}</span>
		</li>
	{{/if}}

</script>

<script id="orgAnnouncementData" type="text/x-handlebars-template">

	{{#if data.link}}
		<li cmt-app="orgNotify" cmt-controller="notification" cmt-action="hread" action="orgnotify/announcement/read?id={{data.id}}" redirect="{{siteUrl}}{{data.link}}">
			<span class="cmt-click {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="announcement"><b>{{{data.title}}}</b> - {{{data.content}}}</span>
		</li>
	{{else}}
		<li cmt-app="orgNotify" cmt-controller="notification" cmt-action="hread" action="orgnotify/announcement/read?id={{data.id}}">
			<span class="cmt-click {{#if data.consumed}} text text-gray {{else}} link {{/if}}" type="announcement"><b>{{{data.title}}}</b> - {{{data.content}}}</span>
		</li>
	{{/if}}

</script>
