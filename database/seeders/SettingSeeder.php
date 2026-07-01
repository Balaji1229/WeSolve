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
            ['key' => 'contact_phone', 'value' => '+91 6369443005', 'type' => 'text', 'group' => 'contact', 'label' => 'Phone Number'],
            ['key' => 'contact_whatsapp', 'value' => '916369443005', 'type' => 'text', 'group' => 'contact', 'label' => 'WhatsApp Number'],
            ['key' => 'contact_address', 'value' => 'Chennai, Tamil Nadu, India', 'type' => 'text', 'group' => 'contact', 'label' => 'Address'],
            ['key' => 'contact_map', 'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15551.87!2d80.2707!3d13.0827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5265ea4f7d3361%3A0x6e61a70b6863d433!2sChennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1699900000000!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', 'type' => 'textarea', 'group' => 'contact', 'label' => 'Google Map Embed'],

            // Local SEO — fill these with your real Google Business Profile data.
            ['key' => 'contact_map_url', 'value' => 'https://www.google.com/maps?q=Chennai,Tamil+Nadu,India', 'type' => 'text', 'group' => 'contact', 'label' => 'Google Maps URL (for schema hasMap)'],
            ['key' => 'contact_lat', 'value' => '13.0827', 'type' => 'text', 'group' => 'contact', 'label' => 'Latitude (geo)'],
            ['key' => 'contact_lng', 'value' => '80.2707', 'type' => 'text', 'group' => 'contact', 'label' => 'Longitude (geo)'],
            ['key' => 'geo_region', 'value' => 'IN-TN', 'type' => 'text', 'group' => 'contact', 'label' => 'Geo Region Code'],
            ['key' => 'geo_placename', 'value' => 'Chennai', 'type' => 'text', 'group' => 'contact', 'label' => 'Geo Place Name'],
            ['key' => 'opening_days', 'value' => 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'type' => 'text', 'group' => 'contact', 'label' => 'Opening Days (comma separated)'],
            ['key' => 'opening_time', 'value' => '09:00', 'type' => 'text', 'group' => 'contact', 'label' => 'Opening Time (HH:MM)'],
            ['key' => 'closing_time', 'value' => '18:00', 'type' => 'text', 'group' => 'contact', 'label' => 'Closing Time (HH:MM)'],

            // Social
            ['key' => 'social_instagram', 'value' => 'https://www.instagram.com/wesolve_technologies', 'type' => 'text', 'group' => 'social', 'label' => 'Instagram URL'],
            ['key' => 'social_twitter', 'value' => 'https://x.com/WeSolve_Tech', 'type' => 'text', 'group' => 'social', 'label' => 'X (Twitter) URL'],
            ['key' => 'social_facebook', 'value' => 'https://www.facebook.com/people/Wesolvetechnologies/61590615067666/', 'type' => 'text', 'group' => 'social', 'label' => 'Facebook URL'],
            ['key' => 'social_threads', 'value' => 'https://www.threads.com/@wesolve_technologies', 'type' => 'text', 'group' => 'social', 'label' => 'Threads URL'],
            ['key' => 'social_github', 'value' => 'https://github.com/WesolveTechnologies', 'type' => 'text', 'group' => 'social', 'label' => 'GitHub URL'],
            ['key' => 'twitter_handle', 'value' => '@WeSolve_Tech', 'type' => 'text', 'group' => 'social', 'label' => 'X (Twitter) Handle (for Twitter cards)'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
