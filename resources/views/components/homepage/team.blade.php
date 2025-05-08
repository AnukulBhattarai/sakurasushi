 @props(['team'])
 <div class="it-team-area p-relative pt-120 pb-120">
     <div class="it-team-shape-1 d-none d-xl-block">
         <img src="{{ asset('img/team/shape-1-1.png') }}" alt="">
     </div>
     <div class="it-team-shape-2 d-none d-xl-block">
         <img src="{{ asset('img/team/shape-1-2.png') }}" alt="">
     </div>
     <div class="it-team-shape-3 d-none d-xl-block">
         <img src="{{ asset('img/team/shape-1-3.png') }}" alt="">
     </div>
     <div class=container>
         <div class="row align-items-center">
             <div class="col-xl-5 col-lg-5">
                 <div class=it-team-left>
                     <div class="it-team-title-box pb-15">
                         <span class=it-section-subtitle>OUR INSTRUCTOR</span>
                         <h4 class=it-section-title>Meet Our
                             <span class="p-relative z-index">Expert
                                 <svg class=title-shape-2 width=168 height=65 viewBox="0 0 168 65" fill=none
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path
                                         d="M73.3761 8.49147C78.4841 6.01353 82.5722 4.25154 88.8933 3.3035C94.2064 2.50664 99.6305 2.0701 104.981 1.94026C120.426 1.56549 135.132 4.90121 146.506 9.70405C158.628 14.8228 166.725 22.5638 166.074 31.6501C165.291 42.5779 151.346 51.7039 133.508 56.8189C110.253 63.4874 81.7065 63.8025 58.5605 60.8285C37.5033 58.123 11.6304 51.7165 3.58132 40.0216C-3.43085 29.8337 12.0728 18.1578 27.544 11.645C40.3656 6.24763 55.7082 2.98328 70.8043 4.08403C81.9391 4.89596 93.2164 6.87822 102.462 9.99561C112.874 13.5066 120.141 18.5932 127.862 23.6332"
                                         stroke="#0AB99D" stroke-width=3 stroke-linecap=round />
                                 </svg>
                             </span>
                             <br>Instructor
                         </h4>
                     </div>
                     <div class=it-team-text>
                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                             exercitation ullamco laboris..</p>
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
