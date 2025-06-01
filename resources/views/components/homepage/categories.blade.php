@props(['categories'])
<div class="it-category-area pt-120 pb-120">
    <div class=container>
        <div class="it-category-title-wrap p-relative mb-70">
            <div class="it-category-shape d-none d-xl-block">
                <img src="{{ asset('img/category/shape-1.png') }}" alt="">
            </div>
            <div class="row align-items-end">
                <div class="col-xl-8 col-lg-8">
                    <div class=it-category-title-box>
                        <span class=it-section-subtitle-2>CATEGORIES</span>
                        <h4 class=it-section-title>Browse By Categories
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class=row>
            @foreach ($categories as $category)
                <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                    <div class="it-category-item text-center">
                        {{-- <div class=it-category-icon>
                            <span>
                                <i class="{{ $category->icon }}"></i>
                            </span>
                        </div> --}}
                        <div class=it-category-text>
                            <h4 class=it-category-title>{{ $category->name }}</h4>
                            <a href="{{ route('category.courses', $category->id) }}">
                                {{ count($category->program) ?? 0 }} Programs
                                <span>
                                    <svg width=16 height=13 viewBox="0 0 16 13" fill=none
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.334 1.01807L15.0007 6.61807L10.334 12.2181" stroke=currentcolor
                                            stroke-width=1.5 stroke-miterlimit=10 stroke-linecap=round
                                            stroke-linejoin=round />
                                        <path d="M1 6.61816H15" stroke=currentcolor stroke-width=1.5
                                            stroke-miterlimit=10 stroke-linecap=round stroke-linejoin=round />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
