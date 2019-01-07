<ul>
@foreach($childs as $child)
	<li>
	    {{ $child->title }}
	@if(count($child->childs))
            @include('master/manageChild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>	