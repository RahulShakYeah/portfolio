@if(session('subscription'))
    <div class="alert alert-success">
        {{session('subscription')}}
    </div>
@endif

@if(session('subscriptionerror'))
    <div class="alert alert-danger">
        {{session('subscriptionerror')}}
    </div>
@endif
