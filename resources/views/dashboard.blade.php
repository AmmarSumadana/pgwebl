@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white">👋 Selamat Datang di Dashboard</h2>
    <p class="mt-3 text-lg text-gray-600 dark:text-gray-400">
        Kelola dan analisis data geospasial Anda dengan efisien dan intuitif.
    </p>
@endsection

@section('content')
    <div class="py-12 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Statistik -->
            <div class="flex flex-col space-y-6 max-w-md mx-auto mb-10">
                @foreach ([['label' => 'Data Proyek', 'value' => 12, 'icon' => '📁', 'color' => 'from-blue-400 to-blue-600'],
                          ['label' => 'Pengguna', 'value' => 5, 'icon' => '👤', 'color' => 'from-green-400 to-green-600'],
                          ['label' => 'Analisis', 'value' => 8, 'icon' => '📊', 'color' => 'from-purple-400 to-purple-600'],
                          ['label' => 'Laporan', 'value' => 3, 'icon' => '📝', 'color' => 'from-pink-400 to-pink-600']] as $stat)
                    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6 flex items-center space-x-6">
                        <div class="flex-shrink-0 w-16 h-16 rounded-full bg-gradient-to-br {{ $stat['color'] }} text-white text-4xl flex items-center justify-center shadow-lg">
                            {{ $stat['icon'] }}
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">{{ $stat['label'] }}</h3>
                            <p class="text-4xl font-extrabold text-gray-900 dark:text-white mt-1">{{ $stat['value'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Aksi Cepat -->
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">🚀 Aksi Cepat</h3>
                <button id="toggleDark"
                        class="ml-4 px-4 py-2 rounded-lg bg-gray-300 dark:bg-gray-700 text-sm hover:shadow transition transform hover:scale-105">
                    Toggle Mode 🌗
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([
                    [
                        'title' => 'Tambah Data Baru',
                        'desc' => 'Input data spasial ke dalam peta.',
                        'url' => route('map'),
                        'btn' => 'Tambah',
                        'icon' => '➕',
                    ],
                    [
                        'title' => 'Lihat Table',
                        'desc' => 'Tinjau data spasial dalam bentuk tabel.',
                        'url' => route('table'),
                        'btn' => 'Lihat',
                        'icon' => '📋',
                    ],
                    [
                        'title' => 'Database',
                        'desc' => 'Kelola dan akses data spasial (Points, Polylines, Polygons).',
                        'url' => route('api.points'),
                        'btn' => 'Buka',
                        'icon' => '🗄️',
                    ],
                ] as $action)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow hover:shadow-lg transform transition-transform hover:scale-[1.02]">
                        <h4 class="text-xl font-medium text-gray-900 dark:text-white mb-2">
                            {{ $action['icon'] }} {{ $action['title'] }}
                        </h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $action['desc'] }}</p>
                        <a href="{{ $action['url'] }}"
                           class="inline-block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            {{ $action['btn'] }}
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Loading Placeholder -->
            <div class="mt-12 animate-pulse">
                <div class="h-6 bg-gray-300 dark:bg-gray-700 rounded w-1/2 mb-2"></div>
                <div class="h-4 bg-gray-300 dark:bg-gray-700 rounded w-1/3"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleDark = document.getElementById('toggleDark');

        if (toggleDark) {
            toggleDark.onclick = () => {
                document.documentElement.classList.toggle('dark');
                localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
            };
        }

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });
</script>
@endpush
