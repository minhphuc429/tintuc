<?php

use Illuminate\Database\Seeder;
use App\Repositories\RoleRepository as Role;
use App\Repositories\UserRepository as User;

class UsersTableSeeder extends Seeder
{
    protected $role, $user;

    public function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = $this->role->findBy('slug', 'author')->first();
        $editor = $this->role->findBy('slug', 'editor')->first();

        $user1 = $this->user->create([
            'name' => 'Phóng viên 1',
            'email' => 'pv1@homestead.test',
            'email_verified_at' => now(),
            'password' => bcrypt('secret')
        ]);
        $user1->roles()->attach($author);

        $user2 = $this->user->create([
            'name' => 'Phóng viên 2',
            'email' => 'pv2@homestead.test',
            'email_verified_at' => now(),
            'password' => bcrypt('secret')
        ]);
        $user2->roles()->attach($author);

        $user3 = $this->user->create([
            'name' => 'Biên tập viên 1',
            'email' => 'btv1@homestead.test',
            'email_verified_at' => now(),
            'password' => bcrypt('secret')
        ]);
        $user3->roles()->attach($editor);

        factory(App\Models\User::class, 10)->create();
    }
}
