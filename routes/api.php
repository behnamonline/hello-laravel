<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

Route::post('/msg', function (Request $request) {
    // گرفتن نام و پیام از ریکوست
    $name = $request->input('name');
    $message = $request->input('message');

    // توکن و چت آیدی تلگرام خودتان
    $botToken = '8929075204:AAEYBHJmKKLtm_ivtL0_x3f1biDcYS3wHYM';
    $chatId = '7123106256';

    // متن پیام
    $text = "📩 پیام جدید:\n\n👤 نام: {$name}\n💬 پیام: {$message}";

    // ارسال به تلگرام
    Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
        'chat_id' => $chatId,
        'text' => $text,
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'پیام با موفقیت ارسال شد'
    ]);
});