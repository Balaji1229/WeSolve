@extends('layouts.app')

@section('title', 'Contact Us - WeSolve Technologies')

@section('content')
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Get In Touch</span>
        <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Contact <span class="gradient-text">Us</span>
        </h1>
        <p class="mt-6 text-lg text-secondary max-w-2xl mx-auto">
            We'd love to hear from you
        </p>
    </div>
</section>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="glass-card p-8" data-aos="fade-right">
                <h2 class="text-2xl font-bold text-primary mb-6" style="font-family: 'Space Grotesk', sans-serif;">Send us a Message</h2>

                @if(session('success'))
                <div class="mb-6 rounded-xl bg-green-500/10 border border-green-500/20 px-4 py-3 text-green-400 text-sm">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-secondary mb-2">Name <span class="text-red-400">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full input-bg rounded-xl px-4 py-3 text-sm transition" placeholder="Your name">
                        @error('name')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-secondary mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full input-bg rounded-xl px-4 py-3 text-sm transition" placeholder="your@email.com">
                        @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-secondary mb-2">Phone <span class="text-red-400">*</span></label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required class="w-full input-bg rounded-xl px-4 py-3 text-sm transition" placeholder="+1 234 567 890">
                        @error('phone')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="service" class="block text-sm font-medium text-secondary mb-2">Service Interested In</label>
                        <select name="service" id="service" class="w-full input-bg rounded-xl px-4 py-3 text-sm text-primary transition appearance-none bg-white dark:bg-gray-900">
                            <option value="" style="background-color: white; color: #111827;" class="dark:!bg-gray-900 dark:!text-white">Select a service</option>
                            <option value="Website Development" {{ old('service') == 'Website Development' ? 'selected' : '' }} style="background-color: white; color: #111827;" class="dark:!bg-gray-900 dark:!text-white">Website Development</option>
                            <option value="Web App Development" {{ old('service') == 'Web App Development' ? 'selected' : '' }} style="background-color: white; color: #111827;" class="dark:!bg-gray-900 dark:!text-white">Web App Development</option>
                            <option value="SEO Optimization" {{ old('service') == 'SEO Optimization' ? 'selected' : '' }} style="background-color: white; color: #111827;" class="dark:!bg-gray-900 dark:!text-white">SEO Optimization</option>
                            <option value="Website Maintenance" {{ old('service') == 'Website Maintenance' ? 'selected' : '' }} style="background-color: white; color: #111827;" class="dark:!bg-gray-900 dark:!text-white">Website Maintenance</option>
                            <option value="Landing Page" {{ old('service') == 'Landing Page' ? 'selected' : '' }} style="background-color: white; color: #111827;" class="dark:!bg-gray-900 dark:!text-white">Landing Page Creation</option>
                            <option value="Business Website" {{ old('service') == 'Business Website' ? 'selected' : '' }} style="background-color: white; color: #111827;" class="dark:!bg-gray-900 dark:!text-white">Business Website Setup</option>
                        </select>
                        @error('service')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-secondary mb-2">Message</label>
                        <textarea name="message" id="message" rows="4" required class="w-full input-bg rounded-xl px-4 py-3 text-sm transition" placeholder="Tell us about your project...">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full btn-gradient">Send Message</button>
                </form>
            </div>

            <div class="space-y-8" data-aos="fade-left">
                <div class="glass-card p-8">
                    <h2 class="text-2xl font-bold text-primary mb-6" style="font-family: 'Space Grotesk', sans-serif;">Contact Information</h2>
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 h-10 w-10 rounded-xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 flex items-center justify-center">
                                <svg class="h-5 w-5 text-[#305CDE]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-primary font-medium text-sm">Email</h3>
                                <p class="text-secondary text-sm">{{ $contactInfo['email'] }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 h-10 w-10 rounded-xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 flex items-center justify-center">
                                <svg class="h-5 w-5 text-[#00B6DA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-primary font-medium text-sm">Phone</h3>
                                <p class="text-secondary text-sm">{{ $contactInfo['phone'] }}</p>
                            </div>
                        </div>
                        @if($contactInfo['address'])
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 h-10 w-10 rounded-xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 flex items-center justify-center">
                                <svg class="h-5 w-5 text-[#00B6DA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-primary font-medium text-sm">Address</h3>
                                <p class="text-secondary text-sm">{{ $contactInfo['address'] }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="rounded-2xl p-8 bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 text-center">
                    <h3 class="text-xl font-bold text-primary mb-2" style="font-family: 'Space Grotesk', sans-serif;">Chat on WhatsApp</h3>
                    <p class="text-secondary text-sm mb-6">Get instant responses</p>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactInfo['whatsapp']) }}" target="_blank" class="btn-gradient">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Message Us
                        </span>
                    </a>
                </div>

                {{-- Supported Languages --}}
                <div class="glass-card p-8" data-aos="fade-up" data-aos-delay="150">
                    <h2 class="text-2xl font-bold text-primary mb-6" style="font-family: 'Space Grotesk', sans-serif;">Supported Languages</h2>
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 h-10 w-10 rounded-xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 flex items-center justify-center">
                                <svg class="h-5 w-5 text-[#305CDE]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-primary font-medium text-sm">English</h3>
                                <p class="text-secondary text-sm">Global · Business Communication</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 h-10 w-10 rounded-xl bg-gradient-to-br from-orange-500/20 to-[#00B6DA]/20 border border-orange-500/20 flex items-center justify-center">
                                <svg class="h-5 w-5 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-primary font-medium text-sm" lang="ta">தமிழ்</h3>
                                <p class="text-secondary text-sm">Native Tamil Support</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="mt-6 pt-5 border-t border-theme-light">
                        <p class="text-sm text-muted leading-relaxed">
                            We communicate comfortably in <strong class="text-secondary">English</strong> and <strong class="text-secondary" lang="ta">தமிழ்</strong> to provide better support for our customers.
                        </p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
