<?php

namespace App\Helpers;

use App\Models\Blog;
use App\Models\Setting;

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
     * LocalBusiness JSON-LD built from editable Settings with sensible fallbacks.
     */
    public static function schemaLocalBusiness(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => Setting::get('site_title', 'WeSolve Technologies'),
            'description' => Setting::get('site_description', 'Affordable website development, web app development, SEO and maintenance services for small businesses.'),
            'url' => url('/'),
            'image' => asset('images/logo/wesolvetechnologies-dark.webp'),
            'logo' => asset('images/logo/wesolvetechnologies-dark.webp'),
            'priceRange' => '$$',
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
            ];
        }

        $sameAs = self::socialProfiles();
        if (! empty($sameAs)) {
            $data['sameAs'] = $sameAs;
        }

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }
}
