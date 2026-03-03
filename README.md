# Laravel Telegram GitHub/GitLab Notifier

<p align="center">
  <img alt="Telegram GitHub/GitLab Notifier Laravel" src="https://github.com/cslant/laravel-telegram-git-notifier/blob/main/resources/images/telegram-git-notifier-laravel.png" />
</p>

<p align="center">
<a href="#"><img src="https://img.shields.io/github/license/cslant/laravel-telegram-git-notifier.svg?style=flat-square" alt="License"></a>
<a href="https://github.com/cslant/laravel-telegram-git-notifier/releases"><img src="https://img.shields.io/github/release/cslant/laravel-telegram-git-notifier.svg?style=flat-square" alt="Latest Version"></a>
<a href="https://packagist.org/packages/cslant/laravel-telegram-git-notifier"><img src="https://img.shields.io/packagist/dt/cslant/laravel-telegram-git-notifier.svg?style=flat-square" alt="Total Downloads"></a>
<a href="https://github.com/cslant/laravel-telegram-git-notifier/actions/workflows/setup_test.yml"><img src="https://img.shields.io/github/actions/workflow/status/cslant/laravel-telegram-git-notifier/setup_test.yml?label=tests&branch=main" alt="Test Status"></a>
<a href="https://github.com/cslant/laravel-telegram-git-notifier/actions/workflows/php-cs-fixer.yml"><img src="https://img.shields.io/github/actions/workflow/status/cslant/laravel-telegram-git-notifier/php-cs-fixer.yml?label=code%20style&branch=main" alt="Code Style Status"></a>
<a href="https://scrutinizer-ci.com/g/cslant/laravel-telegram-git-notifier"><img src="https://img.shields.io/scrutinizer/g/cslant/laravel-telegram-git-notifier.svg?style=flat-square" alt="Quality Score"></a>

## 📝 Introduction

Laravel Telegram Git Notifier is a Laravel package that allows you to create a Telegram bot to receive notifications from GitHub
or GitLab events and manage customization through messages and buttons on Telegram.

- Send notifications of your GitHub/GitLab repositories to Telegram Bots, Groups, Super Groups (Multiple Topics), and Channels.
- The bot must be created using the [BotFather](https://core.telegram.org/bots#6-botfather)

## 📋 Requirements

- PHP ^8.4|^8.5
- Laravel ^11.0|^12.0
- [Composer](https://getcomposer.org/)
- Core: [Telegram Git Notifier](https://github.com/cslant/telegram-git-notifier.git)

## 🔧 Installation

You can install this package via Composer:

```bash
composer require cslant/laravel-telegram-git-notifier
```

## ✨ What's New in v2.0

### New Features

- **Webhook Security**: `VerifyWebhookSecret` middleware with timing-safe `hash_equals()` comparison
- **Webhook Status Command**: Check webhook status via `php artisan tg-notifier:webhook:status`
- **Deferrable Provider**: Lazy-loaded service provider with singleton bindings for better performance
- **API Retry Logic**: Exponential backoff for Telegram API rate limits (HTTP 429)
- **In-Memory Caching**: Config files cached in memory with dirty flag
- **Clean Template Format**: Simplified emoji usage (single emoji per event type)

### Improvements

- PHP 8.4+ support with `readonly` classes and properties
- Full type safety with explicit return types and nullable params
- `match` expressions instead of `switch` for cleaner code
- PSR-3 `LoggerInterface` support

### Available Artisan Commands

| Command                      | Description                               |
|------------------------------|-------------------------------------------|
| `tg-notifier:webhook:set`    | Set the webhook URL for your Telegram bot |
| `tg-notifier:webhook:status` | Check the current webhook status          |
| `tg-notifier:owner:config`   | Change owner for config JSON files        |

## 🚀 Usage

See the [Usage - Telegram git notifier Documentation](https://docs.cslant.com/telegram-git-notifier/usage/first_test)
for a list of usage.

Please check and update some configurations in the documentation.

## 📖 Official Documentation

Please see the [Telegram Git Notifier Documentation](https://docs.cslant.com/telegram-git-notifier) for more
information.

## ✨ Supported events

### GitHub Events Available

- [x] Push
- [x] Issues
- [x] Issue Comment
- [x] Pull Request
- [x] Pull Request Review
- [x] Fork
- [x] Commit Comment
- [x] Deployment
- [x] Deployment Status
- [x] Fork
- [x] Workflow
- [x] Watch

  ... and more events can be seen in the [all GitHub events available](https://docs.cslant.com/telegram-git-notifier/prologue/event-availability/github)

### GitLab Events Available

- [x] Push
- [x] Tag Push
- [x] Issue
- [x] Merge Request
- [x] Note
- [x] Pipeline
- [x] Wiki Page
- [x] Build
- [x] Deployment
- [x] Release

  ... and more events can be seen in the [all GitLab events available](https://docs.cslant.com/telegram-git-notifier/prologue/event-availability/gitlab)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## 📦 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.
