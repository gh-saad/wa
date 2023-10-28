<?php
namespace App\Imports;

use App\Models\Blacklist;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BlacklistImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $row['number'] = strval($row['number']);
        // Check if a contact with the same 'number' already exists in the database
        $existingContact = Blacklist::where('number', $row['number'])->first();

        if ($existingContact) {
            return null;
        }

        return new Blacklist([
            'number'    => $row['number']
        ]);
    }
}
