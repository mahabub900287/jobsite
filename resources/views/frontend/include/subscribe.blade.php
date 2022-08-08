<form method="POST" id="subscribe-form">
    @csrf
    <div class="input-group position-relative">
        <div class="form-outline w-100 h-100">
            <input type="search" placeholder="Email Address" name="email" id="form1" class="form-control w-100" />
        </div>
        <button type="submit" class="btn btn-primary position-absolute end-0 h-100">
            Subscribe<i
                class="fa-solid fa-arrow-right ps-lg-2 ps-md-2 d-none d-md-inline-block"></i></span>
        </button>
    </div>
</form>
