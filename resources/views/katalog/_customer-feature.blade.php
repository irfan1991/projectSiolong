
@if (Auth::check())
@if(Auth::user()->role!='admin')
@include($partial_view, isset($data) ? $data : [])
@elseif (auth()->guest())
@include($partial_view, isset($data) ? $data : [])
@endif
@endif