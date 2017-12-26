@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Извините но такой страницы не существует :(', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
@endsection
