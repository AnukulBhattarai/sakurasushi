 @props(['testimonials'])
 <div class="it-testimonial-5-area it-testimonial-style-2 p-relative pt-100 pb-100">
     <div class="it-testimonial-5-shape-5 d-none d-xl-block">
         <img src="{{ asset('img/testimonial/shape-5-6.png') }}" alt="" />
     </div>
     <div class="it-testimonial-5-shape-6 d-none d-xl-block">
         <img src="{{ asset('img/testimonial/shape-5-7.png') }}" alt="" />
     </div>
     <div class="it-testimonial-5-shape-7 d-none d-xl-block">
         <img src="{{ asset('img/testimonial/shape-5-8.png') }}" alt="" />
     </div>
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="it-testimonial-5-title-box text-center mb-60">
                     <span class="it-section-subtitle-2">Testimonial</span>
                     <h4 class="it-section-title-5">
                         Creating A Community Of <br />
                         Life Long Learners.
                     </h4>
                 </div>
             </div>
             <div class="col-xl-12">
                 <div class="it-testimonial-5-wrapper p-relative">
                     <div class="swiper-container it-testimonial-5-active">
                         <div class="swiper-wrapper">
                             @foreach ($testimonials as $testimonial)
                                 <div class="swiper-slide">
                                     <div class="it-testimonial-5-item p-relative z-index">
                                         <div class="it-testimonial-3-author-box d-flex align-items-center mb-20">
                                             <div class="it-testimonial-3-avata">
                                                 @isset($testimonial->profile)
                                                     <img src="{{ asset('storage/' . $testimonial->profile) }}"
                                                         style="object-fit: cover;" alt="" />
                                                 @else
                                                     <img src="{{ asset('img/profile.jpg') }}" style="object-fit: cover;"
                                                         alt="" />
                                                 @endisset
                                             </div>
                                             <div class="it-testimonial-3-author-info">
                                                 <h5>{{ $testimonial->name }}</h5>
                                                 <span>{{ $testimonial->designation }},
                                                     {{ $testimonial->company }}</span>
                                             </div>
                                         </div>
                                         <div class="it-testimonial-5-content z-index-5">
                                             <div class="it-testimonial-5-text"
                                                 style="height: 120px; overflow: hidden;">
                                                 {!! $testimonial->message !!}
                                             </div>
                                         </div>
                                         <div class="it-testimonial-5-quote d-none d-xl-block">
                                             <img src="{{ asset('img/testimonial/quote-1-2.png') }}" alt="" />
                                         </div>
                                     </div>
                                 </div>
                             @endforeach

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
