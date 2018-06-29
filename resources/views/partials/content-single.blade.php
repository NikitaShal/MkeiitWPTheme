<br>
<article class="container" @php(post_class())>

	<div class="row">
		<div class="col-md-9">
			<header>
			<h1 class="entry-title">{{ get_the_title() }}</h1>
				@include('partials/entry-meta')
			</header>
			<div class="entry-content">
				@php(the_content())
			</div>
		</div>
	<div class="col-md-3">
		@include('partials.sidebar')		
	</div>
		</div>
</article>
