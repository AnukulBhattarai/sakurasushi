 @props(['about'])
 <style>
     .about-title-text {
         font-size: 45px;
         line-height: 110%;
     }

     @media (max-width: 512px) {
         .about-title-text {
             font-size: 30px;
         }
     }
 </style>
 <section class="about-section section-padding">
     <div class="bus-shape float-bob-x">
         <img src="{{ asset('img/about/bus.png') }}" alt="shape-img">
     </div>
     <div class="dog-shape float-bob-y">
         <img src="{{ asset('img/custom/boy-2.png') }}" style="height: 120px" alt="shape-img">
     </div>
     <div class="girl-shape float-bob-y">
         <img src="{{ asset('img/about/girl.png') }}" alt="shape-img">
     </div>
     <div class="dot-shape">
         <img src="{{ asset('img/about/dot.png') }}" alt="shape-img">
     </div>
     <div class="container">
         <div class="about-wrapper pb-5">
             <div class="row g-4">
                 <div class="col-lg-6">
                     <div class="about-image-items">
                         <div class="about-image wow fadeInUp" data-wow-delay=".3s"
                             style="height:450px; overflow:hidden;">
                             <img src="{{ asset('storage/' . $about->side_image) }}"
                                 style="height: 100%; width:100%; object-fit:cover;" alt="about-img">
                         </div>
                         <div class="border-shape-1">
                             <img src="{{ asset('img/about/border-shape-1.png') }}" alt="img">
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="about-content">
                         <div class="section-title">
                             <span class="wow fadeInUp">About us</span>
                             <h2 class="wow fadeInUp about-title-text" data-wow-delay=".3s">{{ $about->title }}</h2>
                         </div>
                         <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                             {{ $about->sub_title }}
                         </p>
                         <div class="row my-3" data-wow-delay=".3s">
                             @isset($about->mission)
                                 @foreach ($about->mission as $title)
                                     <div class="col-6 my-3">
                                         <i class="fa-regular fa-circle-check"></i>
                                         {{ $title['mission_title'] }}
                                     </div>
                                 @endforeach
                             @endisset
                         </div>
                         <div class="about-author">
                             @isset($organization->phone)
                                 <div class="author-icon wow fadeInUp" data-wow-delay=".5s">
                                     <div class="icon">
                                         <i class="fa-solid fa-phone"></i>
                                     </div>
                                     <div class="content">
                                         <span>Call Us Now</span>
                                         <h5 style="font-size: 16px;">
                                             <a href="tel:{{ $organization->phone }}">{{ $organization->phone }}</a>
                                         </h5>
                                     </div>
                                 </div>
                             @endisset

                             @isset($organization->email)
                                 <div class="author-icon wow fadeInUp" data-wow-delay=".5s">
                                     <div class="icon">
                                         <i class="fa-solid fa-at"></i>
                                     </div>
                                     <div class="content">
                                         <span>Email Us Now</span>
                                         <h5 style="font-size: 16px;">
                                             <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $organization->email }}"
                                                 target="_blank" class="link"
                                                 style="text-transform: lowercase;">{{ $organization->email }}</a>
                                         </h5>
                                     </div>
                                 </div>
                             @endisset

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
