<?php

// The business's own details, printed on every document. Set them in .env; keep real details out of the repository.
return [
    'name' => env('COMPANY_NAME', env('APP_NAME', 'Laravel')),
    'address' => env('COMPANY_ADDRESS', ''),
    'tin' => env('COMPANY_TIN', ''),
    'vat' => env('COMPANY_VAT', 'VAT-registered'),
    // Where documents are emailed from. The Settings page sets it; this is its first value.
    'email' => env('COMPANY_EMAIL', env('MAIL_FROM_ADDRESS')),
    // Whether BIR has made the company a top withholding agent, which withholds 1% on goods and 2% on services from regular suppliers.
    'top_withholding_agent' => (bool) env('COMPANY_TOP_WITHHOLDING_AGENT', false),
];
