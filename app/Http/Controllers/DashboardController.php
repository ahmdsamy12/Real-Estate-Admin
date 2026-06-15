<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with statistics and recent properties.
     */
    public function index(): View
    {
        $stats = [
            [
                'label'   => 'Total Properties',
                'value'   => '248',
                'change'  => '+12% this month',
                'trend'   => 'up',
                'icon'    => 'bi-buildings',
                'accent'  => 'stat-accent-blue',
                'icon_bg' => 'bg-brand-50 text-brand-600',
            ],
            [
                'label'   => 'Total Clients',
                'value'   => '1,847',
                'change'  => '+5.3% this month',
                'trend'   => 'up',
                'icon'    => 'bi-people',
                'accent'  => 'stat-accent-emerald',
                'icon_bg' => 'bg-emerald-50 text-emerald-600',
            ],
            [
                'label'   => 'New Requests',
                'value'   => '34',
                'change'  => '+8 since yesterday',
                'trend'   => 'up',
                'icon'    => 'bi-bell',
                'accent'  => 'stat-accent-amber',
                'icon_bg' => 'bg-amber-50 text-amber-600',
            ],
            [
                'label'   => 'Total Sales',
                'value'   => '$4.2M',
                'change'  => '+18% vs last quarter',
                'trend'   => 'up',
                'icon'    => 'bi-graph-up-arrow',
                'accent'  => 'stat-accent-rose',
                'icon_bg' => 'bg-rose-50 text-rose-600',
            ],
        ];

        $recentProperties = $this->getRecentProperties();

        return view('pages.dashboard', compact('stats', 'recentProperties'));
    }

    /**
     * Return the 5 most recent properties for the dashboard table.
     */
    private function getRecentProperties(): array
    {
        $all = app(PropertyController::class)->getAllProperties();
        return array_slice($all, 0, 5);
    }
}
