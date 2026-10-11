<?php

// The business's own details, printed on every document. Set them in .env; keep real details out of the repository.
return [
    'name' => env('COMPANY_NAME', env('APP_NAME', 'Laravel')),
    'address' => env('COMPANY_ADDRESS', ''),
    'tin' => env('COMPANY_TIN', ''),
    'vat' => env('COMPANY_VAT', 'VAT-registered'),
];
