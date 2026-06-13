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

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    initThemeToggle();
    initMobileMenu();
    initServicesDropdown();
    initSkipLink();
    initProjectCarousel();
    initTestimonialSlider();
});
