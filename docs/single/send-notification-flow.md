# The Telegram Git Notifier flow

This document describes the flow of the telegram git notifier.

## Handle the webhook and send a notification

### The user adds this bot URL to the git repository webhook

The user adds the bot URL to the git repository webhook. The bot URL is the URL of the bot server.

### The git repository sends a webhook to the bot

The git repository sends a webhook to the bot if any event occurs. The webhook contains the event details.

### The bot processes the webhook message

The bot will receive the webhook message and process it. The bot will check the validity of the webhook message.

### The bot gets the message details if the event is valid

If the event is valid, the bot will get the message details of this event and set the message details to the message object.

### The bot sends a notification

The bot sends a notification with the message details of the event to the user, group, or channel.

## Sending notifications to multiple users

If the bot supports sending notifications to multiple users, groups, or channels, it will manage this process. This could involve iterating over a list of recipients, handling individual user preferences, etc.

## Packages

This flow is implemented in two packages: `telegram-git-notifier` and `laravel-telegram-git-notifier`.

### telegram-git-notifier

This package handles the core functionality of receiving and processing webhooks from GitHub and GitLab, and sending notifications to Telegram.

### laravel-telegram-git-notifier

This package is a Laravel wrapper for the `telegram-git-notifier` package. It provides a Laravel-friendly way to use the `telegram-git-notifier` functionality, including configuration and views for customizing the notifications.

## Entity Relationship Diagram

```mermaid
erDiagram
    User ||--o{ Bot: owns
    User ||--o{ GitRepository: owns
    Bot ||--o{ Webhook: creates
    GitRepository ||--o{ Webhook: has
    GitRepository ||--o{ Event: triggers
    Event ||--o{ Webhook: sends_through
    Webhook ||--o{ Bot: received_by
    Bot ||--o{ Notification: sends
    Notification ||--o{ Recipient: received_by

    Bot {
        int id PK
        string token "The bot token" 
        string bot_id "The bot ID"
    }

    User {
        int id PK
        string telegram_id "The user Telegram ID"
    }

    Webhook {
        int id PK
        string url "The URL of the webhook"
    }

    Event {
        int id PK
        json payload "The webhook payload"
        string name "The name of the event in payload"
        string action "The action of the event in payload"
    }

    Notification {
        int id PK
        string message "The notification message"
    }

    Recipient {
        int id PK
        string type "bot, group, channel, topic, etc."
        string identifier "The recipient identifier (e.g., bot ID, group ID)"
    }

    GitRepository {
        int id PK
        string platform "The git platform (e.g., GitHub, GitLab)"
        string name "The name of the git repository"
        string url "The URL of the git repository"
    }
```

## Send notification flowchart

Here is the flowchart of the Telegram Git Notifier - send notification flow:

```mermaid
flowchart TD
    title[The Telegram Git Notifier - send notification flow]

    application(New application created)
    application-->bot[Bot created]
    bot[Bot]
    bot-->webhookCheck{Is webhook set?}
    webhookCheck-->|No|setNewWebhook[Set new webhook]
    webhookCheck-->|Yes|updateWebhook[Update existing webhook]
    updateWebhook-->webhook[Webhook updated]
    setNewWebhook-->webhook[Webhook set]

    subgraph "User and Repository Interaction"
        webhook-->user[User]
        user-->addWebhookToRepo[Add webhook to repository]
        addWebhookToRepo-->repository[Repository]
        user-->ownsRepo[Owns]
        ownsRepo-->repository
    end

    repository-->triggerEvent{Trigger event}
    triggerEvent-->sendPayload[Send event payload to bot]
    sendPayload-->bot
    bot-->processEvent{Process event}
    processEvent-->checkAction{Is there an action?}
    checkAction-->|Yes|actionMessage[Event type: Action]
    checkAction-->|No|eventNameMessage[Event type: Event name]
    eventNameMessage-->checkSettings{Is event allowed in settings?}
    actionMessage-->checkSettings
    checkSettings-->|Yes|findTemplate{Find message template}
    checkSettings-->|No|endFlow[End flow]
    findTemplate-->|Exists|setMessage[Set message for notification]
    findTemplate-->|Not Exists|logAndEndFlow[Log and end flow]
    logAndEndFlow-->endFlow
    setMessage-->checkMessage{Is message empty?}
    checkMessage-->|Yes|endFlow[End flow]
    checkMessage-->|No|sendNotification[Send notification]
    sendNotification-->|Success|endFlow[End flow]
    sendNotification-->|Failure|logAndEndFlow[Log and end flow]
```

## Future Work

In the future, additional flows will be implemented to handle other aspects of the bot's functionality, such as error handling, customizing notifications, and sending notifications to multiple users.
