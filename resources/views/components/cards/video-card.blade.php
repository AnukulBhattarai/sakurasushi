@props(['title', 'link'])
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
<div class="col-lg-4 col-md-6 col-sm-6 my-2">

    @php
        if (str_contains($link, '=')) {
            $trimmedString = str_replace('https://youtu.be/', '', $link);
        } else {
            if (str_contains($link, 'videos/')) {
                $trimmedString = explode('videos/', $link)[1];
            } else {
                $trimmedString = explode('watch/', $link)[1];
            }
        }
    @endphp

    <iframe height="300" class="w-100" src="https://www.youtube.com/embed/{{ $trimmedString }}"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <div class="d-flex mt-0 align-items-center" style="height: 40px; background-color:rgba(227, 218, 218, 0.69)">
        <p class="ms-3" style="font-weight:700; font-size: 20px;">{{ $title }}</p>
    </div>

</div>
