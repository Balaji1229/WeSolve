<?php

namespace App\Helpers;

use App\Models\Blog;

class SeoHelper
{
    public static function schemaOrganization(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Freelancers4U',
            'url' => url('/'),
            'logo' => url('/logo.svg'),
            'description' => 'Affordable website development, web app development, SEO and maintenance services for small businesses.',
            'contactPoint' => [
                [
                    '@type' => 'ContactPoint',
                    'telephone' => '+1-555-123-4567',
                    'contactType' => 'customer service',
                    'availableLanguage' => ['English'],
                ],
            ],
            'sameAs' => [
                'https://facebook.com/freelancers4u',
                'https://twitter.com/freelancers4u',
                'https://linkedin.com/company/freelancers4u',
            ],
        ];

        return '<script type="application/ld+json">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    public static function schemaWebsite(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'Freelancers4U',
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
                'name' => $blog->user?->name ?? 'Freelancers4U',
                'url' => url('/'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Freelancers4U',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => url('/logo.png'),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => route('blog.show', $blog->slug),
            ],
        ];

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
}
