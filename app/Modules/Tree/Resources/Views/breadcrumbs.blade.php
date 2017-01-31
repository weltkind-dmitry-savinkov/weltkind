@if ($breadcrumbs)
<nav>
    <ul class="breadcrumbs">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$breadcrumb->last)
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    <div class="breadcrumbs__separator">
                    </div>
                </li>
            @else
                <li class="breadcrumbs__item">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ul>
</nav>
@endif
