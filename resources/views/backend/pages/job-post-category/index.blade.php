@extends('layouts.backend')
<!-- title -->
@section('title', $title)
<!-- internal css -->
@push('styles')
    <style>
        .bg-transparent i:hover {
            background-color: black;
            color: #ffffff;
            padding: 4px;
            transition: .2s;
            border-radius: 50%;
        }
    </style>
@endpush

@section('main-content')
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-4 mb-sm-0 mb-3">
                <div class="card">
                    <div class="card-header custom-card-header">
                        <h4 class="card-title d-flex justify-content-between align-items-center">{{ $title }}
                            <a href="{{ route('admin.cetagory.index') }}" class="btn btn-sm btn-primary"> <i
                                    class="fa fa-plus fa-sm"></i> Create</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <ul class="m-0 p-0 list-unstyled b-category-list">
                                @forelse ($values as $value)
                                    <li class="justify-content-between">

                                        <a href="javascript:"><i class="far fa-file"></i>
                                            <span>{{ $value->name }}</span></a>
                                        <div>
                                            <a class="btn-style-edit"
                                                href="{{ route('admin.cetagory.edit', $value->id) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="button" onclick="delete_data({{ $value->id }})" title="Delete"
                                                class="border-0 bg-transparent px-0 btn-style-danger"><i
                                                    class="far fa-trash-alt"></i></button>

                                            <form id="delete-form-{{ $value->id }}"
                                                action="{{ route('admin.cetagory.destroy', $value->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header custom-card-header">
                        <h4 class="card-title">Category Create</h4>
                    </div>
                    <div class="card-body">
                        <form method="post"
                            action="{{ isset($category) ? route('admin.cetagory.update', $category->id) : route('admin.cetagory.store') }}">
                            @csrf
                            @isset($category)
                                @method('PUT')
                            @endisset

                            <div class="form-group">
                                <x-form.textbox name="category_name" required="required" labelName="Category Name"
                                    value="{{ $category->name ?? old('category_name') }}" placeholder="Category Name" />
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <x-form.publish name="status" labelName="Publish">
                                    <option value="1"
                                        @isset($category) {{ $category->status == 1 ? 'selected' : '' }} @endisset>
                                        Publish</option>
                                    <option value="0"
                                        @isset($category) {{ $category->status == 0 ? 'selected' : '' }} @endisset>
                                        Pending</option>
                                </x-form.publish>

                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="border mt-4">
                                <div class="card-header custom-card-header">
                                    <h4 class="card-title">Publish</h4>
                                </div>

                                <div class="p-4">
                                    <button type="submit" name="submit" value="save" class="btn btn-info btn-sm">
                                        <i class="fa fa-save"></i> Save
                                    </button>
                                    &nbsp;
                                    <button type="submit" name="submit" value="apply" class="btn btn-success btn-sm">
                                        <i class="fa fa-check-circle"></i> Save &amp; Edit
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- internal js -->
@push('scripts')
@endpush
