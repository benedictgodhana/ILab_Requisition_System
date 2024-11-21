<?php
namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemsExport implements FromCollection
{
    protected $search;
    protected $reorderLevel;

    // Constructor to accept filters
    public function __construct($search, $reorderLevel)
    {
        $this->search = $search;
        $this->reorderLevel = $reorderLevel;
    }

    public function collection()
    {
        // Build the query based on filters
        $query = Item::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('unique_code', 'like', '%' . $this->search . '%');
        }

        if ($this->reorderLevel) {
            $query->where('reorder_level', '<=', $this->reorderLevel);
        }

        return $query->get();
    }
}
