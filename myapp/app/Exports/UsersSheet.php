<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsersSheet implements FromCollection,WithHeadings, WithTitle
{
    
    protected $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function collection()
    {
        return User::where('id',$this->id)->get();
    }

    public function headings():array
    {
        return [
            '#',
            'name',
            'email',
        ];
    }

    public function title(): string
    {
        return 'test' . $this->id;
    }

}
