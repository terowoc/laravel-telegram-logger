<?php

namespace Terowoc\LaravelTelegramLogger\ErrorTelegramLogger;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use TelegramBot\Api\BotApi;

class ErrorTelegramLogger extends ExceptionHandler
{
    public function register(): void
    {
        $this->reportable(function(Throwable $e){
            if(env('TELEGRAM_LOGGER_ENV') == env('APP_ENV')){
                $line = (int) $e->getLine()-1;
                $file = file_get_contents($e->getFile());
                $file_type = pathinfo($e->getFile(), PATHINFO_EXTENSION);
                $code = explode("\n", $file);
                $code = "```{$file_type}\n\n" . $line - 1 . "| " . trim($code[$line - 1]) . "\n" . $line . "| -> " . trim($code[$line]) . "\n" . $line + 1 . "| " . trim($code[$line+1]) . "```";

                $message = "*Error!* on *" . env('APP_NAME') . " ⚠️*\n\n*Code:*\n{$code}\n\n📃 *Description:*\n`{$e->getMessage()}`\n\n📅 *Date:* " . now()->format('d.m.Y | H:i:s') . " | ©️ [azimboev](https://azimboev.uz)";

                $bot = new BotApi(env('TELEGRAM_LOGGER_BOT_TOKEN'));
                $bot->sendMessage(env('TELEGRAM_LOGGER_ADMIN_ID'), $message, 'markdown');
            }
        });
    }
}