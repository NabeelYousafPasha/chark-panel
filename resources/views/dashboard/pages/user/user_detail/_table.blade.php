<div class="row m-b-lg m-t-lg">
    <div class="col-md-4">
        <div class="profile-image">
            <i class="fa-fw fa-5x {{ $userDetail->gender ?? '' != '' ? $userDetail->gender ?? '' ? 'fa fa-male' : 'fa fa-female' : 'fa fa-user' }}"></i>
        </div>
        <div class="profile-info">
            <div class="">
                <div>
                    <h2>
                        {{ $user->name }}
                    </h2>
                    <h4>
                        {{ $user->email }}
                    </h4>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="col-md-8">
        <table class="table small m-b-xs">
            <tbody>
            <tr>
                <td>
                    <strong>{{ trans('lang.models.user.fillable.organization_id') }}</strong>
                    &nbsp;
                    {{ $userOrganization->name }}
                </td>
                <td>
                    <strong>{{ trans('lang.models.role.fillable.name') }}</strong>
                    &nbsp;
                    {{ $userRoles ?? 'N/A' }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>{{ trans('lang.models.user_details.fillable.contact_email') }}</strong>
                    &nbsp;
                    {{ $userDetail->contact_email ?? '' }}
                </td>
                <td>
                    <strong>{{ trans('lang.models.user_details.fillable.cellular_number') }}</strong>
                    &nbsp;
                    {{ $userDetail->cellular_number ?? '' }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>{{ trans('lang.models.user_details.fillable.department') }}</strong>
                    &nbsp;
                    {{ $userDetail->department ?? '' }}
                </td>
                <td>
                    <strong>{{ trans('lang.models.user_details.fillable.designation') }}</strong>
                    &nbsp;
                    {{ $userDetail->designation ?? '' }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>{{ trans('lang.models.user_details.fillable.address') }}</strong>
                    &nbsp;
                    {{ $userDetail->address ?? '' }}
                </td>
                <td>
                    <strong>{{ trans('lang.models.user_details.fillable.country_id') }}</strong>
                    &nbsp;
                    {{ $userDetail->designation ?? '' }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
