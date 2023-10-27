<?php
namespace App\Imports;

use App\Models\Contact;
use App\Models\ListContact;
use App\Models\Blacklist;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    private $listId;

    public function __construct($listId)
    {
        $this->listId = $listId;
    }

    public function model(array $row)
    {
        // Check if a contact with the same 'number' already exists in the database
        $existingContact = Contact::where('number', $row['number'])->first();
        $blacklist = Blacklist::where('number', $row['number'])->first();
        if($blacklist){
            return null;
        }

        if ($existingContact) {
            // If the contact with the same number exists, create a ListContact entry
            ListContact::create([
                'list_id' => $this->listId,
                'contact_id' => $existingContact->id
            ]);
            return null;
        }

        // If no existing contact is found, create a new one with the specified list_id
        $newContact = new Contact([
            'list_id'   => $this->listId,
            'name'      => $row['name'],
            'number'    => $row['number'],
        ]);

        $newContact->save();

        // Create a ListContact entry for the newly created contact
        ListContact::create([
            'list_id' => $this->listId,
            'contact_id' => $newContact->id
        ]);

        return $newContact;
    }
}
