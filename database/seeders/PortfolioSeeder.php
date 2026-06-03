<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'category' => 'Website',
                'description' => 'A fully-featured e-commerce platform with payment integration, inventory management, and admin dashboard built for a retail client.',
                'technology_used' => 'Laravel, Vue.js, MySQL, Stripe',
                'project_url' => 'https://example.com',
                'client_name' => 'Retail Plus Inc.',
                'completion_date' => '2024-06-15',
            ],
            [
                'title' => 'Restaurant Booking App',
                'slug' => 'restaurant-booking-app',
                'category' => 'App',
                'description' => 'A modern web application for restaurant table reservations with real-time availability and SMS notifications.',
                'technology_used' => 'React, Node.js, MongoDB, Twilio',
                'project_url' => 'https://example.com',
                'client_name' => 'Tasty Bites Restaurant',
                'completion_date' => '2024-08-20',
            ],
            [
                'title' => 'SEO Campaign - Real Estate',
                'slug' => 'seo-campaign-real-estate',
                'category' => 'SEO',
                'description' => 'Comprehensive SEO campaign that increased organic traffic by 250% for a real estate agency within 6 months.',
                'technology_used' => 'SEO, Content Strategy, Analytics',
                'project_url' => 'https://example.com',
                'client_name' => 'HomeFinders Real Estate',
                'completion_date' => '2024-09-10',
            ],
            [
                'title' => 'Corporate Website Redesign',
                'slug' => 'corporate-website-redesign',
                'category' => 'Website',
                'description' => 'Complete redesign of a corporate website with modern UI/UX, improved performance, and CMS integration.',
                'technology_used' => 'Laravel, Tailwind CSS, Alpine.js',
                'project_url' => 'https://example.com',
                'client_name' => 'TechCorp Solutions',
                'completion_date' => '2024-07-30',
            ],
            [
                'title' => 'Fitness Tracking App',
                'slug' => 'fitness-tracking-app',
                'category' => 'App',
                'description' => 'A progressive web app for tracking workouts, nutrition, and progress with social sharing features.',
                'technology_used' => 'React Native, Firebase, Charts.js',
                'project_url' => 'https://example.com',
                'client_name' => 'FitLife Gym',
                'completion_date' => '2024-10-05',
            ],
            [
                'title' => 'Local Business SEO',
                'slug' => 'local-business-seo',
                'category' => 'SEO',
                'description' => 'Local SEO optimization for a dental clinic including Google My Business setup, local citations, and review management.',
                'technology_used' => 'Local SEO, GMB, Schema Markup',
                'project_url' => 'https://example.com',
                'client_name' => 'Smile Dental Care',
                'completion_date' => '2024-11-15',
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
