<?php
/**
 * @var $payload object
 */

$count = count($payload->commits);
$noun = ($count > 1) ? "commits" : "commit";

$ref = explode('/', $payload->ref);
$branch = implode('/', array_slice($ref, 2));

if (empty($payload->commits)) {
    return '';
}
?>

👷⚙️ {!! __('tg-notifier::events/github/push.default.title', [
            'count' => $count,
            'noun' => $noun,
            'repo' => "🦑<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
            'branch' => $branch,
        ]
    ) !!}

@foreach($payload->commits as $commit)
@php
    $commitId = substr($commit->id, -7);

    $commit->message = $commit->message ?? '';
    $commit->message = explode("\n", $commit->message)[0];
@endphp
{!! __('tg-notifier::events/github/push.default.commit', [
       'commit' => "<a href='$commit->url'>$commitId</a>",
       'commit_message' => $commit->message,
       'commit_by' => $commit->author->name,
   ]
) !!}
@endforeach

🌲 {{ __('tg-notifier::app.branch') }}: <code>{{ $branch }}</code>
👤 {!! __('tg-notifier::events/github/push.default.pusher') !!}: <code>{{ $payload->pusher->name }}</code>
