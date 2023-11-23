# Changelog

Here you can see the full list of changes between each Telegram Git Notifier package release.

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
