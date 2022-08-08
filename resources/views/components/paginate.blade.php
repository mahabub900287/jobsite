@php
$paginatorName;
@endphp

<div class="row mt-3 mb-5">
    <div class="col-12">
        <nav aria-label="...">
            @if ($paginatorName->lastPage() > 1)
                <ul class="paginate text-center list-unstyled">
                    <li class="page-item me-2 {{ ($paginatorName->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="prev btn btn-outline-primary"
                            href="{{ $paginatorName->url($paginatorName->currentPage()-1) }}" aria-disabled="true">
                            <i class="fa-solid fa-arrow-left-long prev"></i>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $paginatorName->lastPage(); $i++)
                        <li cclass="page-item">
                            <a class="btn {{ ($paginatorName->currentPage() == $i) ? 'btn-primary' : '' }}"
                                href="{{ $paginatorName->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item ms-2 {{ ($paginatorName->currentPage() == $paginatorName->lastPage()) ? 'disabled' : '' }} ">
                        <a href="{{ $paginatorName->url($paginatorName->currentPage()+1) }}"
                            class="prev btn btn-outline-primary" aria-label="Next">
                            <i class="fa-solid fa-arrow-right-long next"></i>
                        </a>
                    </li>
                </ul>
            @endif
        </nav>
    </div>
</div>


