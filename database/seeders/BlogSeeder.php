<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        $blogs = [
            [
                'title' => 'Why Your Small Business Needs a Website in 2024',
                'slug' => 'why-your-small-business-needs-a-website-2024',
                'short_description' => 'Discover the top reasons why having a professional website is essential for small businesses to compete in today\'s digital marketplace.',
                'content' => '<p>In today\'s digital age, having a website is no longer optional for small businesses. It\'s a fundamental requirement for establishing credibility, reaching new customers, and staying competitive.</p><h2>Build Credibility</h2><p>Consumers expect businesses to have an online presence. A professional website builds trust and shows that you\'re a legitimate operation.</p><h2>Reach More Customers</h2><p>A website allows you to reach customers beyond your local area. With proper SEO, your business can attract visitors from anywhere in the world.</p><h2>Showcase Your Work</h2><p>Your website is the perfect place to showcase your products, services, and portfolio. You control the narrative and presentation.</p><h2>Cost-Effective Marketing</h2><p>Compared to traditional advertising, a website provides ongoing marketing value at a fraction of the cost.</p>',
                'meta_title' => 'Why Your Small Business Needs a Website in 2024',
                'meta_description' => 'Discover why a professional website is essential for small businesses to compete in today\'s digital marketplace.',
                'user_id' => $user?->id ?? 1,
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => '5 Tips for Choosing the Right Web Development Partner',
                'slug' => '5-tips-choosing-right-web-development-partner',
                'short_description' => 'Learn how to select the best web development agency for your project with these essential tips.',
                'content' => '<p>Choosing the right web development partner can make or break your project. Here are five essential tips to help you make the right choice.</p><h2>1. Review Their Portfolio</h2><p>Look at their previous work. Do they have experience in your industry? Does their design style match your vision?</p><h2>2. Check Client Testimonials</h2><p>Read reviews and ask for references. A reputable agency will have happy clients willing to vouch for them.</p><h2>3. Understand Their Process</h2><p>Ask about their development process. Do they follow agile methodology? How do they handle revisions?</p><h2>4. Discuss Communication</h2><p>Clear communication is crucial. How often will they update you? What channels do they use?</p><h2>5. Consider Long-term Support</h2><p>Websites need ongoing maintenance. Make sure they offer support after launch.</p>',
                'meta_title' => '5 Tips for Choosing the Right Web Development Partner',
                'meta_description' => 'Learn how to select the best web development agency for your project with these essential tips.',
                'user_id' => $user?->id ?? 1,
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'The Importance of SEO for Local Businesses',
                'slug' => 'importance-seo-local-businesses',
                'short_description' => 'Learn why SEO is crucial for local businesses and how it can help you attract more customers in your area.',
                'content' => '<p>Search Engine Optimization (SEO) is one of the most effective ways for local businesses to attract new customers. Here\'s why it matters.</p><h2>Local Search Dominance</h2><p>When people search for services near them, Google shows local results first. Without SEO, you\'re missing out on these high-intent customers.</p><h2>Build Trust and Authority</h2><p>Appearing in top search results builds credibility. Customers trust businesses that Google ranks highly.</p><h2>Cost-Effective Marketing</h2><p>Compared to paid advertising, SEO provides long-term value. Once you rank well, you get free traffic continuously.</p><h2>Mobile Search Growth</h2><p>More people search on mobile devices than ever. Local SEO ensures you appear in "near me" searches.</p>',
                'meta_title' => 'The Importance of SEO for Local Businesses',
                'meta_description' => 'Learn why SEO is crucial for local businesses and how it can help attract more customers.',
                'user_id' => $user?->id ?? 1,
                'is_published' => true,
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
