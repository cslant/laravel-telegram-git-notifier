<?php
$githubSetupSteps = __('tg-notifier::tools/usage.github.webhookSetupSteps');
$gitlabSetupSteps = __('tg-notifier::tools/usage.gitlab.webhookSetupSteps');
?>
{!! __('tg-notifier::tools/usage.github.title') !!}

@foreach($githubSetupSteps as $githubSetupStep)
{!! $githubSetupStep !!}
@endforeach

----------
{!! __('tg-notifier::tools/usage.gitlab.title') !!}

@foreach($gitlabSetupSteps as $gitlabSetupStep)
{!! $gitlabSetupStep !!}
@endforeach

{!! __('tg-notifier::tools/usage.completionMessage') !!}
