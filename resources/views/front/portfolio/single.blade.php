@extends('front.app')
@section('content')
@include('front.inc.header')
    <div id="cover">
      {!! $portfolio->translationByLanguage($lang->id)->first()->body !!}
    </div>
@include('front.inc.footer')
@stop
