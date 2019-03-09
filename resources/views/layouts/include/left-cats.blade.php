@if(count($sidebarCats ?? []))
    <div class="sidebar-item__title">{{ $menuTitle ?? 'Меню' }}</div>
    <div class="sidebar-item__content">
        <ul class="sidebar-category">
            @foreach($sidebarCats as $category)
                <li class="sidebar-category__item">
                    <a href="{{isset($category['url']) ? $category['url'] : route('shop.category.detail',$category['id'])}}" class="sidebar-category__item__link">{{$category['name']}}</a></li>
            @endforeach
        </ul>
    </div>
@endif
