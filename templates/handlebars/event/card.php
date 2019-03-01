<script id="viewCalendarEventTemplate" type="text/x-handlebars-template">
	<div class="card card-basic card-event-popup">
		<div class="card-content-wrap">
			<div class="card-header">
				{{#if bannerUrl}}
				<div class="card-bkg align align-center" style="background-image:url({{bannerUrl}})"></div>
				{{else}}
					{{#if icon}}
						<div class="card-bkg align align-center">
							<i class="{{icon}} valign-center"></i>
						</div>
					{{/if}}
				{{/if}}
			</div>
			<div class="card-content cscroller">
				<div class="card-content-title">
					{{name}}
				</div>
				<div class="card-content-summary reader">
					{{description}}
				</div>
				<div class="card-content-data reader">
					{{content}}
				</div>
				<div class="card-content-title align align-center">
					{{scheduledAt}}
				</div>
			</div>
			<div class="card-footer row">
				<div class="card-footer-title">Event Reminders Settings</div>
				<div class="filler-height"></div>
				<div class="col col2">
					<div class="card-footer-info bold">Before Event</div>
					<div class="card-footer-content reader">
						<p>Reminder Count - {{preReminderCount}}</p>
						<p>Reminder Interval - {{preReminderInterval}}</p>
						<p>Reminder Unit - {{preIntervalUnit}}</p>
					</div>
				</div>
				<div class="col col2">
					<div class="card-footer-info bold">After Event</div>
					<div class="card-footer-content reader">
						<p>Reminder Count - {{postReminderCount}}</p>
						<p>Reminder Interval - {{postReminderInterval}}</p>
						<p>Reminder Unit - {{postIntervalUnit}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
