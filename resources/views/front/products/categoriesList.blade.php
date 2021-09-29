@extends('front.app')
@section('content')
@include('front.inc.header')
<?php
    $pinterest = getContactInfo('pinterest')->translationByLanguage()->first()->value;
    $facebook = getContactInfo('facebook')->translationByLanguage()->first()->value;
    $instagram = getContactInfo('instagram')->translationByLanguage()->first()->value;
    $linkedin = getContactInfo('linkedin')->translationByLanguage()->first()->value;
    $twitter = getContactInfo('twitter')->translationByLanguage()->first()->value;
    $youtube = getContactInfo('youtube')->translationByLanguage()->first()->value;
?>
<div id="cover">
  <div class="retAbsolute">
    <div class="retNav">
      <ul>
        <li><a href="{{$pinterest}}"></a></li>
        <li><a href="{{$facebook}}"></a></li>
        <li><a href="{{$instagram}}"></a></li>
        <li><a href="{{$linkedin}}"></a></li>
        <li><a href="{{$twitter}}"></a></li>
        <li><a href="{{$youtube}}"></a></li>
      </ul>
    </div>
  </div>
  <div class="cats">
    <div class="container">
      <div class="row crumbs">
         <div class="col-auto">
            <ul>
               <li><a href="#">{{trans('front.homeText')}}</a>/</li>
               <li><a href="{{ url($lang->lang.'/catalog/'.$category->alias)}}">{{$category->translationByLanguage($lang->id)->first()->name}}</a></li>
            </ul>
         </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h3>{{$category->translationByLanguage($lang->id)->first()->name}}</h3>
        </div>
      </div>
      <div class="row justify-content-center">
        @if (count($subcategories) > 0)
            @foreach ($subcategories as $subcategory)
                <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                  <div class="catsItem">
                    @if ($subcategory->img)
                     <img src="{{ asset('images/categories/sm/'.$subcategory->img) }}" alt="{{$subcategory->translationByLanguage($lang->id)->first()->image_alt}}" title="{{$subcategory->translationByLanguage($lang->id)->first()->image_title}}" class="itemImg">
                    @else
                     <img src="{{ asset('fronts/img/products/noimage.png') }}" alt="img-advice">
                    @endif
                    <div class="catsTitle"><span>{{$subcategory->translationByLanguage($lang->id)->first()->name}}</span> <span>{{trans('front.pricingPlans')}}</span></div>
                    <div class="btnGreen">
                      <div class="btnGreenHover">
                        <a href="{{url($lang->lang.'/catalog/'.$category->alias.'/'.$subcategory->alias)}}">{{trans('front.product.viewProduct')}}</a>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        @endif
      </div>
      <div class="txtCats">
        <div class="row justify-content-center">
          <div class="col-sm-8 col-12">
            <h2>{{trans('front.titles.createShopp')}}</h2>
          </div>
          <div class="col-12">
            <p>
              {{ $category->translationByLanguage($lang->id)->first()->seo_text }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('front.inc.footer')
@stop
