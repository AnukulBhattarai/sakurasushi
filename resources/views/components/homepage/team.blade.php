 @props(['team'])
 <div class="it-team-area p-relative pt-100 pb-100">
     <div class="it-team-shape-1 d-none d-xl-block">
         <img src="{{ asset('img/team/shape-1-1.png') }}" alt="">
     </div>
     <div class="it-team-shape-2 d-none d-xl-block">
         <img src="{{ asset('img/team/shape-1-2.png') }}" alt="">
     </div>
     {{-- <div class="it-team-shape-3 d-none d-xl-block">
         <img src="{{ asset('img/team/shape-1-3.png') }}" alt="">
     </div> --}}
     <div class=container>
         <div class="row align-items-center">
             <div class="col-xl-5 col-lg-5">
                 <div class=it-team-left>
                     <div class="it-team-title-box pb-15">
                         <span class="it-section-subtitle-2">OUR INSTRUCTOR</span>
                         <h4 class=it-section-title>Meet Our Expert Instructors
                         </h4>
                     </div>
                     <div class=it-team-button>
                         <a class="it-btn mr-15" href={{ route('contact') }}>
                             <span>
                                 Contact us
                                 <svg width=17 height=14 viewBox="0 0 17 14" fill=none
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path d="M11 1.24023L16 7.24023L11 13.2402" stroke=currentcolor stroke-width=1.5
                                         stroke-miterlimit=10 stroke-linecap=round stroke-linejoin=round />
                                     <path d="M1 7.24023H16" stroke=currentcolor stroke-width=1.5 stroke-miterlimit=10
                                         stroke-linecap=round stroke-linejoin=round />
                                 </svg>
                             </span>
                         </a>
                         <a class="it-btn black-bg" href={{ route('courses') }}>
                             <span>
                                 Explore courses
                                 <svg width=17 height=14 viewBox="0 0 17 14" fill=none
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path d="M11 1.24023L16 7.24023L11 13.2402" stroke=currentcolor stroke-width=1.5
                                         stroke-miterlimit=10 stroke-linecap=round stroke-linejoin=round />
                                     <path d="M1 7.24023H16" stroke=currentcolor stroke-width=1.5 stroke-miterlimit=10
                                         stroke-linecap=round stroke-linejoin=round />
                                 </svg>
                             </span>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-xl-7 col-lg-7">
                 <div class=it-team-right-box>
                     <div class=row>
                         @foreach ($team as $teacher)
                             <x-cards.teacher-card :team="$teacher" />
                         @endforeach

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
