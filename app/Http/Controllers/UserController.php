<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Rules\MatchesCurrentPasswordRule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param bool $forcedChange
     * @param \App\User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function changePassword(Request $request, $forcedChange = false, ?User $user = null)
    {
        $rules = [
            'old_password' => ['required', new MatchesCurrentPasswordRule(),],
            'password' => ['required', 'string', 'min:8', 'confirmed',],
        ];

        $changePasswordUser = auth()->user();

        if ($forcedChange == true
            && $user != null
            && auth()->user()->hasRole(Role::ADMIN)
        ) {
            // force change does not need old password
            unset($rules['old_password']);

            // password to be changed for user requested, otherwise LoggedIn user
            $changePasswordUser = $user;
        }

        $route = route('users.password.update', [
            'forceChange' => $forcedChange ? 1 : 0,
            'user' => $changePasswordUser,
        ]);

        // GET -> render view
        if ($request->isMethod('GET')) {

            $form = $this->setForm($route, 'POST', 'dashboard.pages.user.profile.password', [
                'form_id' => 'edit_form__user_password',
                'form_name' => 'edit_form__user_password',
            ], 'PATCH');

            return $this->renderView('dashboard.pages.user.form', [
                'form' => $form,
                'user' => $changePasswordUser,
                'forcedChange' => $forcedChange,
            ]);
        }

        // PATCH -> change password
        $this->validate($request, $rules);

        $updatePassword = $changePasswordUser->fill([
                'password' => Hash::make($request->input('password'))]
        )->save();

        (! $updatePassword) ? $this->message('errorMessage') : $this->message('successMessage', 'Success: Password Changed successfully');

        return redirect()->route('dashboard.index');
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
            'page' => 'Profile',
            'resource' => 'User',
            'translationFromKey' => 'lang.models.user.fillable',
            'crud' => [
                'create' => 'javascript:void(0)',
            ],
            'breadcrumbs' => array(
                [
                    'name' => 'Profile',
                    'route' => 'javascript:void(0)',
                    'active' => true,
                ],
            ),
        ];
        return parent::renderView($view, array_merge($withParams, $params));
    }
}
