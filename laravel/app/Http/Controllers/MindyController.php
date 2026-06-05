<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MindyController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'pageTitle'    => 'Dashboard',
            'pageSubtitle' => 'Welcome back, Wendy',
            'route'        => 'dashboard',
        ]);
    }

    public function chat()
    {
        return view('chat', [
            'pageTitle'    => 'Chat',
            'pageSubtitle' => 'Manage your conversations',
            'route'        => 'chat',
        ]);
    }

    public function products()
    {
        return view('products', [
            'pageTitle'    => 'Products',
            'pageSubtitle' => 'Browse and manage your product catalogue',
            'route'        => 'products',
        ]);
    }

    public function inquiries()
    {
        return view('inquiries', [
            'pageTitle'    => 'Inquiries',
            'pageSubtitle' => 'Customer questions and support requests',
            'route'        => 'inquiries',
        ]);
    }

    public function integrations()
    {
        return view('integrations', [
            'pageTitle'    => 'Integrations',
            'pageSubtitle' => 'Facebook Connect and third-party services',
            'route'        => 'integrations',
        ]);
    }

    public function security()
    {
        return view('security', [
            'pageTitle'    => 'Security',
            'pageSubtitle' => 'Change Password and account security',
            'route'        => 'security',
        ]);
    }

    public function settings()
    {
        return view('settings', [
            'pageTitle'    => 'Settings',
            'pageSubtitle' => 'Manage your account preferences',
            'route'        => 'settings',
        ]);
    }
}
