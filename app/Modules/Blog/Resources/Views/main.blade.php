@if (count ($entities))
    <section class="blog-widget">
        <div class="blog-widget__top">
            <div class="title-small">
                <h2 class="title-small__title">
                    <a href="{{route('blog')}}">@lang('blog::index.new_records'):</a>
                </h2>
                <a class="title-small__link" href="{{route('blog')}}">@lang('blog::index.list')</a>
            </div>
        </div>
        <ul class="blog-widget__list">
            @foreach($entities as $entity )
                <li class="blog-widget__item">
                    <div class="blog-widget__info">
                        <div class="info-small">
                            <time class="info-small__time" datetime="{{Date::_('Y-m-d', $entity->date)}}">{{Date::_('d.m.Y', $entity->date)}}</time>
                            @if(isset($entity->user->name))
                                <span class="info-small__separator"> &mdash; </span>
                                <a class="info-small__author" href="#">{{$entity->user->name}}</a>
                            @endif
                        </div>
                    </div>
                    <a class="blog-widget__title" href="{{route('blog.show', $entity)}}">{{$entity->title}}</a>
                </li>
            @endforeach
        </ul>
    </section>
@endif