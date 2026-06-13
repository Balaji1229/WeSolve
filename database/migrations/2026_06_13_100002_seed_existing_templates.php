<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    private array $categoryMap = [
        'clothings' => 'Clothing',
        'tailor' => 'Fashion',
        'ecommerce' => 'E-Commerce',
        'food' => 'Food & Restaurant',
        'travel' => 'Travel & Tourism',
        'mechanic' => 'Mechanic',
        'realestate' => 'Real Estate',
        'medical' => 'Healthcare',
        'beauty' => 'Beauty & Salon',
        'portfolio' => 'Portfolio',
        'gym' => 'Others',
    ];

    public function up(): void
    {
        $themesDir = public_path('images/themes');

        if (!is_dir($themesDir)) {
            return;
        }

        $files = File::files($themesDir);
        $disk = Storage::disk('public');
        $targetDir = 'templates';

        foreach ($files as $file) {
            $filename = $file->getFilename();
            $extension = $file->getExtension();

            if (!in_array(strtolower($extension), ['webp', 'jpg', 'jpeg', 'png'])) {
                continue;
            }

            $category = 'Others';
            if (preg_match('/^wesolve-([a-z]+)-\d+\./', $filename, $matches)) {
                $category = $this->categoryMap[$matches[1]] ?? 'Others';
            }

            $storedName = $file->getBasename('.' . $extension) . '-' . uniqid() . '.' . $extension;
            $storedPath = $targetDir . '/' . $storedName;

            $disk->put($storedPath, File::get($file->getPathname()));

            DB::table('templates')->insert([
                'title' => $category . ' Template',
                'category' => $category,
                'image' => $storedPath,
                'sort_order' => 0,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        $disk = Storage::disk('public');

        $records = DB::table('templates')->select('image')->get();
        foreach ($records as $record) {
            if ($record->image && $disk->exists($record->image)) {
                $disk->delete($record->image);
            }
        }

        if ($disk->exists('templates')) {
            $disk->deleteDirectory('templates');
        }

        DB::table('templates')->delete();
    }
};
