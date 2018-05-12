
php artisan tinker

DB::table('users')->insert(['name'=>'Toby', 'created_at'=>new DateTime, 'updated_at'=>new DateTime]);

DB::table('mobiles')->insert(['number'=>'680345335', 'userid'=>'1', 'created_at'=>new DateTime, 'updated_at'=>new DateTime]);


Creamos hasmany...

 App\user::find(1)->mobile;

 ...

 https://www.youtube.com/watch?v=-PXpZGYEBwY