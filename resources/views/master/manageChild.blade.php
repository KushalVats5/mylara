<div>
	@foreach($childs as $child)
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 {{ $child->id }}">
		<div class="i-checks pull-left">
			<label>
				<input type="checkbox" name="category[]" value="{{ $child->id }}"> <i></i>  {{ $child->title }}
			</label>
		</div>
		@if(count($child->childs))
		@include('master/manageChild',['childs' => $child->childs])
		@endif
	</div>
	@endforeach
</div>	