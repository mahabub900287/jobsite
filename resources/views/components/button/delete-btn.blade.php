@php
    $action;
    $actionId;
@endphp

<button type="button" onclick="delete_data({{ $actionId }})" data-toggle="tooltip" data-placement="top" title="{{ $title }}" class="border-0 rounded-circle btn-style-danger"><i
    class="far fa-trash-alt fa-sm"></i></button>

<form id="delete-form-{{ $actionId }}" action="{{ $action }}" method="POST" class="d-none">
@csrf
@method('DELETE')
</form>
