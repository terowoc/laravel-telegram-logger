# Laravel Telegram logger

Send logs to Telegram chat via Telegram bot

## Installation

```
composer require grkamil/laravel-telegram-logging
```

Define Telegram Bot Token and chat id (users telegram id) and set as environment parameters.
Add to <b>.env</b> 

```
TELEGRAM_LOGGER_BOT_TOKEN=id:token
TELEGRAM_LOGGER_ADMIN_ID=chat_id
TELEGRAM_LOGGER_ENV=local
```