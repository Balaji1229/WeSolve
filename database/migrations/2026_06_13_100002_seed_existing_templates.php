<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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

        foreach ($files as $file) {
            $filename = $file->getFilename();
            $extension = strtolower($file->getExtension());

            if (!in_array($extension, ['webp', 'jpg', 'jpeg', 'png'])) {
                continue;
            }

            $category = 'Others';
            if (preg_match('/^wesolve-([a-z]+)-\d+\./', $filename, $matches)) {
                $category = $this->categoryMap[$matches[1]] ?? 'Others';
            }

            // Store the public-relative path so asset() resolves it directly.
            $imagePath = 'images/themes/' . $filename;

            DB::table('templates')->insert([
                'title' => $category . ' Template',
                'category' => $category,
                'image' => $imagePath,
                'sort_order' => 0,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        DB::table('templates')->delete();
    }
};
