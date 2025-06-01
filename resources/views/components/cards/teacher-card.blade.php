@props(['team'])
<div class="col-xl-6 col-lg-6 col-md-6 mb-30">
    <div class=it-team-item>
        <div class="it-team-thumb-box p-relative">
            <div class=it-team-thumb>
                <div style="height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $team->profile) }}"
                        style="height: 100%; width:100%; object-fit:cover;" alt="">
                </div>
            </div>
            <div class="it-team-social-box">
                <button><i class="fa-sharp fa-light fa-share-nodes"></i></button>
                <div class="it-team-social">
                    @isset($team->facebook)
                        <a href="{{ $team->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                    @endisset
                    @isset($team->instagram)
                        <a href="{{ $team->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                    @endisset
                    @isset($team->linkedin)
                        <a href="{{ $team->linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
                    @endisset
                    @isset($team->twitter)
                        <a href="{{ $team->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                    @endisset
                </div>
            </div>
            <div class="it-team-author-box d-flex align-items-center justify-content-between">
                <div class=it-team-author-info>
                    <h5 class=it-team-author-name><a>{{ $team->name }}</a></h5>
                    <span>{{ $team->position }}</span>
                </div>

            </div>
        </div>
    </div>
</div>
