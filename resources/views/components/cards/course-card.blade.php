 @props(['course'])
 <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
     <div class=it-course-item>
         <div class="it-course-thumb mb-20 p-relative">
             <a href="{{ route('course.detail', $course->id) }}">
                 <div style="height: 250px; overflow: hidden;">
                     <img src="{{ asset('storage/' . $course->thumbnail) }}"
                         style="height: 100%; width:100%; object-fit:cover;" alt="">
                 </div>
             </a>
         </div>
         <div class=it-course-content>
             <div class="it-course-rating mb-10">
                 <i class="fa-sharp fa-solid fa-star"></i>
                 <i class="fa-sharp fa-solid fa-star"></i>
                 <i class="fa-sharp fa-solid fa-star"></i>
                 <i class="fa-sharp fa-solid fa-star"></i>
                 <i class="fa-sharp fa-regular fa-star"></i>
                 <span>(4.7)</span>
             </div>
             <h4 class="it-course-title pb-5"><a
                     href="{{ route('course.detail', $course->id) }}">{{ $course->title }}</a></h4>
             <div class="it-course-info pb-15 mb-25 d-flex justify-content-between">
                 <span><i class="fa-sharp fa-regular fa-clock"></i>{{ $course->duration }}</span>
             </div>
             <div class="it-course-price-box d-flex justify-content-between">
                 <span><i>Nrs. {{ $course->price }}</i></span>

             </div>
         </div>
     </div>
 </div>
