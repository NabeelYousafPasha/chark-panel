<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        return $this->renderView('dashboard.index');
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
            'page' => 'Home',
            'resource' => '',
            'translationFromKey' => '',
            'crud' => [
                'CREATE_PATIENT' => [
                    'route' => route('dashboard.patients.create'),
                    'can' => ! auth()->user()->cannot('create_patient'),
                ],
            ],
        ];
        return parent::renderView($view, array_merge($withParams, $params));
    }
}
