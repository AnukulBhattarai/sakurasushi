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
                <div class=it-team-link>
                    <a>
                        <svg width=21 height=8 viewBox="0 0 21 8" fill=none xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.3536 4.35355C20.5488 4.15829 20.5488 3.84171 20.3536 3.64645L17.1716 0.464466C16.9763 0.269204 16.6597 0.269204 16.4645 0.464466C16.2692 0.659728 16.2692 0.976311 16.4645 1.17157L19.2929 4L16.4645 6.82843C16.2692 7.02369 16.2692 7.34027 16.4645 7.53553C16.6597 7.7308 16.9763 7.7308 17.1716 7.53553L20.3536 4.35355ZM0 4.5H20V3.5H0V4.5Z"
                                fill=currentcolor />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
