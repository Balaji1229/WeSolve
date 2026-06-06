@extends('layouts.app')

@section('title', 'Terms & Conditions - Freelancers4U')
@section('meta_description', 'Read the Terms and Conditions of Freelancers4U. Learn about our payment terms, project agreements, revisions, confidentiality, and cancellation policies.')
@section('meta_keywords', 'terms and conditions, freelance terms, payment policy, project agreement, Freelancers4U')

@section('content')
@php
$siteName = 'Freelancers4U';
$siteUrl = url('/');
$contactEmail = \App\Models\Setting::get('contact_email', 'info@freelancers4u.com');
@endphp

{{-- Hero --}}
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28" aria-labelledby="terms-hero-heading">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Legal</span>
        <h1 id="terms-hero-heading" class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Terms & <span class="gradient-text">Conditions</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-3xl mx-auto">
            Please read these terms carefully before placing an order or request with us.
        </p>
    </div>
</section>

<div class="section-divider"></div>

{{-- Terms Content --}}
<section class="py-16 lg:py-24 bg-body relative">
    <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

        {{-- Last Updated --}}
        <p class="text-sm text-muted mb-10 text-center">Last updated: {{ date('F d, Y') }}</p>

        {{-- Table of Contents --}}
        <div class="glass-card-hover p-6 lg:p-8 rounded-2xl border border-white/10 shadow-sm mb-12">
            <h2 class="text-lg font-semibold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">Table of Contents</h2>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <li><a href="#introduction" class="text-sm text-indigo-400 hover:text-indigo-300 transition">1. Introduction</a></li>
                <li><a href="#services" class="text-sm text-indigo-400 hover:text-indigo-300 transition">2. Services We Offer</a></li>
                <li><a href="#agreement" class="text-sm text-indigo-400 hover:text-indigo-300 transition">3. Project Agreement & Scope</a></li>
                <li><a href="#payment" class="text-sm text-indigo-400 hover:text-indigo-300 transition">4. Payment Terms</a></li>
                <li><a href="#timelines" class="text-sm text-indigo-400 hover:text-indigo-300 transition">5. Timelines & Delays</a></li>
                <li><a href="#revisions" class="text-sm text-indigo-400 hover:text-indigo-300 transition">6. Revisions & Changes</a></li>
                <li><a href="#ownership" class="text-sm text-indigo-400 hover:text-indigo-300 transition">7. Ownership & Intellectual Property</a></li>
                <li><a href="#confidentiality" class="text-sm text-indigo-400 hover:text-indigo-300 transition">8. Confidentiality</a></li>
                <li><a href="#liability" class="text-sm text-indigo-400 hover:text-indigo-300 transition">9. Limitation of Liability</a></li>
                <li><a href="#cancellation" class="text-sm text-indigo-400 hover:text-indigo-300 transition">10. Cancellation Policy</a></li>
                <li><a href="#privacy" class="text-sm text-indigo-400 hover:text-indigo-300 transition">11. Privacy</a></li>
                <li><a href="#changes" class="text-sm text-indigo-400 hover:text-indigo-300 transition">12. Changes to These Terms</a></li>
                <li><a href="#contact" class="text-sm text-indigo-400 hover:text-indigo-300 transition">13. Contact Us</a></li>
            </ul>
        </div>

        {{-- Sections --}}
        <div class="space-y-12">

            <article id="introduction" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">1. Introduction</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>Welcome to <strong class="text-primary">{{ $siteName }}</strong>. By accessing or using our website and services, you agree to be bound by the following Terms and Conditions. Please read them carefully before placing any order or request with us.</p>
                    <p>We are a group of freelance developers offering digital services. We are not a registered company or legal business entity. These terms are intended to set clear expectations between us and our clients.</p>
                </div>
            </article>

            <article id="services" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">2. Services We Offer</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>We provide freelance digital services including, but not limited to: website design and development, web application development, UI/UX design, graphic design, SEO services, and digital marketing support.</p>
                    <p>All services are delivered on a project-by-project or agreement basis. The exact scope of work will be discussed and agreed upon before starting any project.</p>
                </div>
            </article>

            <article id="agreement" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">3. Project Agreement & Scope</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>Before beginning any project, we will agree on the scope of work, timeline, and cost through written communication (email, WhatsApp, or any messaging platform). Any changes to the agreed scope may affect the timeline and cost, and will require mutual written consent.</p>
                    <p>We reserve the right to decline any project request at our discretion.</p>
                </div>
            </article>

            <article id="payment" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">4. Payment Terms</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>Our payment terms are as follows:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>A minimum advance payment of <strong class="text-primary">50%</strong> of the total project cost is required before we begin work.</li>
                        <li>The remaining balance is due upon project completion, before final files or access are delivered.</li>
                        <li>Payments are non-refundable once work has begun, unless otherwise agreed in writing.</li>
                        <li>We accept payments via bank transfer, UPI, or any other method mutually agreed upon.</li>
                    </ul>
                </div>
            </article>

            <article id="timelines" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">5. Timelines & Delays</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>We will provide an estimated delivery timeline at the start of each project. Timelines are estimates and may vary based on the complexity of the project, client feedback delays, or unforeseen circumstances.</p>
                    <p>If the client delays providing required content, feedback, or approvals, the delivery timeline may be extended accordingly without additional cost to us.</p>
                </div>
            </article>

            <article id="revisions" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">6. Revisions & Changes</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>We include a reasonable number of revisions as agreed at the start of the project. Revisions beyond the agreed limit, or changes that fall outside the original scope, may incur additional charges.</p>
                    <p>Revision requests must be submitted within <strong class="text-primary">7 days</strong> of delivery. Requests made after this period may be treated as new work.</p>
                </div>
            </article>

            <article id="ownership" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">7. Ownership & Intellectual Property</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>Upon full payment, the client will own the final deliverable (design, code, or content) created specifically for their project.</p>
                    <p>We retain the right to display our work in our portfolio and for promotional purposes, unless the client specifically requests confidentiality in writing.</p>
                    <p>Any third-party assets used (stock images, fonts, plugins, libraries) remain subject to their own licensing terms. It is the client's responsibility to obtain appropriate licenses for continued use after delivery.</p>
                </div>
            </article>

            <article id="confidentiality" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">8. Confidentiality</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>We treat all project-related information shared by clients as confidential. We will not share your business details, project requirements, or sensitive data with any third party, except where required by law.</p>
                </div>
            </article>

            <article id="liability" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">9. Limitation of Liability</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>We are a small, unregistered team of freelancers. While we do our best to deliver quality work, we cannot be held legally liable for any business losses, missed opportunities, or damages arising from the use of our services.</p>
                    <p>Our total liability in any dispute shall not exceed the amount paid by the client for the specific project in question.</p>
                </div>
            </article>

            <article id="cancellation" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">10. Cancellation Policy</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>If the client wishes to cancel a project after work has commenced, the advance payment will not be refunded. Any completed work up to the point of cancellation may be charged at a pro-rated rate.</p>
                    <p>We reserve the right to cancel a project if the client violates these terms, provides misleading information, or requests content that is illegal, unethical, or harmful. In such cases, any payments made will be forfeited.</p>
                </div>
            </article>

            <article id="privacy" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">11. Privacy</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>We collect only the information necessary to provide our services (such as your name, email, and project requirements). We do not sell or share your personal data with any third parties for marketing purposes.</p>
                    <p>By contacting us or submitting a project request, you consent to us storing and using your information for project-related communication.</p>
                </div>
            </article>

            <article id="changes" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">12. Changes to These Terms</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>We may update these Terms and Conditions at any time. Changes will be posted on this page with a revised date. Continued use of our services after any changes means you accept the updated terms.</p>
                </div>
            </article>

            <article id="contact" class="scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-4" style="font-family: 'Space Grotesk', sans-serif;">13. Contact Us</h2>
                <div class="text-muted leading-relaxed space-y-4">
                    <p>If you have any questions about these Terms and Conditions, please contact us at:</p>
                    <ul class="space-y-2">
                        <li><strong class="text-primary">Website:</strong> <a href="{{ $siteUrl }}" class="text-indigo-400 hover:text-indigo-300 transition">{{ $siteUrl }}</a></li>
                        <li><strong class="text-primary">Email:</strong> <a href="mailto:{{ $contactEmail }}" class="text-indigo-400 hover:text-indigo-300 transition">{{ $contactEmail }}</a></li>
                    </ul>
                </div>
            </article>

        </div>
    </div>
</section>
@endsection
