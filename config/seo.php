<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Search Engine Indexability
    |--------------------------------------------------------------------------
    |
    | Master switch for whether the site may be crawled and indexed. When set
    | to false (e.g. staging), robots.txt returns "Disallow: /" and every page
    | emits a "noindex, nofollow" robots meta tag. Controlled by SITE_INDEXABLE.
    |
    */

    'indexable' => env('SITE_INDEXABLE', true),

    /*
    |--------------------------------------------------------------------------
    | AI / LLM Crawlers
    |--------------------------------------------------------------------------
    |
    | User agents for AI crawlers that we explicitly allow in robots.txt so the
    | site can be cited in AI Overviews / assistants (2026 best practice).
    |
    */

    'ai_crawlers' => [
        'GPTBot',
        'ChatGPT-User',
        'OAI-SearchBot',
        'ClaudeBot',
        'Claude-Web',
        'PerplexityBot',
        'Google-Extended',
    ],

];
