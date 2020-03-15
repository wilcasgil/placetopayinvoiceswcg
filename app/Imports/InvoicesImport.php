<?php

namespace App\Imports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvoicesImport implements ToModel, WithHeadingRow
{
        
    /**
     * model
     *
     * @param  mixed $row
     * @return void
     */
    public function model(array $row)
    {
        $invoice = new Invoice;

        $invoice->due_date = $row['due_date'];
        $invoice->payment_type_id = $row['payment_type_id'];
        $invoice->client_id = $row['client_id'];
        $invoice->invoice_state_id = $row['invoice_state_id'];

        return $invoice;
    }

    public function rules(): array
    {
        return [
            '*.due_date' => ['bail','required'],
            '*.payment_type_id' => ['bail','required', 'numeric'],
            '*.client_id' => ['bail','required', 'numeric'],
            '*.invoice_state_id' => ['bail','required', 'numeric'],
        ];
    }
}
