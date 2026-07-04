<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutContent = [
            'title' => Setting::get('about_title', 'About WeSolve Technologies'),
            'description' => Setting::get('about_description', 'We are a team of passionate freelance project developers delivering reliable IT solutions for businesses worldwide.'),
            'mission' => Setting::get('about_mission', 'To provide affordable freelance IT solutions that help small businesses and startups grow through modern websites, mobile apps, and digital marketing.'),
            'vision' => Setting::get('about_vision', 'To become the most trusted freelance IT partner for businesses looking for cost-effective, high-quality digital solutions.'),
            'team_intro' => Setting::get('about_team', 'Our team consists of experienced freelance developers, designers, and digital marketers committed to delivering exceptional results.'),
            'why_affordable' => Setting::get('about_why_affordable', 'As a freelance IT solutions team, we keep our costs low by staying lean and efficient — passing the savings directly to our clients without compromising quality.'),
        ];

        return view('about', compact('aboutContent'));
    }
}
