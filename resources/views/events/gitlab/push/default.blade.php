<?php
/**
 * @var $payload object
 */

$count = count($payload->commits);
$noun = ($count > 1) ? "commits" : "commit";

$ref = explode('/', $payload->ref);
$branch = implode('/', array_slice($ref, 2));
$repo = "🦊<a href='{$payload->project->web_url}'>{$payload->project->path_with_namespace}</a>";
?>
@if(empty($payload->commits)) {{-- New branch created --}}
🎊 {!! __('tg-notifier::events/gitlab/push.new_branch_title', [
    'repo' => $repo,
]) !!}
@else
👷⚙️ {!! __('tg-notifier::events/gitlab/push.title', [
            'count' => $count,
            'noun' => $noun,
            'repo' => $repo,
            'branch' => $branch,
        ]) !!}

@foreach($payload->commits as $commit)
@php
    $commitId = substr($commit->id, -7);

    $commit->message = $commit->message ?? '';
    $commit->message = explode("\n", $commit->message)[0];
@endphp
{!! __('tg-notifier::events/gitlab/push.commit', [
       'commit' => "<a href='$commit->url'>$commitId</a>",
       'commit_message' => $commit->message,
       'commit_by' => $commit->author->name,
   ]) !!}

@endforeach
@endif

🌲 {{ __('tg-notifier::app.branch') }}: <code>{{ $branch }}</code>
👤 {!! __('tg-notifier::events/gitlab/push.pusher', ['name' => $payload->user_name]) !!}
