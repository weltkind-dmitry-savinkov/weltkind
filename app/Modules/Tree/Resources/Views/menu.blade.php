@if (count($items))
<nav class="header__menu">
    <table class="menu-main">
        <tr>
            @foreach ($items as $item)
                @if (Request::is($item->slug))
                    <td class="menu-main__item">
                        <span class="menu-main__link menu-main__link_active">{{$item->title}}</span>
                    </td>
                @else
                    <td class="menu-main__item">
                        <a class="menu-main__link" href="{!! URL::route($item->slug) !!}">{{$item->title}}</a>
                    </td>
                @endif
            @endforeach
        </tr>
    </table>
</nav>
@endif