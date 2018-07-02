{{--
  Template Name: Страница на карточке
--}}

@extends('layouts.app')

@section('content')
  
<div class="container">
	<div class="postWithCard">
		@include('partials.page-header')
		@while (have_posts()) @php(the_post())
    		@include('partials.content-'.get_post_type())
  		@endwhile
	</div>
</div>	

  {!! get_the_posts_navigation() !!}
@endsection