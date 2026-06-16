<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Sarah Johnson',
                'client_position' => 'Owner',
                'client_company' => 'Blossom Boutique',
                'content' => 'WeSolve Technologies transformed our online presence completely. Our new website has increased sales by 40% in just three months. Their team was professional, responsive, and delivered on time.',
                'rating' => 5,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Michael Chen',
                'client_position' => 'CEO',
                'client_company' => 'TechStart Inc.',
                'content' => 'Working with WeSolve Technologies was an excellent experience. They built our web application exactly as we envisioned, and their ongoing support has been invaluable. Highly recommended!',
                'rating' => 5,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Emily Rodriguez',
                'client_position' => 'Marketing Director',
                'client_company' => 'Growth Agency',
                'content' => 'The SEO services from WeSolve Technologies have been game-changing. Our organic traffic has tripled, and we\'re now ranking on the first page for our key terms. Amazing results!',
                'rating' => 5,
                'sort_order' => 3,
            ],
            [
                'client_name' => 'David Park',
                'client_position' => 'Restaurant Owner',
                'client_company' => 'Park\'s Kitchen',
                'content' => 'They created a beautiful website for our restaurant with online ordering integration. The process was smooth, and the final product exceeded our expectations. Great value for money!',
                'rating' => 4,
                'sort_order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
