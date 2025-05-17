@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Contact Us" />


    <div class="it-contact__area pt-120 pb-120">
        <div class="container">
            <div class="it-contact__wrap fix z-index-3 p-relative">
                <div class="it-contact__shape-1 d-none d-xl-block">
                    <img src="{{ asset('img/contact/shape-2-1.png') }}" alt="" />
                </div>
                <div class="row align-items-end">
                    <div class="col-xl-7">
                        <div class="it-contact__right-box">
                            <div class="it-contact__section-box pb-20">
                                <h4 class="it-contact__title pb-15">Get in Touch</h4>
                                <p>
                                    Suspendisse ultrice gravida dictum fusce placerat <br />
                                    ultricies integer
                                </p>
                            </div>
                            <div class="it-contact__content mb-55">
                                <ul>
                                    <li>
                                        <div class="it-contact__list d-flex align-items-start">
                                            <div class="it-contact__icon">
                                                <span><i class="fa-solid fa-location-dot"></i></span>
                                            </div>
                                            <div class="it-contact__text">
                                                <span>Our Address</span>
                                                <a href="#">{{ $organization->address }}</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="it-contact__list d-flex align-items-start">
                                            <div class="it-contact__icon">
                                                <span><i class="fa-solid fa-envelope"></i></span>
                                            </div>
                                            <div class="it-contact__text">
                                                <span>Mail</span>
                                                <a href="mailto:{{ $organization->email }}">{{ $organization->email }}</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="it-contact__list d-flex align-items-start">
                                            <div class="it-contact__icon">
                                                <span><i class="fa-solid fa-phone phone"></i></span>
                                            </div>
                                            <div class="it-contact__text">
                                                <span>contact</span>
                                                <a href="tel:{{ $organization->phone }}">{{ $organization->phone }}</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="it-contact__bottom-box d-flex align-items-center justify-content-between">
                                <div class="it-contact__scrool smooth">
                                    <a><i class="fa-solid fa-arrow-down"></i>Customer Care</a>
                                </div>
                                <div class="it-footer-social">
                                    @isset($organization->facebook)
                                        <a href="{{ $organization->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                                    @endisset
                                    @isset($organization->instagram)
                                        <a href="{{ $organization->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                    @endisset
                                    @isset($organization->twitter)
                                        <a href="{{ $organization->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                    @endisset
                                    @isset($organization->linkedin)
                                        <a href="{{ $organization->linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="it-contact__form-box">
                            <form action="{{ route('contact.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-25">
                                        <div class="it-contact-input-box">
                                            <label>Name*</label>
                                            <input type="text" placeholder="Name" name="name" required />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-25">
                                        <div class="it-contact-input-box">
                                            <label>Email Address*</label>
                                            <input type="email" placeholder="Email" name="email" required />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-25">
                                        <div class="it-contact-input-box">
                                            <label>Phone*</label>
                                            <input type="text" placeholder="Phone" name="phone" required />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-25">
                                        <div class="it-contact-textarea-box">
                                            <label>Message</label>
                                            <textarea placeholder="Message" name="message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="it-btn">
                                    <span>
                                        Send Message
                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor"
                                                stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
