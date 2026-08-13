@extends('layouts.app')

@push('before-css')
    <link rel="stylesheet" href="{{ asset('plugins/vendors/dropify/dist/css/dropify.min.css') }}">

    <style>
        .content-builder {
            margin-top: 20px;
        }

        .content-builder-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .content-builder-header h4 {
            margin: 0;
            font-weight: 600;
        }

        .content-block {
            position: relative;
            background: #f8f9fa;
            border: 1px solid #e4e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .content-block-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .content-block-title {
            font-weight: 600;
            margin: 0;
        }

        .delete-content-block {
            border: 0;
            background: #ff5b5b;
            color: #fff;
            width: 34px;
            height: 34px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-content-block:hover {
            background: #e53935;
        }

        .add-content-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            padding: 15px;
            border: 1px dashed #ccc;
            border-radius: 8px;
            background: #fff;
        }

        .add-content-buttons button {
            min-width: 160px;
        }

        .content-block-number {
            display: inline-block;
            background: #666ee8;
            color: #fff;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-right: 8px;
        }

        .dynamic-image-preview {
            max-width: 100%;
            max-height: 250px;
            object-fit: contain;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        .existing-image {
            margin-bottom: 15px;
        }

        .existing-image img {
            max-width: 100%;
            max-height: 250px;
            object-fit: contain;
            border-radius: 6px;
            border: 1px solid #ddd;
        }
    </style>
@endpush

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">

            <h3 class="content-header-title mb-0 d-inline-block">
                Edit Blog
            </h3>

            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/dashboard') }}">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/blog') }}">
                                Blog Management
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Edit Blog
                        </li>
                    </ol>
                </div>
            </div>

        </div>
    </div>


    <div class="content-body">

        <section id="basic-form-layouts">

            <div class="row match-height">

                {{-- LEFT SIDE --}}
                <div class="col-md-7">

                    <div class="card">

                        <div class="card-header">

                            <h4 class="card-title">
                                Edit Blog Info
                            </h4>

                            <a class="heading-elements-toggle">
                                <i class="la la-ellipsis-v font-medium-3"></i>
                            </a>

                            <div class="heading-elements">

                                <ul class="list-inline mb-0">

                                    <li>
                                        <a data-action="collapse">
                                            <i class="ft-minus"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a data-action="reload">
                                            <i class="ft-rotate-cw"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a data-action="expand">
                                            <i class="ft-maximize"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a data-action="close">
                                            <i class="ft-x"></i>
                                        </a>
                                    </li>

                                </ul>

                            </div>

                        </div>


                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form
                                    class="form"
                                    enctype="multipart/form-data"
                                    method="POST"
                                    action="{{ route('admin.blog.update', $blog->id) }}"
                                >

                                    @csrf

                                    @method('PATCH')


                                    <div class="form-body">

                                        <div class="row">

                                            {{-- TITLE --}}
                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="title">
                                                        Title
                                                    </label>

                                                    <input
                                                        class="form-control"
                                                        required
                                                        name="title"
                                                        type="text"
                                                        id="title"
                                                        value="{{ $blog->title }}"
                                                    >

                                                </div>

                                            </div>


                                            {{-- DESCRIPTION --}}
                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="summary-ckeditor">
                                                        Description
                                                    </label>

                                                    <textarea
                                                        name="description"
                                                        id="summary-ckeditor"
                                                        cols="30"
                                                        rows="10"
                                                        class="form-control"
                                                        required
                                                    >{{ $blog->description }}</textarea>

                                                </div>

                                            </div>


                                            {{-- MAIN BLOG IMAGE --}}
                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>
                                                        Blog Image
                                                    </label>

                                                    @if($blog->image)

                                                        <img
                                                            src="{{ asset($blog->image) }}"
                                                            class="d-block mb-2"
                                                            alt="Blog Image"
                                                            width="100%"
                                                        >

                                                    @endif

                                                    <div class="upload-photo">

                                                        <input
                                                            type="file"
                                                            name="image"
                                                            id="input-file-now"
                                                            class="dropify"
                                                        >

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- INNER DESCRIPTION --}}
                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="summary-ckeditor3">
                                                        Inner Page Description
                                                    </label>

                                                    <textarea
                                                        name="inner_desc"
                                                        id="summary-ckeditor3"
                                                        cols="30"
                                                        rows="10"
                                                        class="form-control"
                                                        required
                                                    >{{ $blog->inner_desc }}</textarea>

                                                </div>

                                            </div>


                                            {{-- ================================= --}}
                                            {{-- DYNAMIC CONTENT BUILDER --}}
                                            {{-- ================================= --}}

                                            <div class="col-md-12">

                                                <div class="content-builder">

                                                    <div class="content-builder-header">

                                                        <h4>
                                                            Additional Content
                                                        </h4>

                                                    </div>


                                                    {{-- EXISTING / NEW BLOCKS --}}
                                                    <div id="contentBlocks">

                                                        @php
                                                            $contentBlocks = $blog->content_blocks ?? [];
                                                        @endphp


                                                        @foreach($contentBlocks as $index => $block)

                                                            @if(($block['type'] ?? '') === 'description')

                                                                <div
                                                                    class="content-block"
                                                                    data-type="description"
                                                                >

                                                                    <div class="content-block-header">

                                                                        <h5 class="content-block-title">

                                                                            <span class="content-block-number">
                                                                                {{ $index + 1 }}
                                                                            </span>

                                                                            Description

                                                                        </h5>

                                                                        <button
                                                                            type="button"
                                                                            class="delete-content-block"
                                                                            title="Delete"
                                                                        >
                                                                            <i class="la la-trash"></i>
                                                                        </button>

                                                                    </div>


                                                                    <textarea
                                                                        name="content_blocks[{{ $index }}][content]"
                                                                        class="form-control dynamic-ckeditor"
                                                                        rows="8"
                                                                    >{{ $block['content'] ?? '' }}</textarea>


                                                                    <input
                                                                        type="hidden"
                                                                        name="content_blocks[{{ $index }}][type]"
                                                                        value="description"
                                                                    >

                                                                </div>

                                                            @elseif(($block['type'] ?? '') === 'image')

                                                                <div
                                                                    class="content-block"
                                                                    data-type="image"
                                                                >

                                                                    <div class="content-block-header">

                                                                        <h5 class="content-block-title">

                                                                            <span class="content-block-number">
                                                                                {{ $index + 1 }}
                                                                            </span>

                                                                            Image

                                                                        </h5>

                                                                        <button
                                                                            type="button"
                                                                            class="delete-content-block"
                                                                            title="Delete"
                                                                        >
                                                                            <i class="la la-trash"></i>
                                                                        </button>

                                                                    </div>


                                                                    @if(!empty($block['path']))

                                                                        <div class="existing-image">

                                                                            <img
                                                                                src="{{ asset($block['path']) }}"
                                                                                alt="Content Image"
                                                                            >

                                                                        </div>

                                                                    @endif


                                                                    <input
                                                                        type="file"
                                                                        name="content_blocks[{{ $index }}][image]"
                                                                        class="dropify"
                                                                    >


                                                                    <input
                                                                        type="hidden"
                                                                        name="content_blocks[{{ $index }}][type]"
                                                                        value="image"
                                                                    >

                                                                    <input
                                                                        type="hidden"
                                                                        name="content_blocks[{{ $index }}][old_path]"
                                                                        value="{{ $block['path'] ?? '' }}"
                                                                    >

                                                                </div>

                                                            @endif

                                                        @endforeach

                                                    </div>


                                                    {{-- ADD BUTTONS --}}
                                                    <div class="add-content-buttons">

                                                        <button
                                                            type="button"
                                                            id="addDescription"
                                                            class="btn btn-primary"
                                                        >
                                                            <i class="la la-align-left"></i>
                                                            Add Description
                                                        </button>


                                                        <button
                                                            type="button"
                                                            id="addImage"
                                                            class="btn btn-info"
                                                        >
                                                            <i class="la la-image"></i>
                                                            Add Image
                                                        </button>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- UPDATE --}}
                                    <div class="form-actions text-right pb-0">

                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            <i class="la la-check-square-o"></i>
                                            Update
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- RIGHT SIDE --}}
                <div class="col-md-5">

                    <div class="card">

                        <div class="card-header">

                            <h4 class="card-title">
                                Information
                            </h4>

                        </div>


                        <div class="card-content collapse show">

                            <div class="card-body">

                                <div class="card-text">

                                    @if ($errors->any())

                                        <ul>

                                            @foreach ($errors->all() as $error)

                                                <li class="alert alert-danger">
                                                    {{ $error }}
                                                </li>

                                            @endforeach

                                        </ul>

                                    @endif


                                    @if (Session::has('message'))

                                        <ul>

                                            <li class="alert alert-success">
                                                {{ Session::get('message') }}
                                            </li>

                                        </ul>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>


    @push('js')

        <script src="{{ asset('plugins/vendors/dropify/dist/js/dropify.min.js') }}"></script>


        <script>

            $(document).ready(function () {

                let blockIndex = {{ count($contentBlocks) }};


                /*
                |--------------------------------------------------------------------------
                | Initialize Dropify
                |--------------------------------------------------------------------------
                */

                function initDropify() {

                    $('.dropify').each(function () {

                        if (!$(this).data('dropify')) {
                            $(this).dropify();
                        }

                    });

                }


                /*
                |--------------------------------------------------------------------------
                | Initialize CKEditor
                |--------------------------------------------------------------------------
                */

                function initCKEditor(element) {

                    const id = element.attr('id');

                    if (!id) {
                        return;
                    }

                    if (typeof CKEDITOR !== 'undefined') {

                        if (CKEDITOR.instances[id]) {
                            CKEDITOR.instances[id].destroy(true);
                        }

                        CKEDITOR.replace(id);

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | Add Description
                |--------------------------------------------------------------------------
                */

                $('#addDescription').on('click', function () {

                    const index = blockIndex++;

                    const editorId = 'dynamic-editor-' + index;


                    const html = `

                        <div
                            class="content-block"
                            data-type="description"
                        >

                            <div class="content-block-header">

                                <h5 class="content-block-title">

                                    <span class="content-block-number">
                                        ${index + 1}
                                    </span>

                                    Description

                                </h5>


                                <button
                                    type="button"
                                    class="delete-content-block"
                                    title="Delete"
                                >
                                    <i class="la la-trash"></i>
                                </button>

                            </div>


                            <textarea
                                name="content_blocks[${index}][content]"
                                id="${editorId}"
                                class="form-control dynamic-ckeditor"
                                rows="8"
                            ></textarea>


                            <input
                                type="hidden"
                                name="content_blocks[${index}][type]"
                                value="description"
                            >

                        </div>

                    `;


                    $('#contentBlocks').append(html);


                    initCKEditor($('#' + editorId));

                    updateBlockNumbers();

                });


                /*
                |--------------------------------------------------------------------------
                | Add Image
                |--------------------------------------------------------------------------
                */

                $('#addImage').on('click', function () {

                    const index = blockIndex++;


                    const html = `

                        <div
                            class="content-block"
                            data-type="image"
                        >

                            <div class="content-block-header">

                                <h5 class="content-block-title">

                                    <span class="content-block-number">
                                        ${index + 1}
                                    </span>

                                    Image

                                </h5>


                                <button
                                    type="button"
                                    class="delete-content-block"
                                    title="Delete"
                                >
                                    <i class="la la-trash"></i>
                                </button>

                            </div>


                            <input
                                type="file"
                                name="content_blocks[${index}][image]"
                                class="dropify"
                                accept="image/*"
                            >


                            <input
                                type="hidden"
                                name="content_blocks[${index}][type]"
                                value="image"
                            >

                        </div>

                    `;


                    $('#contentBlocks').append(html);


                    initDropify();

                    updateBlockNumbers();

                });


                /*
                |--------------------------------------------------------------------------
                | Delete Block
                |--------------------------------------------------------------------------
                */

                $(document).on(
                    'click',
                    '.delete-content-block',
                    function () {

                        const block = $(this).closest('.content-block');

                        const editor = block.find('.dynamic-ckeditor');

                        if (editor.length && typeof CKEDITOR !== 'undefined') {

                            const editorId = editor.attr('id');

                            if (CKEDITOR.instances[editorId]) {
                                CKEDITOR.instances[editorId].destroy(true);
                            }

                        }

                        block.remove();

                        updateBlockNumbers();

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | Update Numbers
                |--------------------------------------------------------------------------
                */

                function updateBlockNumbers() {

                    $('#contentBlocks .content-block').each(function (index) {

                        $(this)
                            .find('.content-block-number')
                            .text(index + 1);

                    });

                }


                /*
                |--------------------------------------------------------------------------
                | Initialize Existing Blocks
                |--------------------------------------------------------------------------
                */

                initDropify();

                $('#contentBlocks .dynamic-ckeditor').each(function () {

                    initCKEditor($(this));

                });

                updateBlockNumbers();

            });

        </script>

    @endpush

@endsection