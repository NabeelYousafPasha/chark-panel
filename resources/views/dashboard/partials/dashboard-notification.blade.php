@if($dashboardNotifications ?? '' && ! empty($dashboardNotifications))
<div class="row border-bottom" style="border-bottom: 5px solid #e7eaec !important;">
    <div style="margin-left: 20px; margin-right: 20px;">
        @foreach($dashboardNotifications ?? [] as $notification)
            <div class="widget navy-bg">
                <div class="row">
                    <div class="col-md-1">
                        <i class="fa fa-bell fa-2x fa-fw"></i>
                    </div>
                    <div class="col-md-11">
                        <p>
                            <strong>
                                {{ $notification->title }}
                            </strong>
                            {{ $notification->description }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
