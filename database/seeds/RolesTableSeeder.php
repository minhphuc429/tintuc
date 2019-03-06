<?php

use Illuminate\Database\Seeder;
use App\Repositories\RoleRepository as Role;

class RolesTableSeeder extends Seeder
{
    /**
     * @var Role
     */
    protected $role;

    /**
     * RolesTableSeeder constructor.
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = $this->role->create([
            'name' => 'Phóng viên',
            'slug' => 'author',
            'permissions' => json_encode([
                'post.create' => true,
            ])
        ]);
        $editor = $this->role->create([
            'name' => 'Biên tập viên',
            'slug' => 'editor',
            'permissions' => json_encode([
                'post.update' => true,
                'post.publish' => true,
            ])
        ]);
    }
}
