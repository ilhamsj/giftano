@extends('layouts.app')

@section('content')

<section class="">
    <img class="img-fluid" src="holder.js/1600x600?auto=yes&random=yes&textmode=exact" alt="" srcset="">
</section>

<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h3>Categories</h3>
            </div>
            @foreach ($categories as $item)
            <div class="col-6 col-md-2 mb-4">
                <div class="card border-0 bg-transparent">
                    <div class="card-img-top">
                        <img class="img-fluid" style="border-radius:1rem" src="holder.js/500x700?auto=yes&random=yes&textmode=exact" alt="" srcset="">
                    </div>
                    <div class="card-body text-center">
                        {{ $item->name}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-4 bg-light ">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h3>Featured Topics</h3>
            </div>
            @foreach ($products as $item)
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0 bg-transparent">
                    <div class="card-img-top">
                        <img class="img-fluid" style="border-radius:1rem"
                            src="holder.js/500x400?auto=yes&random=yes&textmode=exact" alt="" srcset="">
                    </div>
                    <div class="card-body">
                        {{ \Faker\Factory::create()->name}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <span style="font-size: x-large">
                            Why trusted with <strong>customer voice ?</strong>
                        </span>
                    </div>
                </div>
            </div>

            @for ($i = 0; $i < 3; $i++)
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0 bg-transparent">
                    <div class="card-img-top">
                        <img class="img-fluid" style="border-radius:1rem" src="holder.js/500x400?auto=yes&random=yes&textmode=exact" alt="" srcset="">
                    </div>
                    <div class="card-body">
                        {{ $item->name}}
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

@endsection