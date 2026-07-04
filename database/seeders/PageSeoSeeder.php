<?php

namespace Database\Seeders;

use App\Models\PageSeo;
use Illuminate\Database\Seeder;

class PageSeoSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'page' => 'home',
                'meta_title' => 'Digital Marketing & Web Development Company in Chennai | WeSolve Technologies',
                'meta_description' => 'WeSolve Technologies helps businesses in Chennai grow online with SEO, web development, mobile apps, Google Ads, and digital marketing. Book a free consultation today.',
                'meta_keywords' => 'digital marketing company in Chennai, web development company in Chennai, SEO services Chennai, mobile app development Chennai, Google Ads management, website development services',
                'faqs' => [
                    [
                        'question' => 'Why choose WeSolve Technologies for digital marketing in Chennai?',
                        'answer' => 'We provide customized strategies focused on measurable business growth, quality leads, and long-term success. Our team combines local market knowledge with data-driven execution to deliver real results.',
                    ],
                    [
                        'question' => 'How long does SEO take to show results?',
                        'answer' => 'SEO results usually start becoming visible within 3–6 months depending on competition, industry, and the current state of your website. We focus on sustainable growth rather than short-term tricks.',
                    ],
                    [
                        'question' => 'Do you develop custom websites and applications?',
                        'answer' => 'Yes, we build custom websites, web applications, and mobile applications based on your business requirements. Every solution is tailored to your goals, audience, and budget.',
                    ],
                    [
                        'question' => 'Do you provide ongoing support?',
                        'answer' => 'Yes, we provide maintenance, updates, and continuous support for all projects. Our team is available to help you keep your digital assets secure, fast, and up to date.',
                    ],
                ],
            ],
            [
                'page' => 'about',
                'meta_title' => 'About Us - WeSolve Technologies',
                'meta_description' => 'Learn about WeSolve Technologies, a team of expert developers and designers dedicated to building affordable digital solutions.',
                'meta_keywords' => 'about us, digital agency, freelance developers, affordable solutions',
            ],
            [
                'page' => 'services',
                'meta_title' => 'Our Services - WeSolve Technologies',
                'meta_description' => 'Explore our comprehensive digital services including web development, app development, SEO, and more.',
                'meta_keywords' => 'services, web development, app development, SEO, digital marketing',
            ],
            [
                'page' => 'portfolio',
                'meta_title' => 'Developer Portfolio - WeSolve Technologies',
                'meta_description' => 'Browse our portfolio of successful projects and see how we help businesses grow online.',
                'meta_keywords' => 'portfolio, projects, web development portfolio, case studies',
            ],
            [
                'page' => 'blog',
                'meta_title' => 'Blog - WeSolve Technologies',
                'meta_description' => 'Read the latest insights, tips, and trends in web development, SEO, and digital marketing.',
                'meta_keywords' => 'blog, web development tips, SEO tips, digital marketing blog',
            ],
            [
                'page' => 'contact',
                'meta_title' => 'Contact Us - WeSolve Technologies',
                'meta_description' => 'Get in touch with WeSolve Technologies for your next project. We are here to help you succeed online.',
                'meta_keywords' => 'contact us, get in touch, freelance developers, hire developers',
            ],
            [
                'page' => 'developers',
                'meta_title' => 'Our Developers - Expert Team | WeSolve Technologies',
                'meta_description' => 'Meet the expert developers at WeSolve Technologies. Skilled PHP, Laravel, Flutter, Node.js, and Digital Marketing professionals.',
                'meta_keywords' => 'developers, PHP developers, Laravel developers, Flutter developers, Node.js developers, SEO specialists',
            ],
            [
                'page' => 'terms',
                'meta_title' => 'Terms & Conditions - WeSolve Technologies',
                'meta_description' => 'Read the Terms and Conditions of WeSolve Technologies. Learn about our payment terms, project agreements, revisions, confidentiality, and cancellation policies.',
                'meta_keywords' => 'terms and conditions, freelance terms, payment policy, project agreement',
            ],
        ];

        foreach ($pages as $page) {
            PageSeo::updateOrCreate(['page' => $page['page']], $page);
        }
    }
}
