<?php $categoryName = strtolower(LaravelLocalization::getCurrentLocaleName())?>
<div class="list-group">
    <li class="list-group-item active">@lang('sidebar.categories')
    @if( Auth::check() )
        @if( Auth::user()->isAdmin())
                <a class="list-group-item active" href="{{ LaravelLocalization::getLocalizedURL(null, '/category/add', [], true) }}">@lang('sidebar.add')</a>
        @endif
    @endif
    </li>
        @foreach (\App\Http\Controllers\HomeController::categories() as $category)
            <span>
            <a href="{{ LaravelLocalization::getLocalizedURL(null, '/category='.$category->id, [], true) }}" class="list-group-item list-group-item-action">{{$category->$categoryName}}</a>
            @if( Auth::check() )
                @if( Auth::user()->isAdmin())
                <a class="list-group-item list-group-item-action" href="{{ LaravelLocalization::getLocalizedURL(null, '/category/edit/id='.$category->id, [], true) }}">@lang('sidebar.edit')</a>
                @endif
            @endif
            </span>
        @endforeach
</div>