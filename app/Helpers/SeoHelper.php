<?php

namespace App\Helpers;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Setting;
use App\Models\Testimonial;

class SeoHelper
{
    public static function schemaOrganization(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'WeSolve Technologies',
            'url' => url('/'),
            'logo' => asset('images/logo/wesolvetechnologies-dark.webp'),
            'description' => 'Affordable website development, web app development, SEO and maintenance services for small businesses.',
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Chennai',
            ],
            'contactPoint' => [
                [
                    '@type' => 'ContactPoint',
                    'telephone' => Setting::get('contact_phone', '+91 6369443005'),
                    'contactType' => 'customer service',
                    'availableLanguage' => ['English'],
                ],
            ],
            'sameAs' => self::socialProfiles(),
        ];

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    /**
     * Configured social profile URLs (non-empty), used for schema sameAs.
     *
     * @return array<int, string>
     */
    private static function socialProfiles(): array
    {
        return array_values(array_filter([
            Setting::get('social_instagram'),
            Setting::get('social_twitter'),
            Setting::get('social_facebook'),
            Setting::get('social_threads'),
            Setting::get('social_github'),
        ]));
    }

    /**
     * The agency's service catalogue, used for Service schema and makesOffer.
     *
     * @return array<int, array{name: string, route: string, type: string}>
     */
    public static function serviceCatalogue(): array
    {
        return [
            ['name' => 'Website Development', 'route' => 'service.website-development', 'type' => 'Web Development'],
            ['name' => 'Web Application Development', 'route' => 'service.web-application-development', 'type' => 'Web Application Development'],
            ['name' => 'Mobile App Development', 'route' => 'service.mobile-app-development', 'type' => 'Mobile App Development'],
            ['name' => 'Digital Marketing', 'route' => 'service.digital-marketing', 'type' => 'Digital Marketing'],
            ['name' => 'AI & Automation Solutions', 'route' => 'service.ai-automation-solutions', 'type' => 'AI Automation'],
            ['name' => 'Website Design & UI/UX', 'route' => 'service.ui-ux-design', 'type' => 'UI/UX Design'],
            ['name' => 'Cloud Solutions', 'route' => 'service.cloud-solutions', 'type' => 'Cloud Computing'],
            ['name' => 'Website Maintenance', 'route' => 'service.maintenance-support', 'type' => 'Website Maintenance'],
        ];
    }

    /**
     * GeoCoordinates from Settings, or null when not configured.
     *
     * @return array<string, mixed>|null
     */
    private static function geoCoordinates(): ?array
    {
        $lat = Setting::get('contact_lat');
        $lng = Setting::get('contact_lng');

        if ($lat === null || $lng === null || $lat === '' || $lng === '') {
            return null;
        }

        return [
            '@type' => 'GeoCoordinates',
            'latitude' => (string) $lat,
            'longitude' => (string) $lng,
        ];
    }

    /**
     * openingHoursSpecification built from editable Settings.
     *
     * @return array<int, array<string, mixed>>|null
     */
    private static function openingHours(): ?array
    {
        $days = array_filter(array_map('trim', explode(',', (string) Setting::get('opening_days', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday'))));
        $opens = Setting::get('opening_time', '09:00');
        $closes = Setting::get('closing_time', '18:00');

        if (empty($days) || ! $opens || ! $closes) {
            return null;
        }

        return [[
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => array_values($days),
            'opens' => $opens,
            'closes' => $closes,
        ]];
    }

    /**
     * AggregateRating + individual Review nodes from active testimonials.
     * Only real, displayed testimonials are used (no fabricated ratings).
     *
     * @return array{aggregate: array<string, mixed>, reviews: array<int, array<string, mixed>>}|null
     */
    private static function testimonialRatings(): ?array
    {
        $testimonials = Testimonial::active()
            ->ordered()
            ->whereNotNull('rating')
            ->where('rating', '>', 0)
            ->get();

        if ($testimonials->isEmpty()) {
            return null;
        }

        $avg = round($testimonials->avg('rating'), 1);

        $reviews = $testimonials->map(function (Testimonial $t) {
            return [
                '@type' => 'Review',
                'author' => [
                    '@type' => 'Person',
                    'name' => $t->client_name,
                ],
                'reviewRating' => [
                    '@type' => 'Rating',
                    'ratingValue' => (string) $t->rating,
                    'bestRating' => '5',
                    'worstRating' => '1',
                ],
                'reviewBody' => $t->content,
            ];
        })->all();

        return [
            'aggregate' => [
                '@type' => 'AggregateRating',
                'ratingValue' => (string) $avg,
                'reviewCount' => (string) $testimonials->count(),
                'bestRating' => '5',
                'worstRating' => '1',
            ],
            'reviews' => $reviews,
        ];
    }

    /**
     * Service JSON-LD for an individual service page.
     */
    public static function schemaService(string $name, string $description, string $url, string $serviceType): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $name,
            'description' => $description,
            'serviceType' => $serviceType,
            'url' => $url,
            'provider' => [
                '@type' => 'Organization',
                'name' => 'WeSolve Technologies',
                'url' => url('/'),
            ],
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Chennai',
            ],
        ];

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    /**
     * CreativeWork JSON-LD for a portfolio project.
     */
    public static function schemaCreativeWork(Portfolio $portfolio): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'CreativeWork',
            'name' => $portfolio->title,
            'description' => $portfolio->meta_description ?: strip_tags((string) $portfolio->description),
            'url' => route('portfolio.show', $portfolio->slug),
            'creator' => [
                '@type' => 'Organization',
                'name' => 'WeSolve Technologies',
                'url' => url('/'),
            ],
        ];

        if ($portfolio->project_image) {
            $data['image'] = asset('storage/' . $portfolio->project_image);
        }

        if ($portfolio->completion_date) {
            $data['dateCreated'] = $portfolio->completion_date->toDateString();
        }

        if ($portfolio->project_url) {
            $data['sameAs'] = $portfolio->project_url;
        }

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    public static function schemaWebsite(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'WeSolve Technologies',
            'url' => url('/'),
            'potentialAction' => [
                [
                    '@type' => 'SearchAction',
                    'target' => [
                        '@type' => 'EntryPoint',
                        'urlTemplate' => url('/blog?search={search_term_string}'),
                    ],
                    'query-input' => 'required name=search_term_string',
                ],
            ],
        ];

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    public static function schemaBlogPost(Blog $blog): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $blog->title,
            'description' => $blog->excerpt,
            'url' => route('blog.show', $blog->slug),
            'datePublished' => $blog->published_at?->toIso8601String(),
            'dateModified' => $blog->updated_at?->toIso8601String(),
            'author' => [
                '@type' => 'Organization',
                'name' => $blog->user?->name ?? 'WeSolve Technologies',
                'url' => url('/'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'WeSolve Technologies',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/logo/wesolvetechnologies-dark.webp'),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => route('blog.show', $blog->slug),
            ],
        ];

        // Keywords (primary + secondary) for richer Article markup.
        $keywords = array_filter([
            $blog->primary_keyword ?? null,
            $blog->secondary_keywords ?? null,
            $blog->meta_keywords ?? null,
        ]);
        if (! empty($keywords)) {
            $data['keywords'] = implode(', ', $keywords);
        }

        if ($blog->primary_keyword) {
            $data['articleSection'] = $blog->primary_keyword;
        }

        $wordCount = str_word_count(strip_tags((string) $blog->content));
        if ($wordCount > 0) {
            $data['wordCount'] = $wordCount;
        }

        if ($blog->featured_image) {
            $data['image'] = asset('storage/' . $blog->featured_image);
        }

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    public static function schemaBreadcrumb(array $items): string
    {
        $listItems = [];
        $position = 1;

        foreach ($items as $name => $url) {
            $listItems[] = [
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => $name,
                'item' => $url,
            ];
        }

        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $listItems,
        ];

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    /**
     * FAQPage JSON-LD from an array of ['question' => ..., 'answer' => ...] items.
     */
    public static function schemaFaq(array $faqs): string
    {
        $entities = [];

        foreach ($faqs as $faq) {
            $question = trim($faq['question'] ?? '');
            $answer = trim($faq['answer'] ?? '');

            if ($question === '' || $answer === '') {
                continue;
            }

            $entities[] = [
                '@type' => 'Question',
                'name' => $question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $answer,
                ],
            ];
        }

        if (empty($entities)) {
            return '';
        }

        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $entities,
        ];

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    /**
     * LocalBusiness (ProfessionalService) JSON-LD built from editable Settings
     * with sensible fallbacks. Includes geo, opening hours, map, the service
     * catalogue (makesOffer) and — only when $includeRatings is true and the
     * page actually shows the reviews — real testimonial ratings.
     */
    public static function schemaLocalBusiness(bool $includeRatings = true): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => Setting::get('site_title', 'WeSolve Technologies'),
            'description' => Setting::get('site_description', 'Affordable website development, web app development, SEO and maintenance services for small businesses.'),
            'url' => url('/'),
            'image' => asset('images/logo/wesolvetechnologies-dark.webp'),
            'logo' => asset('images/logo/wesolvetechnologies-dark.webp'),
            'priceRange' => '$$',
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Chennai',
            ],
        ];

        if ($phone = Setting::get('contact_phone')) {
            $data['telephone'] = $phone;
        }

        if ($email = Setting::get('contact_email')) {
            $data['email'] = $email;
        }

        if ($address = Setting::get('contact_address')) {
            $data['address'] = [
                '@type' => 'PostalAddress',
                'streetAddress' => $address,
                'addressLocality' => Setting::get('geo_placename', 'Chennai'),
                'addressRegion' => 'Tamil Nadu',
                'addressCountry' => 'IN',
            ];
        }

        if ($geo = self::geoCoordinates()) {
            $data['geo'] = $geo;
        }

        if ($hours = self::openingHours()) {
            $data['openingHoursSpecification'] = $hours;
        }

        if ($mapUrl = Setting::get('contact_map_url')) {
            $data['hasMap'] = $mapUrl;
        }

        // makesOffer: the full service catalogue.
        $data['makesOffer'] = array_map(function (array $service) {
            return [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => $service['name'],
                    'serviceType' => $service['type'],
                    'url' => route($service['route']),
                ],
            ];
        }, self::serviceCatalogue());

        // Real testimonial ratings (aggregate + individual reviews) — only on a
        // page that actually displays them, to avoid Google "schema drift".
        if ($includeRatings && ($ratings = self::testimonialRatings())) {
            $data['aggregateRating'] = $ratings['aggregate'];
            $data['review'] = $ratings['reviews'];
        }

        $sameAs = self::socialProfiles();
        if (! empty($sameAs)) {
            $data['sameAs'] = $sameAs;
        }

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }
}
