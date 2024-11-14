<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use App\Models\OrderHeader; // Assuming the OrderHeader model exists
use App\Models\OrderItem;
use App\Models\Status;  // Import the Status model
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{



    public function superAdmin()
    {
        // Your logic for the SuperAdmin dashboard
        return view('superadmin.dashboard'); // Make sure you have this view created
    }


    public function staff()
    {
        // Get the logged-in user's total requisitions
        $totalRequisitions = OrderHeader::where('user_id', Auth::id())->count();

        // Get the total approved requisitions
        $totalApproved = OrderHeader::where('user_id', Auth::id())
            ->whereHas('status', function($query) {
                $query->where('name', 'approved');
            })
            ->count();

        // Get the total rejected requisitions
        $totalRejected = OrderHeader::where('user_id', Auth::id())
            ->whereHas('status', function($query) {
                $query->where('name', 'rejected');
            })
            ->count();

        // Get the total pending requisitions
        $totalPending = OrderHeader::where('user_id', Auth::id())
            ->whereHas('status', function($query) {
                $query->where('name', 'pending');
            })
            ->count();

        // Get requisition trends (count per month)
        $monthlyTrends = OrderHeader::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as order_count')
            ->where('user_id', Auth::id())
            ->groupBy('year', 'month')
            ->orderByDesc('year')
            ->orderByDesc('month')
            ->get();

        // Get most requested items per month
        $mostRequestedItems = OrderHeader::join('order_item', 'order_item.order_id', '=', 'order_headers.id')
            ->select(
                DB::raw('MONTH(order_headers.created_at) as month'), // Month from order date
                'order_item.item_id',
                DB::raw('count(*) as count')
            )
            ->where('order_headers.user_id', Auth::id())
            ->groupBy('month', 'order_item.item_id') // Group by month and item
            ->orderByDesc('count')
            ->get();

        // Month labels for Chart.js
        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        // Initialize data structure for chart
        $monthlyTrendsData = [];
        $monthlyTrendsLabels = array_values($months);

        // Process the most requested items per month
        foreach ($mostRequestedItems as $item) {
            $itemName = Item::find($item->item_id)->name ?? 'Unknown Item';

            // Ensure each item has an entry in monthlyTrendsData with all months initialized to 0
            if (!isset($monthlyTrendsData[$itemName])) {
                $monthlyTrendsData[$itemName] = array_fill(1, 12, 0); // Initialize all months with 0
            }

            // Populate the specific month's count
            $monthlyTrendsData[$itemName][$item->month] = $item->count;
        }

        $requisitions = OrderHeader::with('orderItems') // Eager load the order items
        ->where('user_id', Auth::id()) // Filter by the authenticated user's ID
        ->orderBy('created_at', 'desc') // Order by 'created_at' in descending order
        ->paginate(5); // Paginate by 5 items per page



        $currentMonth = now()->month;
    $previousMonth = now()->subMonth()->month;

    // Get the top requested item for the current month
    $topRequestedCurrentMonth = OrderHeader::join('order_item', 'order_item.order_id', '=', 'order_headers.id')
        ->select('order_item.item_id', DB::raw('count(*) as count'))
        ->where('order_headers.user_id', Auth::id())
        ->whereMonth('order_headers.created_at', $currentMonth)
        ->groupBy('order_item.item_id')
        ->orderByDesc('count')
        ->first();

    // Get the top requested item for the previous month
    $topRequestedPreviousMonth = OrderHeader::join('order_item', 'order_item.order_id', '=', 'order_headers.id')
        ->select('order_item.item_id', DB::raw('count(*) as count'))
        ->where('order_headers.user_id', Auth::id())
        ->whereMonth('order_headers.created_at', $previousMonth)
        ->groupBy('order_item.item_id')
        ->orderByDesc('count')
        ->first();

    // Fetch the item names
    $topRequestedCurrentItemName = $topRequestedCurrentMonth ? Item::find($topRequestedCurrentMonth->item_id)->name : 'N/A';
    $topRequestedPreviousItemName = $topRequestedPreviousMonth ? Item::find($topRequestedPreviousMonth->item_id)->name : 'N/A';

        // Pass data to the view
        return view('staff.dashboard', [
            'totalRequisitions' => $totalRequisitions,
            'totalApproved' => $totalApproved,
            'totalRejected' => $totalRejected,
            'totalPending' => $totalPending,
            'monthlyTrends' => $monthlyTrends,
            'monthlyTrendsLabels' => $monthlyTrendsLabels,
            'monthlyTrendsData' => $monthlyTrendsData,
            'requisitions'=>$requisitions,
            'topRequestedCurrentItem' => $topRequestedCurrentItemName,
            'topRequestedCurrentCount' => $topRequestedCurrentMonth->count ?? 0,
            'topRequestedPreviousItem' => $topRequestedPreviousItemName,
            'topRequestedPreviousCount' => $topRequestedPreviousMonth->count ?? 0,
        ]);
    }
    public function Admin()
    {
        // Get the total requisitions for all users
        $totalRequisitions = OrderHeader::count();

        // Get the total approved requisitions for all users
        $totalApproved = OrderHeader::whereHas('status', function($query) {
                                    $query->where('name', 'approved');
                                })
                                ->count();

        // Get the total rejected requisitions for all users
        $totalRejected = OrderHeader::whereHas('status', function($query) {
                                    $query->where('name', 'rejected');
                                })
                                ->count();

        // Get the total pending requisitions for all users
        $totalPending = OrderHeader::whereHas('status', function($query) {
                                    $query->where('name', 'pending');
                                })
                                ->count();

        // Get the requisition trends (count of requisitions per month for all users)
        $monthlyTrends = OrderHeader::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as order_count')
                                    ->groupBy('year', 'month')
                                    ->orderByDesc('year')
                                    ->orderByDesc('month')
                                    ->get();

        // Initialize an array to store the monthly labels and data
        $monthlyTrendsLabels = [];
        $monthlyTrendsData = [];

        foreach ($monthlyTrends as $trend) {
            $monthlyTrendsLabels[] = $trend->month . '/' . $trend->year; // E.g., 12/2024
            $monthlyTrendsData[] = $trend->order_count;
        }

        // Fetch the requisitions for all users with pagination
        $requisitions = OrderHeader::with('orderItems')
            ->orderByDesc('created_at') // Order by creation date (most recent first)
            ->paginate(5); // Paginate with 5 items per page

        // Fetch the most recent requisitions (optional - limit to 5 for display)
        $recentRequisitions = OrderHeader::with('orderItems')
            ->orderByDesc('created_at') // Order by creation date (most recent first)
            ->limit(5) // Limit to the 5 most recent requisitions
            ->get();

        // Get the most requested item for the current month across all users
        $topRequestedCurrentMonth = OrderHeader::join('order_item', 'order_item.order_id', '=', 'order_headers.id')
            ->select(DB::raw('MONTH(order_headers.created_at) as month'), 'order_item.item_id', DB::raw('count(*) as count'))
            ->whereRaw('MONTH(order_headers.created_at) = ?', [now()->month])
            ->groupBy('month', 'order_item.item_id')
            ->orderByDesc('count')
            ->first(); // Get only the top requested item for this month

        // Get the most requested item for the previous month across all users
        $topRequestedPreviousMonth = OrderHeader::join('order_item', 'order_item.order_id', '=', 'order_headers.id')
            ->select(DB::raw('MONTH(order_headers.created_at) as month'), 'order_item.item_id', DB::raw('count(*) as count'))
            ->whereRaw('MONTH(order_headers.created_at) = ?', [now()->subMonth()->month])
            ->groupBy('month', 'order_item.item_id')
            ->orderByDesc('count')
            ->first(); // Get only the top requested item for last month

        // Get item names (assuming Item model exists and has a 'name' field)
        $topRequestedCurrentItemName = Item::find($topRequestedCurrentMonth->item_id)->name ?? 'Unknown Item';
        $topRequestedPreviousItemName = Item::find($topRequestedPreviousMonth->item_id)->name ?? 'Unknown Item';

        // Pass the data to the view
        return view('admin.dashboard', [
            'totalRequisitions' => $totalRequisitions,
            'totalApproved' => $totalApproved,
            'totalRejected' => $totalRejected,
            'totalPending' => $totalPending,
            'monthlyTrends' => $monthlyTrends,
            'monthlyTrendsLabels' => $monthlyTrendsLabels,
            'monthlyTrendsData' => $monthlyTrendsData,
            'requisitions' => $requisitions,
            'recentRequisitions' => $recentRequisitions, // Add recently created requisitions
            'topRequestedCurrentItem' => $topRequestedCurrentItemName,
            'topRequestedCurrentCount' => $topRequestedCurrentMonth->count ?? 0,
            'topRequestedPreviousItem' => $topRequestedPreviousItemName,
            'topRequestedPreviousCount' => $topRequestedPreviousMonth->count ?? 0,
        ]);
    }

}
