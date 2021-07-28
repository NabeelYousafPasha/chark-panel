<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param mixed $callback
     * @param mixed|null $msg
     * @param string $toastr
     *
     * @return void
     */
    public function message($callback, $msg = null, $toastr = null)
    {
        $status = $this->$callback($toastr, $msg);
        return request()->session()->flash($status['toastr'], $status['msg']);
    }


    /**
     *
     * @param string $toastr
     * @param mixed|null $message
     *
     * @return array
     */
    public function successMessage($toastr, $message = null)
    {
        return array(
            'toastr'    => $toastr ?? 'successToastr',
            'msg'       => $message ?? "Success: Data submitted successfully.",
        );
    }

    /**
     *
     * @param string $toastr
     * @param mixed|null $message
     *
     * @return array
     */
    public function errorMessage($toastr, $message = null)
    {
        return array(
            'toastr'    => $toastr ?? 'errorToastr',
            'msg'       => $message ?? "Error: Some Error occured.",
        );
    }


    /**
     * Redirect If denial of permission
     *
     * @param string $route
     * @param mixed|null $param
     * @param null $message
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function permissionDenied($route = '/', $param = null, $message = [])
    {
        $status = array(
            'msg' => $message['msg'] ?? "Permission Denied: You don't have permission to perform this action.",
            'toastr' => $message['toastr'] ?? "warningToastr"
        );

        request()->session()->flash($status['toastr'], $status['msg']);
        return redirect()->route($route, $param);
    }

    /**
     *
     * @param mixed $action
     * @param mixed $method
     * @param mixed $view
     * @param array $formParams
     * @param string $_method
     * @param mixed $enctype
     *
     * @return array
     */
    protected function setForm($action, $method, $view, array $formParams, $_method = 'POST', $enctype = false)
    {
        return [
            'action'        => $action ?? 'javascript::void(0)',
            'method'        => in_array($method, ['GET', 'POST']) ? $method : 'POST',
            'enctype'       => $enctype,
            '_method'       => $_method,
            'include_view'  => $view,

            'id'            => $formParams['form_id'] ?? 'form__global',
            'name'          => $formParams['form_name'] ?? 'form__global',
            'crud_action'   => $formParams['crud_action'] ?? 'Save',
        ];
    }

    /**
     * Return View
     *
     * @param mixed $view
     * @param array $withParams
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    protected function renderView($view, array $withParams = [])
    {
        $params = [
            'actions' => [
                'view'   => trans('lang.actions.view'),
                'add'   => trans('lang.actions.add'),
                'edit'  =>  trans('lang.actions.edit'),
                'delete' => trans('lang.actions.delete'),
                'enable' => trans('lang.actions.enable'),
                'disable' => trans('lang.actions.disable'),
            ],
            'modalDelete' => 'dashboard.globals.modal.modal__delete',
            'breadcrumbs' => $this->setBreadcrumb($withParams['breadcrumbs'] ?? []),
        ];
        return view($view)->with(array_merge($withParams, $params));
    }

    /**
     * Set Breadcrumbs
     *
     * @param array $breadcrumbs
     *
     * @return array
     */
    private function setBreadcrumb(array $breadcrumbs)
    {
        $default[] = [
            'name' => trans('lang.sidebar.home'),
            'route' => route('/'),
            'active' => is_null($breadcrumbs) ? true : false,
        ];
        return array_merge($default, $breadcrumbs);
    }
}
