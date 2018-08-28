@if(session('status_success'))
    <div class="alert alert-success">
        <button class="close" data-close="alert"></button>
            <p> {{ session('status_success') }} </p>
    </div>
@endif
@if(session('status_error'))
    <div class="alert alert-warning">
        <button class="close" data-close="alert"></button>
            <p> {{ session('status_error') }} </p>
    </div>
@endif
@if(session('status_danger'))
    <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
            <p> {{ session('status_danger') }} </p>
    </div>
@endif