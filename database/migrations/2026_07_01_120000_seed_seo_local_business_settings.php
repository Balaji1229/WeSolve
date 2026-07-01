<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Insert the new SEO/local-business settings introduced with the SEO work.
     *
     * Uses firstOrCreate so it is safe to run on an existing production database:
     * it ONLY adds keys that are missing and never overwrites values an admin has
     * already customised. Fresh installs get these from SettingSeeder instead.
     */
    public function up(): void
    {
        $settings = [
            ['key' => 'contact_map_url', 'value' => 'https://www.google.com/maps?q=Chennai,Tamil+Nadu,India', 'type' => 'text', 'group' => 'contact', 'label' => 'Google Maps URL (for schema hasMap)'],
            ['key' => 'contact_lat', 'value' => '13.0827', 'type' => 'text', 'group' => 'contact', 'label' => 'Latitude (geo)'],
            ['key' => 'contact_lng', 'value' => '80.2707', 'type' => 'text', 'group' => 'contact', 'label' => 'Longitude (geo)'],
            ['key' => 'geo_region', 'value' => 'IN-TN', 'type' => 'text', 'group' => 'contact', 'label' => 'Geo Region Code'],
            ['key' => 'geo_placename', 'value' => 'Chennai', 'type' => 'text', 'group' => 'contact', 'label' => 'Geo Place Name'],
            ['key' => 'opening_days', 'value' => 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'type' => 'text', 'group' => 'contact', 'label' => 'Opening Days (comma separated)'],
            ['key' => 'opening_time', 'value' => '09:00', 'type' => 'text', 'group' => 'contact', 'label' => 'Opening Time (HH:MM)'],
            ['key' => 'closing_time', 'value' => '18:00', 'type' => 'text', 'group' => 'contact', 'label' => 'Closing Time (HH:MM)'],
            ['key' => 'twitter_handle', 'value' => '@WeSolve_Tech', 'type' => 'text', 'group' => 'social', 'label' => 'X (Twitter) Handle (for Twitter cards)'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }

    public function down(): void
    {
        Setting::whereIn('key', [
            'contact_map_url', 'contact_lat', 'contact_lng', 'geo_region',
            'geo_placename', 'opening_days', 'opening_time', 'closing_time',
            'twitter_handle',
        ])->delete();
    }
};
