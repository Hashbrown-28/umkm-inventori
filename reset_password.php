<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = User::where('email', 'admin@umkm.com')->first();
$user->password = Hash::make('12345678');
$user->save();
echo "Password successfully reset to: 12345678\n";
