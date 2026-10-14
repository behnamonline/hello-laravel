@extends('layouts.app')

@section('title', 'تماس با من')

@section('content')
<div class="bg-slate-900/90 border border-slate-800 p-8 rounded-2xl shadow-2xl w-full max-w-md backdrop-blur-md">
    <h2 class="text-2xl font-bold text-slate-100 mb-2">تماس با من</h2>
    <p class="text-slate-400 text-sm mb-6">پیام خود را ارسال کنید، مستقیماً به تلگرام فرستاده می‌شود.</p>

    <!-- Alert Box -->
    <div id="alert-box" class="hidden p-3 rounded-xl mb-4 text-sm font-medium"></div>

    <form id="contact-form" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-1">نام شما</label>
            <input type="text" id="name" name="name" required placeholder="مثلا علی رضایی" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 text-slate-100 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none transition">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-1">متن پیام</label>
            <textarea id="message" name="message" rows="4" required placeholder="پیام خود را بنویسید..." class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 text-slate-100 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none transition"></textarea>
        </div>
        <button type="submit" id="submit-btn" class="w-full bg-emerald-500 text-slate-950 font-bold py-3 rounded-xl shadow-lg shadow-emerald-500/20 hover:bg-emerald-400 transition-all duration-200">ارسال پیام</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    const form = document.getElementById('contact-form');
    const alertBox = document.getElementById('alert-box');
    const submitBtn = document.getElementById('submit-btn');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        submitBtn.disabled = true;
        submitBtn.textContent = 'در حال ارسال...';
        alertBox.classList.add('hidden');

        const formData = {
            name: document.getElementById('name').value,
            message: document.getElementById('message').value
        };

        try {
            let response = await fetch('/api/msg', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            let result = await response.json();

            alertBox.classList.remove('hidden');
            if (response.ok) {
                alertBox.className = "p-3 rounded-xl mb-4 text-sm font-medium bg-emerald-950 text-emerald-400 border border-emerald-800/50";
                alertBox.textContent = result.message;
                form.reset();
            } else {
                alertBox.className = "p-3 rounded-xl mb-4 text-sm font-medium bg-rose-950 text-rose-400 border border-rose-800/50";
                alertBox.textContent = result.message || 'خطایی رخ داد.';
            }
        } catch (error) {
            alertBox.classList.remove('hidden');
            alertBox.className = "p-3 rounded-xl mb-4 text-sm font-medium bg-rose-950 text-rose-400 border border-rose-800/50";
            alertBox.textContent = 'خطا در ارتباط با سرور.';
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'ارسال پیام';
        }
    });
</script>
@endsection