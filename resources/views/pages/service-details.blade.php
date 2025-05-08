@extends('layouts.main')
@section('meta')
    <x-meta :title="$service->title" :description="$service->description" :image="asset('storage/' . $service->thumbnail)" :url="url()->current()" />
@endsection
@section('body')
    <x-global.breadcrumb :title="$service->title" />

    <!--<< Program Details Section Start >>-->
    <section class="program-details-section fix section-padding">
        <div class="container">
            <div class="program-details-wrapper">
                <div class="row g-5">
                    <div>
                        <div class="program-details-items">
                            <!-- Left column content -->
                            <div class="details-image" style="height: 460px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $service->thumbnail) }}"
                                    style="height: 100%; width:100%; object-fit:cover;" alt="img">
                            </div>
                            <div class="details-content">
                                <h2 class="mb-3">{{ $service->title }}</h2>
                                {!! $service->description !!}
                            </div>
                            @php
                                $currentUrl = url()->current();
                            @endphp
                            <div class="col-lg-4 col-12 my-4">
                                <div class="social-share">
                                    <span class="me-3">Share:</span>
                                    <a class="mx-1"
                                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($currentUrl) }}"
                                        target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="mx-1"
                                        href="https://twitter.com/intent/tweet?url={{ urlencode($currentUrl) }}"
                                        target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="mx-1"
                                        href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($currentUrl) }}"
                                        target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row g-4 mt-3">
                                @foreach ($service->image as $image)
                                    <div class="col-md-4">
                                        <div style="height: 250px; overflow: hidden;">
                                            <img src="{{ asset('storage/' . $image->image) }}" alt="Gallery Image"
                                                class="img-fluid rounded shadow gallery-img"
                                                style="height: 100%; width:100%; object-fit:cover; cursor:pointer;"
                                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                                onclick="openModal('{{ asset('storage/' . $image->image) }}')">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid rounded shadow" alt="Preview">
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
        }
    </script>
    <style>
        .sticky-top {
            position: sticky;
            top: 20px;
            /* Adjust this value to control how far from the top the element sticks */
        }
    </style>
@endsection
