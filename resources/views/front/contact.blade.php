@extends('front.layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container py-5">
    <div class="row gx-5 align-items-center">
        <div class="col-lg-7">
            <h1 class="display-6 fw-bold">Contact NewsPortal</h1>
            <p class="text-muted">Need help with the admin site or want to share feedback? Reach out and we will get back to you shortly.</p>
            <ul class="list-unstyled mt-4">
                <li class="mb-3"><strong>Email:</strong> support@example.com</li>
                <li class="mb-3"><strong>Phone:</strong> +62 812 3456 7890</li>
                <li class="mb-3"><strong>Address:</strong> Jalan Berita No. 5, Jakarta, Indonesia</li>
            </ul>
        </div>
        <div class="col-lg-5">
            <div class="card rounded-4 shadow-sm border-0 p-4">
                <h5 class="mb-3">Send a message</h5>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Your name</label>
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" placeholder="you@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="4" placeholder="Tell us how we can help"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send message</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
