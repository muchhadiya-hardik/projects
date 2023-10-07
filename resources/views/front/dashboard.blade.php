@extends('front.layouts.app')
    @section('header')
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    @endsection

 @section('content')
    <div class="card my-6">
        <div class="card-body ">
            <h2 class="fw-bold">Welcome back,{{ Auth::user()->name;}}</h2>
            <p class="mt-3"><span>Outreachbird</span> - dashboard</p>
        </div>
    </div>
    <div class="card my-6 mt-5">
        <div class="card-body ">
            <h2 class="fw-bold fs-4">What is Outreachbird?</h2>
            <p class="mt-3">Outreachbird is a software tool that will help
                you find niche Twitter leads and that automates your outreach
                towards these leads. You can use the tool for various purposes,
                such as finding agency clients or promoting an online product.
            </p>
        </div>
    </div>
    <div class="card my-6 mt-5">
        <div class="card-body ">
            <h2 class="fw-bold fs-4">How it works</h2>
        </div>
    </div>
    <div class="card my-6 mt-5">
        <div class="card-body ">
            <h2 class="fw-bold fs-4">Subscribe to a plan to get started!</h2>
            <p class="mt-3">To use Outreachbird's functionality, you need a paid plan. Subscribe to a plan and get started here.
            </p>
        </div>
    </div>
@endsection

