<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = factory(User::class)->times(50)->make();
      User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

      $user = User::find(1);
      $user->name = 'Liuzhehao';
      $user->email = '244893232@qq.com';
      $user->password = bcrypt('password');
      $user->is_admin = true;
      $user->save();

      $user = User::find(2);
      $user->name = 'Liuzhehao2';
      $user->email = '123456@qq.com';
      $user->password = bcrypt('password');
      $user->is_admin = true;
      $user->save();
    }
}
