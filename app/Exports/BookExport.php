<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::select('id','title', 'description', 'quantity')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return ['Id','Title', 'Description', 'Quantity'];
    }
}
