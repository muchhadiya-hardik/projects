@extends('admin.layouts.app')
@section('header')
    <div class="orb-heading-block">
        <div class="container-lg content-wrapper header">

            <div class="orb-page-heading">
                <h2>Admin,{{ Auth::guard('admin')->user()->name }}</h2>
                <p class="orb-breadcrumbs">
                    <span class="breadcrumb-text">Outreachbird</span>
                    - Home
                </p>
            </div>

        </div>
    </div>
@endsection
@section('main')
    <div class="orb-info-block">
        <div class="card orb-info-content-wrapper">
            <div class="card-body p-0">
                <h4 class="cmn-card-title text-dark">What is Outreachbird?</h4>
                <p class="cmn-card-text">Outreachbird is a software tool that will help you find niche Twitter leads and that
                    automates your outreach towards these leads. You can use the tool for various purposes, such as finding
                    agency clients or promoting an online product.</p>
            </div>
        </div>
    </div>
    <div class="orb-info-block">
        <div class="card orb-info-content-wrapper">
            <div class="card-body">
                <h4 class="cmn-card-title text-dark">How it works</h4>
            </div>
        </div>
    </div>
@endsection

