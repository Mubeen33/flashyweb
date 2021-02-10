@extends('layouts.master')

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $page->meta_title }}">
    <meta itemprop="description" content="{{ $page->meta_description }}">
@endsection
@section('content')
<section class="slice--offset parallax-section parallax-section-lg b-xs-bottom gry-bg">
    <div class="container">
        <div class="row py-3">
            <div class="col-lg-6 col-md-8">
                <h1 class="heading heading-1 strong-400 text-normal">
                    {{ $page->title }}
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="bg-white py-5">
	<div class="container">
        <div class="aiz-custom-page">   
		    @php echo $page->content; @endphp
        </div>
	</div>
</section>
@endsection