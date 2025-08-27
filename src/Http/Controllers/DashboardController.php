<?php

namespace Ihasan\SocialShop\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'kpis' => $this->getKpiData(),
            'recentOrders' => $this->getRecentOrders(),
            'activities' => $this->getActivityTimeline(),
            'title' => 'Shop Overview'
        ]);
    }

    private function getKpiData(): array
    {
        return [
            [
                'title' => 'Revenue',
                'value' => '$47,829',
                'change' => '+18.2%',
                'changeText' => 'vs last month',
                'trend' => 'up',
                'icon' => 'dollar',
                'color' => 'green'
            ],
            [
                'title' => 'Orders',
                'value' => '1,247',
                'change' => '+12.5%',
                'changeText' => 'vs last month',
                'trend' => 'up',
                'icon' => 'orders',
                'color' => 'blue'
            ],
            [
                'title' => 'Low Stock',
                'value' => '23',
                'change' => 'Needs attention',
                'trend' => 'warning',
                'icon' => 'warning',
                'color' => 'orange'
            ],
            [
                'title' => 'Shop Health',
                'value' => '94%',
                'change' => 'Excellent',
                'trend' => 'up',
                'icon' => 'check',
                'color' => 'green'
            ]
        ];
    }

    private function getRecentOrders()
    {
        return [
            [
                'id' => '#1247',
                'product' => 'Wireless Bluetooth Headphones',
                'customer' => 'Sarah Johnson',
                'time' => '2 hours ago',
                'amount' => '$89.99',
                'status' => 'completed',
                'color' => 'meta-blue'
            ],
            [
                'id' => '#1246',
                'product' => 'Smart Fitness Watch',
                'customer' => 'Mike Chen',
                'time' => '4 hours ago',
                'amount' => '$199.99',
                'status' => 'processing',
                'color' => 'blue'
            ],
            // Add more orders...
        ];
    }

    private function getActivityTimeline()
    {
        return [
            [
                'id' => 1,
                'title' => 'Order #1247 completed',
                'description' => 'Customer received Wireless Bluetooth Headphones',
                'time' => '2 hours ago',
                'type' => 'success',
                'icon' => 'check'
            ],
            [
                'id' => 2,
                'title' => 'New product added',
                'description' => 'Gaming Mouse Pro added to catalog',
                'time' => '3 hours ago',
                'type' => 'info',
                'icon' => 'plus'
            ],
            // Add more activities...
        ];
    }
}