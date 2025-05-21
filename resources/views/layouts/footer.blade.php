 <footer>
     <div class="it-footer-area it-footer-bg black-bg pt-120 pb-70"
         data-background="{{ asset('img/footer/bg-1-1.jpg') }}">
         <div class=container>
             <div class=row>
                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-50">
                     <div class="it-footer-widget footer-col-1">
                         <div class="it-footer-logo pb-25">
                             <a href=index-html.html><img src="{{ asset('img/logo/logo.png') }}" height="100px"
                                     alt=""></a>
                         </div>
                         @isset($organization->other['slogan'])
                             <div class="it-footer-text pb-5">
                                 <p>
                                     {{ $organization->other['slogan'] }}
                                 </p>
                             </div>
                         @endisset
                         <div class=it-footer-social>
                             @isset($organization->facebook)
                                 <a href="{{ $organization->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                             @endisset
                             @isset($organization->instagram)
                                 <a href="{{ $organization->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                             @endisset
                             @isset($organization->linkedin)
                                 <a href="{{ $organization->linkedin }}"><i class="fab fa-linkedin"></i></a>
                             @endisset
                             @isset($organization->twitter)
                                 <a href="{{ $organization->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                             @endisset
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-50">
                     <div class="it-footer-widget footer-col-2">
                         <h4 class=it-footer-title>our Courses:</h4>
                         <div class=it-footer-list>
                             <ul>
                                 @foreach ($coursesFooter as $item)
                                     <li><a href="{{ route('course.detail', $item->id) }}"><i
                                                 class="fa-regular fa-angle-right"></i>{{ $item->title }}</a></li>
                                 @endforeach
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 mb-50">
                     <div class="it-footer-widget footer-col-3">
                         <h4 class=it-footer-title>quick links:</h4>
                         <div class=it-footer-list>
                             <ul>
                                 <li><a href="{{ route('about') }}"><i class="fa-regular fa-angle-right"></i>about</a>
                                 </li>
                                 <li><a href="{{ route('blogs') }}"><i class="fa-regular fa-angle-right"></i>blogs</a>
                                 </li>
                                 <li><a href="{{ route('event') }}"><i class="fa-regular fa-angle-right"></i>events</a>
                                 </li>
                                 <li><a href="{{ route('gallery') }}"><i
                                             class="fa-regular fa-angle-right"></i>contact</a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-50">
                     <div class="it-footer-widget footer-col-4">
                         <h4 class=it-footer-title>Gallery</h4>
                         <div class=it-footer-gallery-box>
                             <div class="row gx-5">
                                 @foreach ($footerImages as $image)
                                     <div class="col-md-4 col-4">
                                         <div class="it-footer-thumb mb-10" style="height: 88px; overflow: hidden;">
                                             <img src="{{ asset('storage/' . $image->image) }}"
                                                 style="height: 100%; width:100%; object-fit:cover;" alt="">
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
     {{-- <div class="it-copyright-area it-copyright-height">
         <div class=container>
             <div class=row>
                 <div class="col-12 wow itfadeUp" data-wow-duration=.9s data-wow-delay=.3s>
                     <div class="it-copyright-text text-center">
                         <p>Copyright © 2023 <a href="#">Educate </a> || All Rights Reserved</p>
                     </div>
                 </div>
             </div>
         </div>
     </div> --}}
 </footer>
