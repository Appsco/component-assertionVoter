<?php
include_once '../vendor/autoload.php';
use BWC\Component\AssertionVoter;

$assertions = [
    'appsco' => [
        'guid'      => '1234567890',
        'email'     => 'info@appsco.com',
        'username'  => 'info@appsco.com',
        'name'      => 'John Doe'
    ],
    'mnet' => [
        'userId'        => '22',
        'club_owner'    => false,
        'club_id'       => 13,
        'first_name'    => 'John',
        'last_name'     => 'Doe'
    ]
];

$table = new AssertionVoter\DecisionManager();

$table
    ->addVoter(new AssertionVoter\VoterSimple('mnet',   'club_owner', true,              'ROLE_ADMIN'))
    ->addVoter(new AssertionVoter\VoterSimple('mnet',   'club_id',    13,                'ROLE_MNET_CLIENT'))
    ->addVoter(new AssertionVoter\VoterSimple('appsco', 'email',      'info@appsco.com', 'ROLE_APPSCO_CLIENT'))
    ->addVoter(new AssertionVoter\VoterSimple('appsco', 'guid',       '1234567890',      'ROLE_ADMIN')
    );

$roles = $table->evaluate($assertions);

var_dump($roles);