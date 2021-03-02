@unless (empty($sentryID))
    <script src="https://cdn.ravenjs.com/3.27.0/raven.min.js"></script>
    <script>
        Raven.showReportDialog({
            eventId : '{{$sentryID}}',
            dsn : "https://5a182b91fd944c179aa6b824b0bb13e3@o486091.ingest.sentry.io/5542528"
        });
    </script>
@endunless