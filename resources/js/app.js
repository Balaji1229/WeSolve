// Theme Toggle
function initThemeToggle() {
    const toggleBtn = document.getElementById('theme-toggle');
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');
    const adminToggleBtn = document.getElementById('admin-theme-toggle');
    const adminSunIcon = document.getElementById('admin-sun-icon');
    const adminMoonIcon = document.getElementById('admin-moon-icon');

    function updateIcons(isDark) {
        if (sunIcon && moonIcon) {
            if (isDark) {
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            } else {
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            }
        }
        if (adminSunIcon && adminMoonIcon) {
            if (isDark) {
                adminSunIcon.classList.remove('hidden');
                adminMoonIcon.classList.add('hidden');
            } else {
                adminSunIcon.classList.add('hidden');
                adminMoonIcon.classList.remove('hidden');
            }
        }
    }

    function toggleTheme() {
        const isDark = !document.documentElement.classList.contains('dark');
        document.documentElement.classList.toggle('dark', isDark);
        document.documentElement.classList.toggle('light', !isDark);
        document.body.classList.toggle('dark', isDark);
        document.body.classList.toggle('light', !isDark);
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        updateIcons(isDark);
    }

    // Initialize theme from localStorage or default to light
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        const isDark = savedTheme === 'dark';
        document.documentElement.classList.toggle('dark', isDark);
        document.documentElement.classList.toggle('light', !isDark);
        document.body.classList.toggle('dark', isDark);
        document.body.classList.toggle('light', !isDark);
        updateIcons(isDark);
    } else {
        // Default to light theme
        document.documentElement.classList.remove('dark');
        document.documentElement.classList.add('light');
        document.body.classList.remove('dark');
        document.body.classList.add('light');
        updateIcons(false);
    }

    if (toggleBtn) {
        toggleBtn.addEventListener('click', toggleTheme);
    }
    if (adminToggleBtn) {
        adminToggleBtn.addEventListener('click', toggleTheme);
    }
}

// Mobile Menu Toggle
function initMobileMenu() {
    const menuBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');

    if (!menuBtn || !mobileMenu) return;

    function updateMenuIcon(isOpen) {
        if (openIcon && closeIcon) {
            if (isOpen) {
                openIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                openIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }
        menuBtn.setAttribute('aria-label', isOpen ? 'Close mobile menu' : 'Open mobile menu');
    }

    function closeMenu() {
        menuBtn.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.add('hidden');
        updateMenuIcon(false);
        document.body.style.overflow = '';
    }

    function openMenu() {
        menuBtn.setAttribute('aria-expanded', 'true');
        mobileMenu.classList.remove('hidden');
        updateMenuIcon(true);
        document.body.style.overflow = 'hidden';
    }

    menuBtn.addEventListener('click', () => {
        const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true';
        if (isExpanded) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    // Close menu when clicking a link
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
            closeMenu();
            menuBtn.focus();
        }
    });
}

// Services Dropdown
function initServicesDropdown() {
    const dropdownLink = document.getElementById('services-dropdown-link');
    const dropdownMenu = document.getElementById('services-dropdown-menu');

    if (!dropdownLink || !dropdownMenu) return;

    let timeoutId = null;

    function openDropdown() {
        clearTimeout(timeoutId);
        dropdownLink.setAttribute('aria-expanded', 'true');
        dropdownMenu.classList.remove('hidden');
    }

    function closeDropdown() {
        timeoutId = setTimeout(() => {
            dropdownLink.setAttribute('aria-expanded', 'false');
            dropdownMenu.classList.add('hidden');
        }, 150);
    }

    dropdownLink.addEventListener('mouseenter', openDropdown);
    dropdownLink.addEventListener('focus', openDropdown);
    dropdownMenu.addEventListener('mouseenter', openDropdown);

    dropdownLink.addEventListener('mouseleave', closeDropdown);
    dropdownMenu.addEventListener('mouseleave', closeDropdown);

    // Keyboard navigation
    dropdownLink.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            const isExpanded = dropdownLink.getAttribute('aria-expanded') === 'true';
            if (isExpanded) {
                closeDropdown();
            } else {
                openDropdown();
                const firstItem = dropdownMenu.querySelector('a');
                if (firstItem) firstItem.focus();
            }
        }
        if (e.key === 'Escape') {
            closeDropdown();
            dropdownLink.focus();
        }
    });

    // Allow tabbing through dropdown items
    dropdownMenu.addEventListener('keydown', (e) => {
        const items = Array.from(dropdownMenu.querySelectorAll('a'));
        const currentIndex = items.indexOf(document.activeElement);

        if (e.key === 'Escape') {
            e.preventDefault();
            closeDropdown();
            dropdownLink.focus();
        }

        if (e.key === 'Tab' && !e.shiftKey && currentIndex === items.length - 1) {
            closeDropdown();
        }

        if (e.key === 'Tab' && e.shiftKey && currentIndex === 0) {
            closeDropdown();
        }
    });

    // Close when clicking outside
    document.addEventListener('click', (e) => {
        if (!dropdownLink.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownLink.setAttribute('aria-expanded', 'false');
            dropdownMenu.classList.add('hidden');
        }
    });
}

// Skip link focus handling
function initSkipLink() {
    const skipLink = document.getElementById('skip-to-content');
    const mainContent = document.getElementById('main-content');

    if (skipLink && mainContent) {
        skipLink.addEventListener('click', (e) => {
            e.preventDefault();
            mainContent.setAttribute('tabindex', '-1');
            mainContent.focus();
            mainContent.scrollIntoView({ behavior: 'smooth' });
        });
    }
}

// Project Image Carousel
function initProjectCarousel() {
    document.querySelectorAll('.project-card').forEach(card => {
        const images = card.querySelectorAll('.project-img');
        const dots = card.querySelectorAll('.project-dot');
        const prevBtn = card.querySelector('.project-carousel-btn.prev');
        const nextBtn = card.querySelector('.project-carousel-btn.next');

        if (!images.length) return;

        let currentIndex = 0;
        const total = images.length;

        function showImage(index) {
            images.forEach((img, i) => {
                if (i === index) {
                    img.classList.remove('hidden');
                    img.classList.add('active');
                } else {
                    img.classList.add('hidden');
                    img.classList.remove('active');
                }
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            currentIndex = index;
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                showImage((currentIndex - 1 + total) % total);
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                showImage((currentIndex + 1) % total);
            });
        }

        dots.forEach((dot, i) => {
            dot.addEventListener('click', (e) => {
                e.stopPropagation();
                showImage(i);
            });
        });
    });
}

// Testimonials Slider
function initTestimonialSlider() {
    const track = document.getElementById('testimonial-slides');
    const prevBtn = document.getElementById('testimonial-prev');
    const nextBtn = document.getElementById('testimonial-next');
    const dots = document.querySelectorAll('.testimonial-dot');

    if (!track) return;

    const slides = track.querySelectorAll('.testimonial-slide');
    const total = slides.length;
    let currentIndex = 0;
    let autoPlayInterval = null;

    function goToSlide(index) {
        if (index < 0) index = total - 1;
        if (index >= total) index = 0;

        track.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
        currentIndex = index;
    }

    function nextSlide() {
        goToSlide(currentIndex + 1);
    }

    function prevSlide() {
        goToSlide(currentIndex - 1);
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoPlay();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoPlay();
        });
    }

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            goToSlide(i);
            resetAutoPlay();
        });
    });

    // Auto-play every 5 seconds
    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 5000);
    }

    function resetAutoPlay() {
        clearInterval(autoPlayInterval);
        startAutoPlay();
    }

    // Pause on hover
    const slider = document.querySelector('.testimonial-slider');
    if (slider) {
        slider.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
        slider.addEventListener('mouseleave', startAutoPlay);
    }

    startAutoPlay();
}

// AI Chatbot Widget
function initChatbotWidget() {
    const widget = document.getElementById('ai-chatbot-widget');
    const toggleBtn = document.getElementById('chatbot-toggle');
    const closeBtn = document.getElementById('chatbot-close');
    const panel = document.getElementById('chatbot-panel');
    const openIcon = document.getElementById('chatbot-icon-open');
    const closeIcon = document.getElementById('chatbot-icon-close');
    const messagesContainer = document.getElementById('chatbot-messages');
    const form = document.getElementById('chatbot-form');
    const input = document.getElementById('chatbot-input');
    const typingIndicator = document.getElementById('chatbot-typing');

    if (!widget || !toggleBtn || !panel) return;

    const config = window.chatbotConfig || { endpoint: '/chatbot/message', csrfToken: '' };

    function updateIcons(isOpen) {
        if (openIcon && closeIcon) {
            openIcon.classList.toggle('hidden', isOpen);
            closeIcon.classList.toggle('hidden', !isOpen);
        }
    }

    function openPanel() {
        panel.classList.remove('hidden');
        panel.classList.add('flex');
        toggleBtn.setAttribute('aria-expanded', 'true');
        toggleBtn.setAttribute('aria-label', 'Close chat assistant');
        updateIcons(true);
        input.focus();
    }

    function closePanel() {
        panel.classList.add('hidden');
        panel.classList.remove('flex');
        toggleBtn.setAttribute('aria-expanded', 'false');
        toggleBtn.setAttribute('aria-label', 'Open chat assistant');
        updateIcons(false);
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function linkify(text) {
        const urlRegex = /(https?:\/\/[^\s<]+)/g;
        return text.replace(urlRegex, (rawUrl) => {
            let url = rawUrl;
            const trailing = new Set(['.', ',', ';', '!', '?', ')', ']', '>', '"', "'", '`']);
            let stripped = '';

            while (url.length > 0 && trailing.has(url[url.length - 1])) {
                stripped = url[url.length - 1] + stripped;
                url = url.slice(0, -1);
            }

            if (url.length === 0) {
                return rawUrl;
            }

            return `<a href="${url}" target="_blank" rel="noopener noreferrer" class="underline hover:text-[#00B6DA]">${url}</a>${stripped}`;
        });
    }

    // Render assistant replies with light formatting: **bold**, bullet lists, and
    // spaced paragraphs. Input is escaped first, so output is safe.
    function formatAssistant(text) {
        const escaped = escapeHtml(text);
        const inline = (s) => linkify(s.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>'));
        const lines = escaped.split('\n');
        let html = '';
        let inList = false;

        lines.forEach((raw) => {
            const line = raw.trim();
            const bullet = line.match(/^[-*•]\s+(.*)$/);

            if (bullet) {
                if (!inList) { html += '<ul class="list-disc pl-5 space-y-1 my-1.5">'; inList = true; }
                html += `<li>${inline(bullet[1])}</li>`;
            } else {
                if (inList) { html += '</ul>'; inList = false; }
                if (line !== '') {
                    html += `<p class="my-1.5 first:mt-0 last:mb-0 leading-relaxed">${inline(line)}</p>`;
                }
            }
        });

        if (inList) html += '</ul>';
        return html;
    }

    function appendMessage(role, text, isFallback = false) {
        const wrapper = document.createElement('div');
        wrapper.className = `chatbot-message ${role} flex gap-3 mb-3`;

        const isAssistant = role === 'assistant';
        const avatar = document.createElement('div');
        avatar.className = `flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full ${isAssistant ? 'bg-gradient-to-r from-[#305CDE] to-[#00B6DA]' : 'bg-gray-200 dark:bg-gray-700'}`;
        avatar.innerHTML = isAssistant
            ? '<svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M19 9l1.25-2.75L23 5l-2.75-1.25L19 1l-1.25 2.75L15 5l2.75 1.25L19 9zm-7.5.5L9 4 6.5 9.5 1 12l5.5 2.5L9 20l2.5-5.5L17 12l-5.5-2.5zM19 15l-1.25 2.75L15 19l2.75 1.25L19 23l1.25-2.75L23 19l-2.75-1.25L19 15z"/></svg>'
            : '<svg class="h-4 w-4 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>';

        const bubble = document.createElement('div');
        bubble.className = `max-w-[80%] rounded-2xl px-4 py-2.5 text-sm shadow-sm ${isAssistant ? 'rounded-tl-none bg-card text-muted' : 'rounded-tr-none bg-gradient-to-r from-[#305CDE] to-[#00B6DA] text-white whitespace-pre-wrap'}`;
        bubble.innerHTML = isAssistant ? formatAssistant(text) : escapeHtml(text);

        if (isAssistant) {
            wrapper.appendChild(avatar);
            wrapper.appendChild(bubble);
        } else {
            wrapper.appendChild(bubble);
            wrapper.appendChild(avatar);
        }

        messagesContainer.appendChild(wrapper);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    function setTyping(show) {
        typingIndicator.classList.toggle('hidden', !show);
        if (show) {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
    }

    async function sendMessage(text) {
        appendMessage('user', text);
        setTyping(true);
        input.value = '';
        input.disabled = true;

        try {
            const response = await fetch(config.endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': config.csrfToken,
                },
                body: JSON.stringify({ message: text }),
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();
            appendMessage('assistant', data.reply || 'Sorry, I did not understand that.', data.fallback === true);
        } catch (error) {
            console.error('Chatbot error:', error);
            appendMessage('assistant', 'Sorry, something went wrong. Please try again later.');
        } finally {
            setTyping(false);
            input.disabled = false;
            input.focus();
        }
    }

    toggleBtn.addEventListener('click', () => {
        const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
        if (isExpanded) {
            closePanel();
        } else {
            openPanel();
        }
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', closePanel);
    }

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const text = input.value.trim();
        if (!text) return;
        sendMessage(text);
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && toggleBtn.getAttribute('aria-expanded') === 'true') {
            closePanel();
            toggleBtn.focus();
        }
    });

    document.addEventListener('click', (e) => {
        if (
            toggleBtn.getAttribute('aria-expanded') === 'true' &&
            !widget.contains(e.target)
        ) {
            closePanel();
        }
    });
}

// Contact form: "Others" service toggle + fast AJAX submit
function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    const serviceSelect = document.getElementById('service');
    const otherWrap = document.getElementById('service-other-wrap');
    const otherInput = document.getElementById('service_other');
    const status = document.getElementById('contact-status');
    const submitBtn = document.getElementById('contact-submit');
    const spinner = document.getElementById('contact-spinner');
    const submitText = document.getElementById('contact-submit-text');

    // Toggle the custom requirement field when "Others" is chosen.
    function toggleOther() {
        if (!serviceSelect || !otherWrap) return;
        const isOther = serviceSelect.value === 'Others';
        otherWrap.classList.toggle('hidden', !isOther);
        if (otherInput) otherInput.required = isOther;
        if (!isOther && otherInput) otherInput.value = '';
    }
    if (serviceSelect) {
        serviceSelect.addEventListener('change', toggleOther);
        toggleOther();
    }

    function showStatus(message, ok) {
        if (!status) return;
        status.textContent = message;
        status.className = 'mb-6 rounded-xl px-4 py-3 text-sm border ' + (ok
            ? 'bg-green-500/10 border-green-500/20 text-green-400'
            : 'bg-red-500/10 border-red-500/20 text-red-400');
        status.classList.remove('hidden');
        status.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function clearFieldErrors() {
        form.querySelectorAll('.field-error').forEach((el) => el.remove());
        form.querySelectorAll('[data-invalid]').forEach((el) => el.removeAttribute('data-invalid'));
    }

    function showFieldError(field, message) {
        const input = form.querySelector(`[name="${field}"]`);
        if (!input) return;
        input.setAttribute('data-invalid', 'true');
        const p = document.createElement('p');
        p.className = 'field-error mt-1 text-sm text-red-400';
        p.textContent = message;
        input.parentNode.appendChild(p);
    }

    function setLoading(isLoading) {
        submitBtn.disabled = isLoading;
        submitBtn.classList.toggle('opacity-70', isLoading);
        submitBtn.classList.toggle('cursor-not-allowed', isLoading);
        // Hide the label while submitting so the spinner sits centered in the button.
        if (spinner) spinner.classList.toggle('hidden', !isLoading);
        if (submitText) submitText.classList.toggle('hidden', isLoading);
    }

    let submitting = false;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (submitting) return; // prevent duplicate submissions
        submitting = true;
        setLoading(true);
        clearFieldErrors();
        if (status) status.classList.add('hidden');

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                },
                body: new FormData(form),
            });

            if (response.ok) {
                const data = await response.json();
                form.reset();
                toggleOther();
                showStatus(data.message || 'Thank you! Your message has been sent.', true);
            } else if (response.status === 422) {
                const data = await response.json();
                const errors = data.errors || {};
                Object.keys(errors).forEach((field) => showFieldError(field, errors[field][0]));
                showStatus('Please check the highlighted fields and try again.', false);
            } else {
                throw new Error('Unexpected response ' + response.status);
            }
        } catch (err) {
            console.error('Contact form error:', err);
            showStatus('Something went wrong. Please try again or reach us on WhatsApp.', false);
        } finally {
            submitting = false;
            setLoading(false);
        }
    });
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    initThemeToggle();
    initMobileMenu();
    initServicesDropdown();
    initSkipLink();
    initProjectCarousel();
    initTestimonialSlider();
    initChatbotWidget();
    initContactForm();
});
