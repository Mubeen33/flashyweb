<ul class="breadcrumb">
    <li><a href="{{url('/')}}">Home</a></li>
    <?php $segments = Request::segments();?>
    @foreach($segments as $segment)
        <li>
        	@if(end($segments) == $segment)
        		{{$segment}}
        	@else
            	<a href="#">{{$segment}}</a>
            @endif
        </li>
    @endforeach
</ul>