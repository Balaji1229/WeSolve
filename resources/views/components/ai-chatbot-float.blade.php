<div id="ai-chatbot-widget" class="fixed bottom-5 left-5 z-[9999] font-sans" aria-live="polite">
    <style>
        @keyframes chatbot-float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        .animate-float {
            animation: chatbot-float 3s ease-in-out infinite;
        }
        .animate-float:hover {
            animation-play-state: paused;
        }
    </style>

    {{-- Toggle Button --}}
    <div class="relative group">
        <span class="absolute inset-0 rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] opacity-75 animate-ping"></span>
        <button
            id="chatbot-toggle"
            type="button"
            class="relative flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] text-white shadow-lg shadow-[#305CDE]/40 ring-4 ring-white/20 transition-all duration-300 hover:scale-110 hover:shadow-[#305CDE]/60 hover:ring-white/40 focus:outline-none focus:ring-4 focus:ring-[#305CDE]/50 focus:ring-offset-2 focus:ring-offset-body animate-float"
            aria-label="Open chat assistant"
            aria-expanded="false"
            aria-controls="chatbot-panel"
        >
            <svg id="chatbot-icon-open" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M19 9l1.25-2.75L23 5l-2.75-1.25L19 1l-1.25 2.75L15 5l2.75 1.25L19 9zm-7.5.5L9 4 6.5 9.5 1 12l5.5 2.5L9 20l2.5-5.5L17 12l-5.5-2.5zM19 15l-1.25 2.75L15 19l2.75 1.25L19 23l1.25-2.75L23 19l-2.75-1.25L19 15z"/>
            </svg>
            <svg id="chatbot-icon-close" class="hidden h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <span class="absolute -top-1 -right-1 flex h-4 w-4">
            <span class="absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75 animate-ping"></span>
            <span class="relative inline-flex h-4 w-4 rounded-full bg-green-500"></span>
        </span>
        <span class="absolute left-full top-1/2 ml-3 -translate-y-1/2 whitespace-nowrap rounded-lg bg-[#305CDE] px-3 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-opacity duration-300 group-hover:opacity-100 pointer-events-none hidden sm:block">
            Chat with us
            <span class="absolute left-0 top-1/2 -translate-x-1 -translate-y-1/2 border-4 border-transparent border-r-[#305CDE]"></span>
        </span>
    </div>

    {{-- Chat Panel --}}
    <div
        id="chatbot-panel"
        class="hidden absolute bottom-20 left-0 w-[calc(100vw-2.5rem)] sm:w-96 flex-col overflow-hidden rounded-2xl border border-white/10 bg-body/95 shadow-2xl backdrop-blur-xl"
        role="dialog"
        aria-label="Chat assistant"
        aria-modal="true"
    >
        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-white/10 bg-gradient-to-r from-[#305CDE] to-[#00B6DA] px-4 py-3">
            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20">
                    <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M19 9l1.25-2.75L23 5l-2.75-1.25L19 1l-1.25 2.75L15 5l2.75 1.25L19 9zm-7.5.5L9 4 6.5 9.5 1 12l5.5 2.5L9 20l2.5-5.5L17 12l-5.5-2.5zM19 15l-1.25 2.75L15 19l2.75 1.25L19 23l1.25-2.75L23 19l-2.75-1.25L19 15z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-white">WeSolve AI Assistant</h3>
                    <p class="text-xs text-white/80">Powered by Gemini</p>
                </div>
            </div>
            <button
                id="chatbot-close"
                type="button"
                class="rounded-lg p-1.5 text-white/80 transition hover:bg-white/10 hover:text-white"
                aria-label="Close chat assistant"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Messages --}}
        <div id="chatbot-messages" class="flex-1 overflow-y-auto bg-body/50 p-4" style="max-height: 380px; min-height: 300px;">
            <div class="chatbot-message assistant flex gap-3">
                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA]">
                    <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M19 9l1.25-2.75L23 5l-2.75-1.25L19 1l-1.25 2.75L15 5l2.75 1.25L19 9zm-7.5.5L9 4 6.5 9.5 1 12l5.5 2.5L9 20l2.5-5.5L17 12l-5.5-2.5zM19 15l-1.25 2.75L15 19l2.75 1.25L19 23l1.25-2.75L23 19l-2.75-1.25L19 15z"/>
                    </svg>
                </div>
                <div class="max-w-[80%] rounded-2xl rounded-tl-none bg-card px-4 py-2.5 text-sm text-muted shadow-sm">
                    Hi 👋 Welcome to WeSolve Technologies! I'm your AI assistant. Tell me about your business and what you'd like to build — a website, an app, or digital marketing — and I'll guide you to the right solution. 😊
                </div>
            </div>
        </div>

        {{-- Typing Indicator --}}
        <div id="chatbot-typing" class="hidden px-4 pb-2">
            <div class="flex items-center gap-2 text-xs text-muted">
                <span class="flex gap-1">
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-[#305CDE]" style="animation-delay: 0s;"></span>
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-[#305CDE]" style="animation-delay: 0.15s;"></span>
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-[#305CDE]" style="animation-delay: 0.3s;"></span>
                </span>
                <span>Assistant is typing</span>
            </div>
        </div>

        {{-- Input --}}
        <form id="chatbot-form" class="flex items-center gap-2 border-t border-white/10 bg-body/80 p-3">
            <input
                id="chatbot-input"
                type="text"
                name="message"
                placeholder="Type your message..."
                class="input-bg flex-1 rounded-full border border-theme px-4 py-2.5 text-sm text-primary placeholder-muted focus:border-[#305CDE]/50 focus:outline-none"
                autocomplete="off"
                maxlength="2000"
            >
            <button
                type="submit"
                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] text-white shadow-md transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#305CDE]"
                aria-label="Send message"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    window.chatbotConfig = {
        endpoint: "{{ route('chatbot.message') }}",
        csrfToken: "{{ csrf_token() }}"
    };
</script>
@endpush
