# Welcome to Telegram GitHub/GitLab Notifier 👋

With this package, you can create a Telegram bot to receive notifications from GitHub or GitLab events
and manage customization through messages and buttons on Telegram.

<p align="center">
  <img alt="GitHub and GitLab notifications to telegram php" src="https://github.com/cslant/laravel-telegram-git-notifier/assets/35853002/09b85152-52c9-444d-ac2e-a32ee4ab5121" />
</p>

![License](https://img.shields.io/github/license/cslant/laravel-telegram-git-notifier.svg?style=flat-square)
[![Latest Version](https://img.shields.io/github/release/cslant/laravel-telegram-git-notifier.svg?style=flat-square)](https://github.com/cslant/laravel-telegram-git-notifier/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/cslant/laravel-telegram-git-notifier.svg?style=flat-square)](https://packagist.org/packages/cslant/laravel-telegram-git-notifier)
![Test Status](https://img.shields.io/github/actions/workflow/status/cslant/laravel-telegram-git-notifier/setup_test.yml?label=tests&branch=main)
![Code Style Status](https://img.shields.io/github/actions/workflow/status/cslant/laravel-telegram-git-notifier/php-cs-fixer.yml?label=code%20style&branch=main)
[![StyleCI](https://styleci.io/repos/683727144/shield)](https://styleci.io/repos/683727144)
[![Quality Score](https://img.shields.io/scrutinizer/g/cslant/laravel-telegram-git-notifier.svg?style=flat-square)](https://scrutinizer-ci.com/g/cslant/laravel-telegram-git-notifier)
[![Maintainability](https://api.codeclimate.com/v1/badges/7ccaccebe9cd58ff3df5/maintainability)](https://codeclimate.com/github/cslant/laravel-telegram-git-notifier/maintainability)

## 📝 Information

- Send notifications of your GitHub/GitLab repositories to Telegram Bots, Groups, Super Groups (Multiple Topics), and Channels.
- The bot must be created using the [BotFather](https://core.telegram.org/bots#6-botfather)

## 📋 Requirements

- PHP ^8.1
- [Composer](https://getcomposer.org/)
- Core: [Telegram Git Notifier](https://github.com/cslant/telegram-git-notifier)

## 🔧 Installation

First, please clone and install this project via [Composer](https://getcomposer.org/):

```bash
composer require cslant/laravel-telegram-git-notifier
```

Publication of configuration files:

```bash
php artisan vendor:publish --provider="CSlant\LaravelTelegramGitNotifier\Providers\TelegramGitNotifierServiceProvider" --tag="config_jsons"
```

## Fixing Permissions (for Linux)

If you are using Linux, you need to change the owner of the configuration files to the web server user and group (e.g. `www-data`).

The configuration files will be used to store the bot's settings and other information, so you need to change the owner of the configuration files to the web server user and group.

```bash
sudo php artisan config-json:change-owner www-data www-data
```

> Note:
> - `www-data` is the user and group of the web server, you can change it to your own user and group.
> - The first `www-data` is the user, and the second `www-data` is the group. (You can also use only the first `www-data` to represent both the user and the group)

## 📖 Documentation

...In construction...
