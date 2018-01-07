<?php $categoryName = strtolower(LaravelLocalization::getCurrentLocaleName())?>
<div class="list-group">
    <li class="list-group-item active">@lang('sidebar.categories')</li>
        @foreach (\App\Http\Controllers\HomeController::categories() as $category)
            <a href="{{ LaravelLocalization::getLocalizedURL(null, '/category='.$category->id, [], true) }}" class="list-group-item list-group-item-action">{{$category->$categoryName}}</a>
        @endforeach
</div>