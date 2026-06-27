<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\ChatbotDocument;
use App\Models\PageSeo;
use App\Models\Portfolio;
use App\Models\Setting;
use App\Models\Template;
use App\Models\Testimonial;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class IndexChatbotKnowledge extends Command
{
    protected $signature = 'chatbot:index';

    protected $description = 'Rebuild the chatbot knowledge index from website content';

    public function handle(): int
    {
        ChatbotDocument::query()->delete();

        $this->indexStaticPages();
        $this->indexFaqs();
        $this->indexBlogs();
        $this->indexPortfolios();
        $this->indexTemplates();
        $this->indexTestimonials();
        $this->indexSettings();
        $this->indexEscalationInfo();

        $count = ChatbotDocument::count();
        $this->info("Chatbot knowledge index rebuilt with {$count} documents.");

        return self::SUCCESS;
    }

    private function addDocument(string $title, string $content, string $source, ?string $url = null, int $weight = 1): void
    {
        ChatbotDocument::create([
            'title' => $title,
            'content' => $content,
            'source' => $source,
            'url' => $url,
            'weight' => $weight,
        ]);
    }

    private function indexStaticPages(): void
    {
        $homeUrl = $this->url('home');
        $this->addDocument(
            'Home - WeSolve Technologies',
            "WeSolve Technologies offers affordable digital solutions for small businesses and startups. Services include website development, web application development, mobile app development, digital marketing, AI and automation solutions, UI/UX design, cloud solutions, and maintenance support. The team has completed many projects across industries and focuses on delivering quality work with ongoing support. Contact them through the website for a free consultation.",
            'page:home',
            $homeUrl,
            3
        );

        $aboutUrl = $this->url('about');
        $this->addDocument(
            'About WeSolve Technologies',
            "WeSolve Technologies is a team of freelance developers and designers helping small businesses grow online. The company builds websites, web applications, mobile apps, and provides digital marketing, AI automation, cloud hosting, and maintenance services. The team values clear communication, practical solutions, and long-term client relationships. Team members include Selva, Nanthini, Balaji, Kanishka, Sanjay, Prasanth, Arthy, and Ramkumar, each with several years of experience in full-stack development and design.",
            'page:about',
            $aboutUrl,
            3
        );

        $servicesUrl = $this->url('services');
        $this->addDocument(
            'Services Overview',
            "WeSolve Technologies provides eight main services: Website Development, Web Application Development, Mobile App Development, Digital Marketing, AI and Automation Solutions, UI/UX Design, Cloud Solutions, and Maintenance and Support. Each service is tailored to small business needs and budgets.",
            'page:services',
            $servicesUrl,
            4
        );

        $serviceDetails = [
            ['route' => 'service.website-development', 'title' => 'Website Development', 'content' => 'Custom, responsive websites built for your business. Includes mobile-first design, fast loading speed, SEO-ready structure, easy content updates, secure and reliable code, and design focused on your target audience.'],
            ['route' => 'service.web-application-development', 'title' => 'Web Application Development', 'content' => 'Custom web applications that run your business. Includes custom dashboards, secure user access and roles, workflow automation, payment and billing integration, API and third-party integrations, and scalable architecture.'],
            ['route' => 'service.mobile-app-development', 'title' => 'Mobile App Development', 'content' => 'Native and cross-platform mobile apps for iOS and Android. Includes push notifications, secure login and data protection, app store launch support, and API and backend integration.'],
            ['route' => 'service.digital-marketing', 'title' => 'Digital Marketing', 'content' => 'Marketing services to grow your business online. Includes search engine optimization, content marketing, paid advertising on Google and social media, social media marketing, performance tracking, and local marketing.'],
            ['route' => 'service.ai-automation-solutions', 'title' => 'AI and Automation Solutions', 'content' => 'Practical AI tools for everyday business. Includes AI chatbots, generative AI solutions, AI business automation, AI assistants, AI analytics, and AI voice solutions.'],
            ['route' => 'service.ui-ux-design', 'title' => 'UI/UX Design', 'content' => 'User-friendly interface and experience design. Includes user research, wireframes and prototypes, visual design, usability testing, design systems, and accessibility-first design.'],
            ['route' => 'service.cloud-solutions', 'title' => 'Cloud Solutions', 'content' => 'Cloud infrastructure that scales with you. Includes cloud hosting, server setup and deployment, database management, security and backups, performance monitoring, and cloud migration.'],
            ['route' => 'service.maintenance-support', 'title' => 'Maintenance and Support', 'content' => 'Ongoing care for websites and apps. Includes regular updates, security monitoring, bug fixes, backups and recovery, speed optimization, and technical support.'],
        ];

        foreach ($serviceDetails as $service) {
            $this->addDocument(
                $service['title'],
                $service['content'],
                'page:service',
                $this->url($service['route']),
                4
            );
        }

        $this->addDocument(
            'Contact WeSolve Technologies',
            "Contact WeSolve Technologies through the contact form on the website, by email, phone, or WhatsApp. The team supports English and Tamil. You can request a free quote or discuss your project requirements.",
            'page:contact',
            $this->url('contact'),
            3
        );

        $this->addDocument(
            'Terms and Conditions',
            "WeSolve Technologies terms include: services are delivered on a project-by-project basis, a 50% advance payment is required, the remaining balance is due before final delivery, timelines are estimates and may change based on client feedback, revisions must be requested within 7 days, the client owns final deliverables after full payment, third-party assets remain subject to their own licenses, and the team reserves the right to decline projects. For full terms, visit the Terms and Conditions page.",
            'page:terms',
            $this->url('terms'),
            1
        );

        $this->addDocument(
            'Developers Team',
            "Meet the WeSolve Technologies developer team: Selva (Full Stack Developer, 6+ years), Nanthini (Full Stack Developer, 5+ years), Balaji (Full Stack Developer, 4+ years), Kanishka, Sanjay, Prasanth, Arthy, and Ramkumar. The team has skills in Laravel, PHP, JavaScript, React, Vue, mobile development, UI/UX design, cloud infrastructure, and AI integration.",
            'page:developers',
            $this->url('developers'),
            2
        );

        $this->addDocument(
            'Website Templates',
            "WeSolve Technologies showcases website design templates across categories including Clothing, Fashion, E-Commerce, Food and Restaurant, Hotel, Travel and Tourism, Mechanic, Real Estate, Healthcare, Education, Beauty and Salon, Corporate, Portfolio, and Others. These templates are for demonstration and inspiration. All rights belong to their respective owners. Template licenses are not included and must be purchased separately if used commercially.",
            'page:templates',
            $this->url('templates'),
            2
        );
    }

    private function indexFaqs(): void
    {
        // Page-level FAQs (managed under /admin/seo).
        PageSeo::whereNotNull('faqs')->get()->each(function ($page) {
            $faqs = collect($page->faqs ?? [])
                ->filter(fn ($f) => filled($f['question'] ?? null) && filled($f['answer'] ?? null));

            if ($faqs->isEmpty()) {
                return;
            }

            $content = $faqs->map(fn ($f) => "Q: {$f['question']}\nA: {$f['answer']}")->implode("\n\n");

            $this->addDocument(
                'FAQ - ' . ucfirst(str_replace(['.', '_', '-'], ' ', $page->page)),
                $content,
                'faq:page',
                $this->url($page->page),
                4
            );
        });

        // Per-blog FAQs.
        Blog::published()->whereNotNull('faqs')->get()->each(function ($blog) {
            $faqs = collect($blog->faqs ?? [])
                ->filter(fn ($f) => filled($f['question'] ?? null) && filled($f['answer'] ?? null));

            if ($faqs->isEmpty()) {
                return;
            }

            $content = $faqs->map(fn ($f) => "Q: {$f['question']}\nA: {$f['answer']}")->implode("\n\n");

            $this->addDocument(
                'FAQ - ' . $blog->title,
                $content,
                'faq:blog',
                $this->url('blog.show', $blog->slug),
                4
            );
        });
    }

    private function indexBlogs(): void
    {
        Blog::published()->get()->each(function ($blog) {
            $content = strip_tags($blog->title . ' ' . $blog->short_description . ' ' . $blog->content);
            $this->addDocument(
                $blog->title,
                $content,
                'model:blog',
                $this->url('blog.show', $blog->slug),
                2
            );
        });
    }

    private function indexPortfolios(): void
    {
        Portfolio::active()->get()->each(function ($portfolio) {
            $content = strip_tags($portfolio->title . ' ' . $portfolio->description . ' ' . $portfolio->technology_used . ' ' . $portfolio->client_name);
            $this->addDocument(
                $portfolio->title,
                $content,
                'model:portfolio',
                $this->url('portfolio.show', $portfolio->slug),
                2
            );
        });
    }

    private function indexTemplates(): void
    {
        Template::active()->get()->each(function ($template) {
            $this->addDocument(
                $template->title,
                "{$template->title} website template in {$template->category} category.",
                'model:template',
                $this->url('templates'),
                1
            );
        });
    }

    private function indexTestimonials(): void
    {
        Testimonial::active()->get()->each(function ($testimonial) {
            $content = strip_tags($testimonial->client_name . ' ' . $testimonial->client_position . ' ' . $testimonial->content);
            $this->addDocument(
                'Client testimonial from ' . $testimonial->client_name,
                $content,
                'model:testimonial',
                $this->url('home'),
                1
            );
        });
    }

    private function indexSettings(): void
    {
        $keys = [
            'site_title' => 'Company Name',
            'site_description' => 'Company Description',
            'hero_title' => 'Homepage Hero',
            'hero_subtitle' => 'Homepage Subtitle',
            'about_mission' => 'Mission',
            'about_vision' => 'Vision',
            'about_description' => 'About Description',
            'contact_email' => 'Contact Email',
            'contact_phone' => 'Contact Phone',
            'contact_address' => 'Contact Address',
            'contact_whatsapp' => 'WhatsApp Number',
        ];

        foreach ($keys as $key => $label) {
            $value = Setting::get($key);
            if (filled($value)) {
                $this->addDocument(
                    $label,
                    "{$label}: {$value}",
                    'setting:' . $key,
                    $this->url('contact'),
                    3
                );
            }
        }
    }

    private function indexEscalationInfo(): void
    {
        $whatsapp = Setting::get('contact_whatsapp');
        $whatsappText = filled($whatsapp) ? " WhatsApp number: {$whatsapp}." : '';

        $this->addDocument(
            'Chatbot Scope and Developer Contact',
            "The WeSolve Assistant chatbot only answers questions based on the content of this website. If a user asks something that is not covered by the website content, the chatbot will suggest contacting the developer on WhatsApp.{$whatsappText} For general inquiries, use the contact form, email, or phone number listed on the contact page.",
            'page:escalation',
            $this->url('contact'),
            5
        );
    }

    private function url(string $name, mixed $parameters = []): ?string
    {
        if (!Route::has($name)) {
            return null;
        }

        try {
            return route($name, $parameters);
        } catch (\Throwable $e) {
            return null;
        }
    }
}
