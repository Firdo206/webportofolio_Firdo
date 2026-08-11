<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name ?? 'Portfolio' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    <style>
        .skill-carousel-wrapper {
            width: 100%;
            overflow: hidden;
            padding: 40px 0;
            -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
            mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        }
        .skill-carousel {
            will-change: transform;
        }
        .skill-item {
            will-change: transform, opacity;
        }
        .skill-item.is-glow {
            border-color: rgba(168, 85, 247, 0.6);
            box-shadow: 0 0 30px rgba(139, 92, 246, 0.5);
        }
    </style>
</head>
<body class="bg-[#0a0a0f] text-white antialiased">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full z-50 bg-[#0a0a0f]/80 backdrop-blur-md border-b border-white/10">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="#home" class="font-bold text-lg tracking-wide">
                {{ collect(explode(' ', $profile->name ?? 'MHB'))->map(fn($w) => strtoupper($w[0]))->join('') }}
            </a>
            <div class="hidden md:flex items-center gap-8 text-sm text-gray-300">
                <a href="#home" class="hover:text-white transition">Home</a>
                <a href="#about" class="hover:text-white transition">About</a>
                <a href="#skills" class="hover:text-white transition">Skills</a>
                <a href="#experience" class="hover:text-white transition">Experience</a>
                <a href="#projects" class="hover:text-white transition">Projects</a>
                <a href="#contact" class="hover:text-white transition">Contact</a>
            </div>
        </div>
    </nav>

    {{-- HOME --}}
    <section id="home" class="min-h-screen flex items-center pt-24 relative overflow-hidden bg-gradient-to-br from-[#1a1030] via-[#0a0a0f] to-[#0a0a0f]">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(139,92,246,0.25),transparent_50%)]"></div>
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center relative z-10">
            <div>
                <span class="inline-block px-3 py-1 text-xs rounded-full bg-white/10 border border-white/10 mb-4">
                    Digital Creative Developer
                </span>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
                    Halo, saya <br>
                    <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        {{ $profile->name ?? 'Nama Kamu' }}
                    </span>
                </h1>
                <p class="text-gray-400 mb-6">{{ $profile->tagline ?? '' }}</p>

                <div class="flex gap-4 mb-6">
                    <a href="#projects" class="px-5 py-2.5 rounded-full bg-purple-600 hover:bg-purple-700 transition text-sm font-medium">
                        View Projects →
                    </a>
                    <a href="#contact" class="px-5 py-2.5 rounded-full border border-white/20 hover:bg-white/10 transition text-sm font-medium">
                        Contact Me
                    </a>
                </div>

                {{-- SOCIAL ICONS --}}
                <div class="flex gap-4">
                    @if($profile->github_url)
                    <a href="{{ $profile->github_url }}" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path d="M12 0C5.37 0 0 5.5 0 12.26c0 5.4 3.44 9.98 8.2 11.6.6.11.82-.27.82-.6v-2.1c-3.34.74-4.04-1.65-4.04-1.65-.55-1.42-1.34-1.8-1.34-1.8-1.1-.77.08-.75.08-.75 1.22.09 1.86 1.28 1.86 1.28 1.08 1.9 2.83 1.35 3.52 1.03.11-.8.42-1.35.76-1.66-2.67-.31-5.47-1.36-5.47-6.05 0-1.34.46-2.43 1.22-3.29-.12-.31-.53-1.56.12-3.25 0 0 1-.33 3.3 1.25a11.2 11.2 0 0 1 6 0c2.3-1.58 3.3-1.25 3.3-1.25.65 1.69.24 2.94.12 3.25.76.86 1.22 1.95 1.22 3.29 0 4.7-2.8 5.74-5.48 6.04.43.38.81 1.13.81 2.28v3.38c0 .33.22.72.83.6C20.56 22.24 24 17.66 24 12.26 24 5.5 18.63 0 12 0z"/>
                        </svg>
                    </a>
                    @endif
                    @if($profile->instagram_url)
                    <a href="{{ $profile->instagram_url }}" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41-.56-.22-.96-.48-1.38-.9-.42-.42-.68-.82-.9-1.38-.16-.42-.36-1.06-.41-2.23-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41 1.27-.06 1.65-.07 4.85-.07M12 0C8.74 0 8.33.01 7.05.07 5.78.13 4.9.33 4.14.63c-.79.31-1.46.72-2.13 1.38C1.35 2.68.94 3.35.63 4.14.33 4.9.13 5.78.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.06 1.27.26 2.15.56 2.91.31.79.72 1.46 1.38 2.13.66.66 1.33 1.07 2.13 1.38.76.3 1.64.5 2.91.56C8.33 23.99 8.74 24 12 24s3.67-.01 4.95-.07c1.27-.06 2.15-.26 2.91-.56.79-.31 1.46-.72 2.13-1.38.66-.66 1.07-1.33 1.38-2.13.3-.76.5-1.64.56-2.91.06-1.27.07-1.68.07-4.95s-.01-3.67-.07-4.95c-.06-1.27-.26-2.15-.56-2.91-.31-.79-.72-1.46-1.38-2.13C20.32 1.35 19.65.94 18.86.63c-.76-.3-1.64-.5-2.91-.56C15.67.01 15.26 0 12 0zm0 5.84A6.16 6.16 0 1 0 12 18.16 6.16 6.16 0 0 0 12 5.84zm0 10.16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.4-10.4a1.44 1.44 0 1 1-2.88 0 1.44 1.44 0 0 1 2.88 0z"/>
                        </svg>
                    </a>
                    @endif
                    @if($profile->whatsapp_number)
                    <a href="https://wa.me/{{ $profile->whatsapp_number }}" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path d="M17.5 14.4c-.3-.15-1.7-.85-2-.95-.27-.1-.46-.15-.66.15-.2.3-.76.95-.93 1.14-.17.2-.34.22-.64.07-.3-.15-1.26-.46-2.4-1.47-.9-.8-1.5-1.78-1.68-2.08-.17-.3-.02-.46.13-.61.14-.14.3-.34.45-.51.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.66-1.6-.9-2.19-.24-.58-.48-.5-.66-.5h-.56c-.2 0-.52.07-.79.37s-1.04 1.02-1.04 2.47 1.07 2.86 1.22 3.06c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.7-.7 1.94-1.37.24-.68.24-1.26.17-1.38-.07-.12-.27-.2-.57-.35z"/>
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 2.12.55 4.11 1.51 5.84L0 24l6.34-1.48A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12S18.63 0 12 0zm0 21.82c-1.87 0-3.61-.53-5.09-1.44l-.36-.22-3.76.88.9-3.66-.24-.38A9.8 9.8 0 0 1 2.18 12C2.18 6.58 6.58 2.18 12 2.18S21.82 6.58 21.82 12 17.42 21.82 12 21.82z"/>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>

            <div class="flex justify-center">
                <div class="w-64 h-80 rounded-3xl bg-gradient-to-br from-purple-500/30 to-pink-500/30 border border-white/10 flex items-center justify-center overflow-hidden">
                    @if($profile->photo)
                        <img src="{{ asset('storage/'.$profile->photo) }}" alt="{{ $profile->name }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-gray-500 text-sm">Foto belum diupload</span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section id="about" class="py-24 border-t border-white/5">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">About Me</h2>
            <p class="text-gray-400 leading-relaxed">
                {{ $profile->description ?? 'Deskripsi belum diisi.' }}
            </p>
        </div>
    </section>

    {{-- SKILLS --}}
    <section id="skills" class="py-24 border-t border-white/5 bg-white/[0.02] overflow-hidden">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-16">My Skills</h2>
        </div>

        <div class="skill-carousel-wrapper relative">
            <div class="skill-carousel flex items-center gap-6" id="skillCarousel">
                @forelse($skills->flatten() as $skill)
                    @php
                        $name = strtolower($skill->name);
                        $devicon = match($name) {
                            'laravel' => 'devicon-laravel-plain colored',
                            'php' => 'devicon-php-plain colored',
                            'mysql' => 'devicon-mysql-plain colored',
                            'flutter' => 'devicon-flutter-plain colored',
                            'javascript' => 'devicon-javascript-plain colored',
                            'tailwind css' => 'devicon-tailwindcss-plain colored',
                            'git & github', 'github', 'git' => 'devicon-github-original',
                            'figma' => 'devicon-figma-plain colored',
                            'react' => 'devicon-react-original colored',
                            'vue', 'vue.js' => 'devicon-vuejs-plain colored',
                            'html', 'html5' => 'devicon-html5-plain colored',
                            'css', 'css3' => 'devicon-css3-plain colored',
                            'python' => 'devicon-python-plain colored',
                            'nodejs', 'node.js' => 'devicon-nodejs-plain colored',
                            'firebase' => 'devicon-firebase-plain colored',
                            'bootstrap' => 'devicon-bootstrap-plain colored',
                            default => null,
                        };
                        $simpleiconSlug = match($name) {
                            'canva' => 'canva',
                            'whatsapp' => 'whatsapp',
                            'instagram' => 'instagram',
                            'notion' => 'notion',
                            'postman' => 'postman',
                            'vercel' => 'vercel',
                            'netlify' => 'netlify',
                            default => null,
                        };
                    @endphp
                    <div class="skill-item group relative flex-shrink-0 w-28 h-28 flex items-center justify-center rounded-3xl bg-white/5 border border-white/10"
                         data-name="{{ $skill->name }}">

                        <span class="absolute -top-9 left-1/2 -translate-x-1/2 whitespace-nowrap px-3 py-1 rounded-lg bg-black/90 border border-white/10 text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
                            {{ $skill->name }}
                        </span>

                        @if($devicon)
                            <i class="{{ $devicon }} text-6xl pointer-events-none"></i>
                        @elseif($simpleiconSlug)
                            <img src="https://cdn.jsdelivr.net/npm/simple-icons@latest/icons/{{ $simpleiconSlug }}.svg" alt="{{ $skill->name }}" class="w-12 h-12 pointer-events-none" style="filter: invert(1);">
                        @else
                            <span class="text-2xl font-bold text-purple-300 pointer-events-none">{{ substr($skill->name, 0, 2) }}</span>
                        @endif
                    </div>
                @empty
                    <p class="text-center text-gray-500 w-full">Belum ada skill ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- EXPERIENCE --}}
    <section id="experience" class="py-24 border-t border-white/5">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Experience</h2>
            <div class="space-y-6">
                @forelse($experiences as $exp)
                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10">
                        <div class="flex justify-between items-start flex-wrap gap-2 mb-2">
                            <h3 class="font-semibold text-lg">{{ $exp->title }}</h3>
                            <span class="text-xs px-3 py-1 rounded-full bg-purple-600/20 text-purple-300 capitalize">
                                {{ $exp->type }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-400 mb-2">
                            {{ $exp->place }} ·
                            {{ $exp->start_date?->format('M Y') }} -
                            {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Sekarang' }}
                        </p>
                        <p class="text-gray-400 text-sm">{{ $exp->description }}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Belum ada pengalaman ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- PROJECTS --}}
    <section id="projects" class="py-24 border-t border-white/5 bg-white/[0.02]">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Projects</h2>
            <div class="grid md:grid-cols-2 gap-6">
                @forelse($projects as $project)
                    <div class="rounded-2xl overflow-hidden bg-white/5 border border-white/10 hover:border-purple-400/40 transition">
                        <div class="h-40 bg-gradient-to-br from-purple-500/20 to-pink-500/20 flex items-center justify-center">
                            @if($project->image)
                                <img src="{{ asset('storage/'.$project->image) }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-gray-500 text-xs">Belum ada gambar</span>
                            @endif
                        </div>
                        <div class="p-5">
                            <h3 class="font-semibold text-lg mb-2">{{ $project->title }}</h3>
                            <p class="text-sm text-gray-400 mb-3">{{ $project->description }}</p>
                            <p class="text-xs text-purple-300 mb-4">{{ $project->tech_stack }}</p>
                            <div class="flex gap-3 text-sm">
                                @if($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" class="text-purple-400 hover:underline">Demo →</a>
                                @endif
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="text-gray-400 hover:underline">GitHub →</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-2">Belum ada project ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- CONTACT --}}
    <section id="contact" class="py-24 border-t border-white/5">
        <div class="max-w-2xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Contact Me</h2>
            <p class="text-gray-400 mb-8">Tertarik kolaborasi atau punya pertanyaan? Hubungi saya lewat salah satu kanal berikut.</p>
            <div class="flex justify-center flex-wrap gap-4">
                @if($profile->email)
                    <a href="mailto:{{ $profile->email }}" class="px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 transition text-sm">
                        {{ $profile->email }}
                    </a>
                @endif
                @if($profile->whatsapp_number)
                    <a href="https://wa.me/{{ $profile->whatsapp_number }}" target="_blank" class="px-5 py-2.5 rounded-full bg-green-600/80 hover:bg-green-600 transition text-sm">
                        WhatsApp
                    </a>
                @endif
            </div>
        </div>
    </section>

    <footer class="py-8 text-center text-xs text-gray-500 border-t border-white/5">
        © {{ date('Y') }} {{ $profile->name ?? '' }}. All rights reserved.
        <a href="{{ route('login') }}" class="ml-2 text-gray-700 hover:text-gray-500">•</a>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const track = document.getElementById('skillCarousel');
        if (!track) return;

        const items = Array.from(track.children).filter(el => el.classList.contains('skill-item'));
        if (items.length === 0) return;

        // duplikat item biar looping mulus (infinite scroll ilusi)
        items.forEach(item => track.appendChild(item.cloneNode(true)));
        const allItems = Array.from(track.children).filter(el => el.classList.contains('skill-item'));

        let position = 0;
        const speed = 0.4; // px per frame, atur kecepatan geser di sini
        const itemWidth = 112 + 24; // width item (w-28=112px) + gap-6 (24px)

        // seberapa jauh (dalam piksel) efek scale/opacity mulai meluruh dari tengah
        const falloffRange = itemWidth * 2.2;

        function animate() {
            position -= speed;

            // reset ke awal biar infinite loop mulus
            if (Math.abs(position) >= itemWidth * items.length) {
                position = 0;
            }

            track.style.transform = `translateX(${position}px)`;

            const screenCenter = window.innerWidth / 2;

            allItems.forEach(item => {
                const rect = item.getBoundingClientRect();
                const itemCenter = rect.left + rect.width / 2;
                const dist = Math.abs(screenCenter - itemCenter);

                // t = 0 pas di tengah, t = 1 saat udah jauh -> transisi jadi kontinu, bukan lompat antar state
                const t = Math.min(dist / falloffRange, 1);

                const scale = 1.25 - t * 0.5;   // 1.25 (tengah) -> 0.75 (jauh)
                const opacity = 1 - t * 0.6;    // 1 (tengah) -> 0.4 (jauh)

                item.style.transform = `scale(${scale})`;
                item.style.opacity = opacity;

                item.classList.toggle('is-glow', t < 0.12);
            });

            requestAnimationFrame(animate);
        }

        requestAnimationFrame(animate);
    });
    </script>

</body>
</html>