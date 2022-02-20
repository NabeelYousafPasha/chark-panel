<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\PermissionRegistrar;

class PermissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (auth()->user()->cannot('view_permission_role'))
            return $this->permissionDenied('dashboard.index');

        $restrictedPermissions = [
            'create_permission_role',
            'view_permission_role',
            'update_permission_role',
            'delete_permission_role',
        ];

        $roles = Role::exceptAdmin()->pluck('name', 'id');
        $permissions = Permission::orderBy('id')
            ->whereNotIn('permissions.name', $restrictedPermissions)
            ->pluck('name', 'id');

        $permissions_roles = DB::table(config('permission.table_names.role_has_permissions'))
            ->select(DB::raw('CONCAT(permission_id,"-",role_id) AS detail'))
            ->join('permissions', config('permission.table_names.role_has_permissions').'.permission_id', '=', 'permissions.id')
            ->whereNotIn('permissions.name', $restrictedPermissions)
            ->pluck('detail')
            ->all();

        return $this->renderView('dashboard.pages.permission_role.index', [
            'roles' => $roles,
            'permissions' => $permissions,
            'permissions_roles' => $permissions_roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (auth()->user()->cannot('create_permission_role'))
            return $this->permissionDenied('dashboard.index');

        $data = [];
        $permissions_roles = ($request->input('permissions_roles')) ?: [];
        foreach($permissions_roles as $perm => $roles)
            foreach($roles as $role => $value)
                $data[] = array('permission_id' => $perm, 'role_id' => $role);

        // forgetting previous cached data
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();

        DB::transaction(function () use ($data) {
            DB::table(config('permission.table_names.role_has_permissions'))->whereNotIn('role_id', [
                Role::where('name', Role::ADMIN)->first()->id
            ])->delete();
            DB::table(config('permission.table_names.role_has_permissions'))->insert($data);
        });

        $this->message('successMessage');

        return redirect()->route('dashboard.setup.permissions_roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @param mixed $view
     * @param array $withParams
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function renderView($view, array $withParams = [])
    {
        $params = [
            'page' => trans('lang.sidebar.permissions_roles'),
            'resource' => null,
            'translationFromKey' => null,
            'crud' => [
                'create' => 'javascript:void(0)',
            ],
            'breadcrumbs' => array(
                [
                    'name' => trans('lang.sidebar.permissions_roles'),
                    'route' => 'javascript:void(0)',
                    'active' => true,
                ],
            ),
        ];
        return parent::renderView($view, array_merge($withParams, $params));
    }
}
