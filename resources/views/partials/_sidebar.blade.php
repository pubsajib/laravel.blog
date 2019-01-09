<div class="sidebarWrapper">
	<h3 class="title">Recent Posts</h3>
	@if ($recent)
		@foreach ($recent as $rp)
			<div id="rp_{{ $rp->id }}" class="RPContainer">
				<hr>
				<h4 class="title"> <a href="{{ route('posts.show', $rp->id) }}"> {{ $rp->title }} </a></h4>
				{{ excerpt($rp->content, 80) }}
			</div>
		@endforeach
	@endif
</div>