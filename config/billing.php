<?php

return [
    'plans' => [
        'starter' => [
            'name' => 'Bronze',
            'id' => env('STRIPE_PRICE_BRONZE', 'price_1TFDchBe408SN3kdXW5gfCjI'),
            'price' => 250,
            'features' => ['10 Properties', 'Basic Analytics', 'Email Support'],
        ],
        'professional' => [
            'name' => 'Silver',
            'id' => env('STRIPE_PRICE_SILVER', 'price_1TFDojBe408SN3kdL8SDrF5J'),
            'price' => 375,
            'features' => ['Unlimited Properties', 'Advanced Analytics', 'Priority Support'],
        ],
        'enterprise' => [
            'name' => 'Gold',
            'id' => env('STRIPE_PRICE_GOLD', 'price_1TFEMJBe408SN3kdZs3Jbgos'),
            'price' => 525,
            'features' => ['Custom Branding', 'API Access', 'Dedicated Account Manager'],
        ],
    ],
];