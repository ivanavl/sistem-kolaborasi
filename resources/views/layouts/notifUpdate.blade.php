@php
    $count = App\Http\Controllers\PagesController::notifUpdate();
@endphp

@if($count > 0)
    <span class="badge badge-danger">
        {{$count}}
    </span>
@endif