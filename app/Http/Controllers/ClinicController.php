<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        if (auth()->user()->cannot('view_clinic'))
            return $this->permissionDenied('dashboard.index');

        $clinics = Clinic::query();

        return $this->renderView('dashboard.pages.clinic.index', [
            'clinics' => $clinics->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        if (auth()->user()->cannot('create_clinic'))
            return $this->permissionDenied('dashboard.index');

        $form = $this->setForm(route('dashboard.clinics.store'), 'POST', 'dashboard.pages.clinic._form', [
            'form_id' => 'create_form__clinic',
            'form_name' => 'create_form__clinic',
        ]);

        return $this->renderView('dashboard.pages.clinic.form', [
            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (auth()->user()->cannot('create_clinic'))
            return $this->permissionDenied('dashboard.index');

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255',],
            'details' => ['nullable', 'string', 'max:255',],
        ]);

        $clinic = Clinic::create(array_merge($request->all(), [
            'created_by' => auth()->id(),
        ]));

        (! $clinic) ? $this->message('errorMessage') : $this->message('successMessage');

        return redirect()->route('dashboard.clinics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Clinic $clinic)
    {
        if (auth()->user()->cannot('update_clinic'))
            return $this->permissionDenied('dashboard.index');

        $form = $this->setForm(route('dashboard.clinics.update', $clinic), 'POST', 'dashboard.pages.clinic._form', [
            'form_id'     => 'edit_form__clinic',
            'form_name'   => 'edit_form__clinic',
            'crud_action' => trans('lang.actions.edit'),
        ], 'PATCH');

        return $this->renderView('dashboard.pages.clinic.form', [
            'form' => $form,
            'clinic' => $clinic,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Clinic $clinic)
    {
        if (auth()->user()->cannot('update_clinic'))
            return $this->permissionDenied('dashboard.index');

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255',],
            'details' => ['nullable', 'string', 'max:255',],
        ]);

        $updated = $clinic->update($request->all());
        (! $updated) ? $this->message('errorMessage') : $this->message('successMessage');

        return redirect()->route('dashboard.clinics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Clinic $clinic)
    {
        if (auth()->user()->cannot('delete_clinic'))
            return $this->permissionDenied('dashboard.index');

        $delete = $clinic->delete();
        (! $delete) ? $this->message('errorMessage') : $this->message('successMessage', 'Success: Deleted successfully');

        return redirect()->route('dashboard.clinics.index');
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
            'page' => 'Clinics',
            'resource' => 'Clinic',
            'translationFromKey' => 'lang.models.clinic.fillable',
            'crud' => [
                'CREATE_CLINIC' => [
                    'route' => route('dashboard.clinics.create'),
                    'can' => ! auth()->user()->cannot('create_clinic'),
                ],
                'EDIT_CLINIC' => [
                    'can' => ! auth()->user()->cannot('update_clinic'),
                ],
                'DELETE_CLINIC' => [
                    'can' => ! auth()->user()->cannot('delete_clinic'),
                ],
            ],
            'breadcrumbs' => array(
                [
                    'name' => 'clinics',
                    'route' => route('dashboard.clinics.index'),
                    'active' => true,
                ],
            ),
        ];
        return parent::renderView($view, array_merge($withParams, $params));
    }
}
