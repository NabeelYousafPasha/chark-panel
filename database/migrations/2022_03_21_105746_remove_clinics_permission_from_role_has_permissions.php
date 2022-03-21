<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RemoveClinicsPermissionFromRoleHasPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $clinic = Permission::where('name', 'LIKE', '%_clinic');

        $clinicPermissions = $clinic->pluck('id')->toArray();

        // remove from role_has_permissions
        DB::table('role_has_permissions')->whereIn('permission_id', $clinicPermissions)->delete();

        // remove from permissions
        $clinic->delete();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
