
@extends('layouts.app')
@section('content')

    <div class="main-content d-flex justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-0 col-lg-3"></div>
                <div class="col-sm-12 col-lg-6">
                    <div style="" class="card mb-30">
                        <div class="card-body">
                            <form action="{{url('/setting/impressum/update')}}" method="POST">
                                @csrf
                                <textarea id="editor" name="description">{!!$impData!!}</textarea>
                                <div class="col-12 text-right">
                                    <!-- Button Group -->
                                    <div class="button-group pt-1">
                                        <button type="reset" class="link-btn bg-transparent mr-3 soft-pink">Cancel
                                        </button>
                                        <button type="submit" class="btn">Update</button>
                                    </div>
                                    <!-- End Button Group -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-0 col-lg-3"></div>
            </div>
        </div>
    </div>

    @push('body-scripts')
        <script src="{{asset('vendor/ckeditor5/ckeditor.js')}}"></script>
        <style type="text/css">
            .ck-editor__editable_inline {
                height: 1000px;
            }


        </style>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: {
                        items: [
                            'undo', 'redo',
                            '|', 'heading',
                            '|', 'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
                            '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
                            '|', 'alignment',
                            'link', 'blockQuote', 'codeBlock',
                            '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
                        ],
                        shouldNotGroupWhenFull: true
                    }

                })
                .catch(error => {
                    console.error(error);
                });

            document.addEventListener('DOMContentLoaded', function () {
                var editor = document.querySelector('.ck-editor__editable');

                if (editor) {
                    editor.classList.add('ck-blurred');
                }
            });


        </script>

    @endpush
@endsection

