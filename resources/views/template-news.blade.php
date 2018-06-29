{{--
  Template Name: News
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

<div class="container">
	<div class="row">
		<div class="col-md-9">
		@while (have_posts()) @php(the_post())
    		@include('partials.content-'.get_post_type())
  		@endwhile
	</div>
	<div class="col-md-3">
		@include('partials.sidebar')	
	</div>
	</div>
</div>	

  {!! get_the_posts_navigation() !!}
@endsection