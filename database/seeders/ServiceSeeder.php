<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Website Development',
                'slug' => 'website-development',
                'description' => 'Custom, responsive websites built with modern technologies. From simple landing pages to complex web applications, we deliver fast, SEO-friendly websites that help your business grow online.',
                'pricing_text' => 'Starting from $499',
                'cta_button_text' => 'Get Started',
                'cta_link' => '/contact',
                'sort_order' => 1,
            ],
            [
                'title' => 'Web Application Development',
                'slug' => 'web-application-development',
                'description' => 'Full-stack web applications built with Laravel, React, Vue.js and other modern frameworks. We create scalable, secure, and user-friendly applications tailored to your business needs.',
                'pricing_text' => 'Starting from $1,499',
                'cta_button_text' => 'Get Started',
                'cta_link' => '/contact',
                'sort_order' => 2,
            ],
            [
                'title' => 'SEO Optimization',
                'slug' => 'seo-optimization',
                'description' => 'Improve your search engine rankings and drive organic traffic to your website. Our SEO services include on-page optimization, technical SEO, content strategy, and performance improvements.',
                'pricing_text' => 'Starting from $299/month',
                'cta_button_text' => 'Boost Rankings',
                'cta_link' => '/contact',
                'sort_order' => 3,
            ],
            [
                'title' => 'Website Maintenance',
                'slug' => 'website-maintenance',
                'description' => 'Keep your website secure, up-to-date, and performing at its best. Our maintenance packages include regular updates, security patches, backups, and technical support.',
                'pricing_text' => 'Starting from $99/month',
                'cta_button_text' => 'Get Support',
                'cta_link' => '/contact',
                'sort_order' => 4,
            ],
            [
                'title' => 'Landing Page Creation',
                'slug' => 'landing-page-creation',
                'description' => 'High-converting landing pages designed to capture leads and drive sales. We create visually stunning, mobile-responsive landing pages optimized for conversions.',
                'pricing_text' => 'Starting from $299',
                'cta_button_text' => 'Create Page',
                'cta_link' => '/contact',
                'sort_order' => 5,
            ],
            [
                'title' => 'Business Website Setup',
                'slug' => 'business-website-setup',
                'description' => 'Complete business website solutions including domain setup, hosting configuration, email setup, and professional design. Get your business online quickly and affordably.',
                'pricing_text' => 'Starting from $399',
                'cta_button_text' => 'Start Now',
                'cta_link' => '/contact',
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
