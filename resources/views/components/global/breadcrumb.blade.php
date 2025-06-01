@props(['title'])
<div class="it-breadcrumb-area it-breadcrumb-bg" style="background-color: #0ab0f0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="it-breadcrumb-content z-index-3 text-center">
                    <div class="it-breadcrumb-title-box">
                        <h3 class="it-breadcrumb-title">{{ $title }}</h3>
                    </div>
                    <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                            <span><a href="{{ route('home') }}">home</a></span>
                            <span class="dvdr">//</span>
                            <span>{{ $title }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
