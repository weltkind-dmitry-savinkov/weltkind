@if (!empty($items))
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            @foreach ($items as $group)
            <li class="treeview active">
                <a href="">
                    <i class="fa {{$group['icon']}}"></i> <span>{{$group['title']}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                @if (isset($group['items']))
                <ul class="treeview-menu">
                    @foreach ($group['items'] as $item)
                    <li><a href="<?=isset($item['route'])?route($item['route']):$item['href']?>"><i class="fa {{$item['icon']}}"></i> {{$item['title']}}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </section>
</aside>
@endif