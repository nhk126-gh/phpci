<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

// class UsersExport implements FromCollection,WithHeadings, WithTitle,WithMultipleSheets
class UsersExport implements WithMultipleSheets
{
    // use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return User::select('id','name','email')->get();
    // }

    // public function headings():array
    // {
    //     return [
    //         '#',
    //         'name',
    //         'email',
    //     ];
    // }

    // public function title(): string
    // {
    //     return 'test';
    // }

    public function sheets(): array
    {
        $sheets = [];
        for($i = 1; $i <= 3; $i++){
            $sheets[] = new UsersSheet($i);
        }
        return $sheets;
    }
}
