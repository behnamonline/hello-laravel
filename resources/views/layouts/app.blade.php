<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'سایت من')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Vazirmatn', sans-serif; } 
        /* افکت درخشش سبز نئونی */
        .neon-glow {
            text-shadow: 0 0 10px rgba(34, 197, 94, 0.4);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 flex flex-col min-h-screen selection:bg-emerald-500 selection:text-slate-950">

    <!-- هدر مشترک -->
    <header class="bg-slate-900/80 backdrop-blur-md border-b border-slate-800 shadow-lg py-4 px-6 flex justify-between items-center sticky top-0 z-50">
        <h1 class="text-xl font-bold text-emerald-400 neon-glow">وبسایت من</h1>
        <nav class="space-x-6 space-x-reverse">
            <a href="/" class="text-slate-300 hover:text-emerald-400 font-medium transition duration-200">صفحه اصلی</a>
            <a href="/contact" class="text-slate-300 hover:text-emerald-400 font-medium transition duration-200">تماس با من</a>
        </nav>
    </header>

    <!-- محتوای صفحات مختلف اینجا تزریق می‌شود -->
    <main class="flex-grow flex items-center justify-center px-4 py-12">
        @yield('content')
    </main>

    <!-- فوتر مشترک -->
    <footer class="bg-slate-900/50 border-t border-slate-800/80 py-4 text-center text-xs text-slate-500">
        تمامی حقوق محفوظ است &copy; ۱۴۰۵
    </footer>

    @yield('scripts')
</body>
</html>