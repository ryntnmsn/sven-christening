<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin sign in | Sveringhoy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-[#f7f3ed] px-5 py-10 font-sans text-[#35261c] antialiased">
    <main class="w-full max-w-sm">
        <section class="rounded-2xl border border-[#e8ded2] bg-white p-7 shadow-[0_16px_50px_rgba(78,54,35,0.09)] sm:p-9">
            <form method="POST" action="{{ route('admin.login.store') }}" class="grid gap-5">
                @csrf
                <div class="grid gap-2">
                    <label for="email" class="text-sm font-medium text-[#594536]">Email address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="min-h-12 w-full rounded-xl border border-[#e5d9cb] bg-white px-4 text-sm outline-none transition placeholder:text-[#ad9d8d] focus:border-[#9a7655] focus:ring-4 focus:ring-[#9a7655]/10" placeholder="admin@example.com" aria-describedby="email-error">
                    @error('email')<p id="email-error" class="text-sm text-rose-700">{{ $message }}</p>@enderror
                </div>
                <div class="grid gap-2">
                    <label for="password" class="text-sm font-medium text-[#594536]">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password" class="min-h-12 w-full rounded-xl border border-[#e5d9cb] bg-white px-4 text-sm outline-none transition placeholder:text-[#ad9d8d] focus:border-[#9a7655] focus:ring-4 focus:ring-[#9a7655]/10" placeholder="Enter your password">
                </div>
                <label class="flex items-center justify-center gap-2.5 text-sm text-[#78695c]">
                    <input type="checkbox" name="remember" value="1" class="size-4 rounded border-[#d8caba] accent-[#78583d]">
                    Keep me signed in
                </label>
                <button type="submit" class="inline-flex min-h-12 w-full items-center justify-center rounded-xl bg-[#5a3e2b] px-5 text-sm font-semibold text-white transition hover:bg-[#704d35] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#9a7655]">Sign in</button>
            </form>
            <p class="mt-6 text-center text-xs text-[#978879]">Admin access only</p>
        </section>
        <a href="{{ route('home') }}" class="mt-5 block text-center text-sm text-[#78695c] transition hover:text-[#5a3e2b]">← Back to invitation</a>
    </main>
</body>
</html>


