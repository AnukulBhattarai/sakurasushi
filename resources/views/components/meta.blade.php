@props(['title', 'description', 'image', 'url'])
{{-- <!-- Meta Tags Component -->
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}"> --}}

<!-- Open Graph (Facebook, LinkedIn) -->
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:url" content="{{ $url }}">
<meta property="og:type" content="article">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">
