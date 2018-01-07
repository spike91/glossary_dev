<?php $categoryName = strtolower(LaravelLocalization::getCurrentLocaleName())?>
<div class="list-group">
    <li class="list-group-item active">@lang('sidebar.categories')
    @if( Auth::check() )
        @if( Auth::user()->isAdmin())
                <b>&nbsp;&nbsp;&nbsp;<a href="{{ LaravelLocalization::getLocalizedURL(null, '/category/add', [], true) }}" style="color: #0A0237">@lang('sidebar.add')</a></b>
        @endif
    @endif
    </li>
        @foreach (\App\Http\Controllers\HomeController::categories() as $category)
            <span class="list-group-item list-group-item-action">
            <a href="{{ LaravelLocalization::getLocalizedURL(null, '/category='.$category->id, [], true) }}">{{$category->$categoryName}}</a>
            @if( Auth::check() )
                @if( Auth::user()->isAdmin())
                <b>&nbsp;&nbsp;&nbsp;<a href="{{ LaravelLocalization::getLocalizedURL(null, '/category/edit/id='.$category->id, [], true) }}" style="color: #0A0237">@lang('sidebar.edit')</a></b>
                @endif
            @endif
            </span>
        @endforeach
</div>