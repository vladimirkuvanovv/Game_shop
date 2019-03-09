@if(count($sidebarCats ?? []))
    <div class="menu__categories">
        <a href="#" class="menu__links-item" style="cursor: default;">Категории</a>
        @foreach($sidebarCats as $category)
            <a href="{{isset($category['url']) ? $category['url'] : route('shop.category.detail',$category['id'])}}"
               class="menu__links-item">{{$category['name']}}</a>
        @endforeach
    </div>
@endif
