# Welcome to Telegram GitHub/GitLab Notifier 👋

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
<a href="https://codeclimate.com/github/cslant/laravel-telegram-git-notifier/maintainability"><img src="https://api.codeclimate.com/v1/badges/a4f72c7bdd4200cf3dda/maintainability" alt="Maintainability"></a>
</p>

## 📝 Introduction

Laravel Telegram Git Notifier is a Laravel package that allows you to create a Telegram bot to receive notifications from GitHub
or GitLab events and manage customization through messages and buttons on Telegram.

- Send notifications of your GitHub/GitLab repositories to Telegram Bots, Groups, Super Groups (Multiple Topics), and
  Channels.
- The bot must be created using the [BotFather](https://core.telegram.org/bots#6-botfather)

## 📋 Requirements

- PHP ^8.1
- [Composer](https://getcomposer.org/)
- Core: [Telegram Git Notifier](https://github.com/cslant/telegram-git-notifier.git)

## 🔧 Installation

You can install this package via Composer:

```bash
composer require cslant/laravel-telegram-git-notifier
```

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
