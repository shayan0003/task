@extends('admin.layouts.master')

@section('head-tag')
    <title>پست ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">پست ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پست ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{ route('admin.content.post.create') }}" class="btn btn-info btn-sm">ایجاد خبر </a>

                    {{-- <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div> --}}
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان خبر</th>
                                <th>نام دسته</th>
                                <th>خلاصه خبر</th>
                                <th>وضعیت</th>
                                <th>سازنده</th>
                                <th>تصویر</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        
                        {{-- <tbody>
                            
                            @foreach ($posts as $key => $post)
                            <tr>
                                
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ Str::limit($post->summery, 25) }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->tags }}</td>


                                    <td>
                                        <label>
                                            <input type="checkbox" id="{{ $post->id }}"
                                                onchange="changeStatus({{ $post->id }})"
                                                data-url="{{ route('admin.content.post.status', $post->id) }}"
                                                @if ($post->status === 1) checked @endif>
                                        </label>
                                    </td>


                                    <td>{{ $post->user->first_name . ' ' . $post->user->last_name }}</td>


                                    <td>
                                        <img src="{{ asset($post->image['indexArray'][$post->image['currentImage']]) }}"
                                            alt="" width="120" height="100">
                                    </td>




                                    <td>{{ jalaliDate($post->published_at, 'H:i:s - Y/m/d') }}</td>


                                    <td class="width-16-rem text-left">

                                        @can('update-Post')
                                            <a href="{{ route('admin.content.post.edit', $post->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                                ویرایش</a>
                                        @endcan

                                        @can('delete-Post')
                                            <form class="d-inline"
                                                action="{{ route('admin.content.post.destroy', $post->id) }}" method="post">

                                                @csrf
                                                @method('delete')

                                                <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                        class="fa fa-trash-alt"></i>
                                                    حذف</button>

                                            </form>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach

                        </tbody> --}}
                    </table>
                </section>

                <section class="col-12">
                    <section class="my-4 d=flex justify-content-center">
                        <nav style="margin-inline-start: 37%">
                            {{-- {{ $posts->links('pagination::bootstrap-4') }} --}}
                        </nav>
                    </section>
                </section>

            </section>
        </section>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        function changeStatus(id) {
            var element = $("#" + id);
            var url = element.attr('data-url');
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('خبر با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('خبر با موفقیت غیر فعال شد')
                        }
                        خبر
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error: function() {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message) {

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5000).queue(function() {
                    $(this).remove();
                });
            }

            function errorToast(message) {

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5000).queue(function() {
                    $(this).remove();
                });
            }
        }
    </script>

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete']);
@endsection
