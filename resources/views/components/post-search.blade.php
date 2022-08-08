
<div class="search-keyword-box">
    <p>Search Keywords</p>
    <div class="input-box-wrapper">
        <div class="keyword-input post-search">
            <form action="{{ route('frontend.blog.search') }}" method="GET">
                <input placeholder="Search..." type="search" class="h-100 px-2 py-0" name="search_text" class="p-0">
                <button type="submit" class="border-0 h-100 bg-transparent"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</div>
