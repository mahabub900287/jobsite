@php
    // categories
    $popularCategories = DB::table('blog_posts')->limit(10)->where('blog_posts.views','>',5)
        ->join('blog_post_categories','blog_posts.id','=','blog_post_categories.post_id')
        ->join('post_categories','blog_post_categories.post_category_id','=','post_categories.id')
        ->distinct()->select('post_categories.name','post_categories.slug')->get();

    // tags
    $postTags = DB::table('blog_posts')->limit(10)->where('blog_posts.views','>',5)
        ->join('blog_post_tags', 'blog_posts.id','=','blog_post_tags.post_id')
        ->join('post_tags','blog_post_tags.post_tag_id','=','post_tags.id')
        ->select('post_tags.name','post_tags.slug')->distinct()->get();

    // resent post
    $resentPosts = DB::table('blog_posts')->latest('id')->where('blog_posts.status','=',1)
        ->limit(5)->select('title','slug','updated_at','feature_image','id')->get();
@endphp

<div class="row">
    <div class="col-md-12 mt-5">
        {{-- search form --}}
        <x-post-search/>
    </div>
    <div class="col-md-12 mt-5">
        <div class="search-keyword-box">
            @if (!$popularCategories->isEmpty())
                <p>Populer categories</p>
                <div class="input-box-wrapper">
                    <ul class="category-lists m-0 p-0">
                        @foreach ($popularCategories as $value)
                        <li><a href="{{ route('frontend.category.by.post-get',$value->slug) }}">{{ $value->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-12 mt-5">
        @if (!$resentPosts->isEmpty())
            <div class="search-keyword-box">
                <p>Recent Posts</p>
                <div class="input-box-wrapper">
                    @foreach ($resentPosts as $item)
                        <a href="{{ route('frontend.single.blog.post', $item->slug) }}" title="{{ $item->title }}">
                            <div class="d-flex recent-post-wrapper gap-3 mt-3">
                                <div class="recent-img">
                                    <img class="rounded" src="{{ asset($item->feature_image) }}" alt="{{ $item->title }}">
                                </div>
                                <div class="recent-content">
                                    <span>{{ Str::limit($item->title, 35, '') }}</span>
                                    <div class="d-flex gap-3">
                                        <span>May 14, 2021</span>
                                        <span>Education</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
<div class="col-md-12 mt-5">
    @if (!$postTags->isEmpty())
        <div class="search-keyword-box">
            <p>Populer Tags</p>
            <div class="input-box-wrapper">
                <ul class="tag-items d-flex gap-2 flex-wrap">
                    @foreach ($postTags as $value)
                        <li><a href="{{ route('frontend.tag.by.posts', $value->slug) }}">{{ $value->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
