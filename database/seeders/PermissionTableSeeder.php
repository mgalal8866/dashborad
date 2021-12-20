<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =[

            'المستخدمين',

            'قائمة المستخدمين',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'صلاحيات المستخدمين',
            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',

            'الاشعارات',

        ];
        foreach ($permissions as $permission)
        {
            Permission::create(['name'=> $permission]);
        }
    }

}
