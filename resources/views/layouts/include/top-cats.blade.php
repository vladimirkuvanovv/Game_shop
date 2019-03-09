@if(count($sidebarCats ?? []))
    <div class="admin-links">
        @foreach($sidebarCats as $category)
            <div class="admin-links__menu">
                {{--<a href="{{ route() }}" class="btn" style="background-color: #d0e26c;">Товары</a>--}}
                <a href="{{isset($category['url']) ? $category['url'] : route('shop.category.detail',$category['id'])}}"
                   class="btn" style="background-color: #d0e26c;">{{$category['name']}}</a>
            </div>
        @endforeach
    </div>
@endif