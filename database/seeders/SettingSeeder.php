<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_title', 'value' => 'WeSolve Technologies - Affordable Website & App Development', 'type' => 'text', 'group' => 'general', 'label' => 'Site Title'],
            ['key' => 'site_description', 'value' => 'Professional website development, web apps, SEO and maintenance services at affordable prices for small businesses and startups.', 'type' => 'text', 'group' => 'general', 'label' => 'Site Description'],
            ['key' => 'site_keywords', 'value' => 'website development, web app development, SEO, maintenance, affordable, small business, startup', 'type' => 'text', 'group' => 'general', 'label' => 'Site Keywords'],

            // Hero
            ['key' => 'hero_title', 'value' => 'Affordable Website & App Development', 'type' => 'text', 'group' => 'hero', 'label' => 'Hero Title'],
            ['key' => 'hero_subtitle', 'value' => 'Professional digital solutions for small businesses and startups. Get your project started today!', 'type' => 'text', 'group' => 'hero', 'label' => 'Hero Subtitle'],

            // Branding
            ['key' => 'brand_primary_color', 'value' => '#305CDE', 'type' => 'color', 'group' => 'branding', 'label' => 'Primary Brand Color'],
            ['key' => 'brand_secondary_color', 'value' => '#00B6DA', 'type' => 'color', 'group' => 'branding', 'label' => 'Secondary Brand Color'],

            // About
            ['key' => 'about_title', 'value' => 'About WeSolve Technologies', 'type' => 'text', 'group' => 'about', 'label' => 'About Title'],
            ['key' => 'about_description', 'value' => 'We are a team of passionate developers and designers dedicated to helping small businesses succeed online. With over 5 years of experience, we\'ve helped 100+ clients build their digital presence.', 'type' => 'textarea', 'group' => 'about', 'label' => 'About Description'],
            ['key' => 'about_mission', 'value' => 'To provide affordable, high-quality digital solutions that help small businesses and startups compete in the online marketplace.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Mission'],
            ['key' => 'about_vision', 'value' => 'To become the most trusted partner for small businesses seeking digital transformation, known for quality, affordability, and exceptional customer service.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Vision'],
            ['key' => 'about_team', 'value' => 'Our team consists of experienced developers, designers, and digital marketers who are passionate about helping businesses grow. We bring diverse skills and fresh perspectives to every project.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Team Introduction'],
            ['key' => 'about_why_affordable', 'value' => 'We keep our costs low by being efficient and using modern tools. We don\'t have expensive office overheads, and we pass those savings directly to our clients. Quality doesn\'t have to come with a high price tag.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Why Affordable'],

            // Contact
            ['key' => 'contact_email', 'value' => 'info@wesolvetechnologies.com', 'type' => 'text', 'group' => 'contact', 'label' => 'Email Address'],
            ['key' => 'contact_phone', 'value' => '+1 (555) 123-4567', 'type' => 'text', 'group' => 'contact', 'label' => 'Phone Number'],
            ['key' => 'contact_whatsapp', 'value' => '+15551234567', 'type' => 'text', 'group' => 'contact', 'label' => 'WhatsApp Number'],
            ['key' => 'contact_address', 'value' => '123 Tech Street, San Francisco, CA 94102', 'type' => 'text', 'group' => 'contact', 'label' => 'Address'],
            ['key' => 'contact_map', 'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100939.98555096471!2d-122.50764017948502!3d37.75780956920463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1699900000000!5m2!1sen!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', 'type' => 'textarea', 'group' => 'contact', 'label' => 'Google Map Embed'],

            // Social
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/wesolvetechnologies', 'type' => 'text', 'group' => 'social', 'label' => 'Facebook URL'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/wesolvetechnologies', 'type' => 'text', 'group' => 'social', 'label' => 'Twitter URL'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/wesolvetechnologies', 'type' => 'text', 'group' => 'social', 'label' => 'Instagram URL'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/wesolvetechnologies', 'type' => 'text', 'group' => 'social', 'label' => 'LinkedIn URL'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
