<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$q = \App\Models\Quiz::orderBy('id')->first();
if ($q) {
    $q->zep_link = 'https://quiz.zep.us/id/play/0Eg4VQ';
    $q->save();
    echo "Updated first quiz!\n";
} else {
    echo "No quiz found!\n";
}
