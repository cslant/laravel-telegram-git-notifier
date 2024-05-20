<?php
/**
 * @var $payload object
 */

$count = count($payload->commits);
$noun = ($count > 1) ? "commits" : "commit";

$ref = explode('/', $payload->ref);
$branch = implode('/', array_slice($ref, 2));
?>

👷⚙️ {!! __('tg-notifier::events/gitlab/push.default.title', [
            'count' => $count,
            'noun' => $noun,
            'repo' => "🦑<a href='{$payload->project->web_url}'>{$payload->project->path_with_namespace}</a>",
            'branch' => $branch,
        ]) !!}

@foreach($payload->commits as $commit)
@php
    $commitId = substr($commit->id, -7);
@endphp
{!! __('tg-notifier::events/gitlab/push.default.commit', [
       'commit' => "<a href='$commit->url'>$commitId</a>",
       'commit_message' => $commit->message,
       'commit_by' => $commit->author->name,
   ]) !!}
@endforeach

{!! __('tg-notifier::events/gitlab/push.default.pusher', ['name' => $payload->user_name]) !!}
