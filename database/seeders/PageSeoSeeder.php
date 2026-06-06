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
                'meta_title' => 'Freelancers4U - Affordable Website & App Development',
                'meta_description' => 'Professional website development, web apps, SEO and maintenance services at affordable prices.',
                'meta_keywords' => 'website development, web app development, SEO, maintenance, affordable',
            ],
            [
                'page' => 'about',
                'meta_title' => 'About Us - Freelancers4U',
                'meta_description' => 'Learn about Freelancers4U, a team of expert developers and designers dedicated to building affordable digital solutions.',
                'meta_keywords' => 'about us, digital agency, freelance developers, affordable solutions',
            ],
            [
                'page' => 'services',
                'meta_title' => 'Our Services - Freelancers4U',
                'meta_description' => 'Explore our comprehensive digital services including web development, app development, SEO, and more.',
                'meta_keywords' => 'services, web development, app development, SEO, digital marketing',
            ],
            [
                'page' => 'portfolio',
                'meta_title' => 'Developer Portfolio - Freelancers4U',
                'meta_description' => 'Browse our portfolio of successful projects and see how we help businesses grow online.',
                'meta_keywords' => 'portfolio, projects, web development portfolio, case studies',
            ],
            [
                'page' => 'blog',
                'meta_title' => 'Blog - Freelancers4U',
                'meta_description' => 'Read the latest insights, tips, and trends in web development, SEO, and digital marketing.',
                'meta_keywords' => 'blog, web development tips, SEO tips, digital marketing blog',
            ],
            [
                'page' => 'contact',
                'meta_title' => 'Contact Us - Freelancers4U',
                'meta_description' => 'Get in touch with Freelancers4U for your next project. We are here to help you succeed online.',
                'meta_keywords' => 'contact us, get in touch, freelance developers, hire developers',
            ],
            [
                'page' => 'developers',
                'meta_title' => 'Our Developers - Expert Team | Freelancers4U',
                'meta_description' => 'Meet the expert developers at Freelancers4U. Skilled PHP, Laravel, Flutter, Node.js, and Digital Marketing professionals.',
                'meta_keywords' => 'developers, PHP developers, Laravel developers, Flutter developers, Node.js developers, SEO specialists',
            ],
            [
                'page' => 'terms',
                'meta_title' => 'Terms & Conditions - Freelancers4U',
                'meta_description' => 'Read the Terms and Conditions of Freelancers4U. Learn about our payment terms, project agreements, revisions, confidentiality, and cancellation policies.',
                'meta_keywords' => 'terms and conditions, freelance terms, payment policy, project agreement',
            ],
        ];

        foreach ($pages as $page) {
            PageSeo::firstOrCreate(['page' => $page['page']], $page);
        }
    }
}
