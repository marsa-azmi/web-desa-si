<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('desa.nama') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dots flex min-h-screen items-center justify-center p-6">
  <div class="card max-w-xl p-8 text-center">
    <span class="badge bg-sage">Selamat datang</span>
    <h1 class="mt-4 text-4xl font-black">{{ config('desa.nama') }}</h1>
    <p class="mt-2 text-ink/70">Portal Desa Digital</p>
    <a href="#" class="btn-primary mt-6">Mulai</a>
  </div>
</body></html>
