@extends('front.layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container py-5">
    <div class="row align-items-center gx-5">
        <div class="col-lg-6">
            <h1 class="display-6 fw-bold">About NewsPortal</h1>
            <p class="lead text-muted">NewsPortal is a simple Laravel-based news CMS for publishing timely stories, managing categories, and keeping readers engaged.</p>
            <p class="text-muted">Built with modern Bootstrap design and integrated admin tools, this portal makes it easy to manage editorial workflows and showcase fresh content to visitors.</p>
        </div>
        <div class="col-lg-6">
            <div class="card rounded-4 shadow-sm border-0 p-4 bg-primary text-white">
                <h5>Our mission</h5>
                <p>Deliver clear, reliable news coverage with a clean reader experience and powerful backend management.</p>
            </div>
        </div>
    </div>
</div>
@endsection
