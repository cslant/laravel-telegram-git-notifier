# Changelog

Here you can see the full list of changes between each Telegram Git Notifier package release.

## v1.0.4 - 2024-01-26

### What's Changed

* Feat: add request_verify from `Client Request` to work correctly on window and Linux by @LuongTienThinh in https://github.com/cslant/laravel-telegram-git-notifier/pull/59
  Related: https://github.com/cslant/telegram-git-notifier/releases/tag/v1.3.6

**Full Changelog**: https://github.com/cslant/laravel-telegram-git-notifier/compare/v1.0.3...v1.0.4

## v1.0.3 - 2024-01-25

### What's Changed

* Refactor config by @tanhongit in https://github.com/cslant/laravel-telegram-git-notifier/pull/57
* feat: set webhook using CLI by @LuongTienThinh in https://github.com/cslant/laravel-telegram-git-notifier/pull/58

### New Contributors

* @LuongTienThinh made their first contribution in https://github.com/cslant/laravel-telegram-git-notifier/pull/58

**Full Changelog**: https://github.com/cslant/laravel-telegram-git-notifier/compare/v1.0.2...v1.0.3

## v1.0.2 - 2024-01-15

### What's Changed

* New Official Documentation in the [Telegram Git Notifier Documentation](https://docs.cslant.com/telegram-git-notifier/)
* Update view template for bot's tool by @pxthinh in https://github.com/cslant/laravel-telegram-git-notifier/pull/38
* Add view and lang for branch protection rule and deploy key by @pxthinh in https://github.com/cslant/laravel-telegram-git-notifier/pull/39
* Update view template for some github events by @pxthinh in https://github.com/cslant/laravel-telegram-git-notifier/pull/41
* Fix the person execute for some view template by @pxthinh in https://github.com/cslant/laravel-telegram-git-notifier/pull/42

**Full Changelog**: https://github.com/cslant/laravel-telegram-git-notifier/compare/v1.0.1...v1.0.2

## v1.0.1 - 2023-11-25

### 🚀 New Version Release! 🚀

#### ✨ New Features:

- Introduced support for Telegram bot commands.
- Add support for custom commands and buttons. #33
- Add support for custom callbacks. #33
- Set My Commands - Create the Menu button in the bot's #33
- Allows users to set a route prefix through the configuration file ([ff5fdd4](https://github.com/cslant/laravel-telegram-git-notifier/commit/ff5fdd443bce32a3b1a5dd481c60dc36f1819190))
- And a lot more ...

🛠 Improvements and Updates:

- Create a command console to change the owner for config JSON files (#35, #36)

## v1.0.0 - 2023-11-23

### ✨ New Features

- Support multiple languages
- Added support for sending notifications in topics (threads in supergroups).
- Enhanced capability to send notifications across multiple topics simultaneously.
- Validate the configuration platform events.
- **Support for Optional Configuration via Vendor Publish Command**
  - You can now customize the configuration more easily using the following command:
    ```bash
    php artisan vendor:publish --provider="CSlant\LaravelTelegramGitNotifier\Providers\TelegramGitNotifierServiceProvider" --tag="config_jsons"            
    
    
    
    
    
    ```
  - This feature allows you to flexibly configure and manage your application according to your preferences.
  

### 📝 What's Changed

- Update View templates for Github and Gitlab events notifications

## v0.0.2 - 2023-11-04

- Remove redundant helper not set autoload in composer

## v0.0.1 - 2023-11-04

- Experimental release
