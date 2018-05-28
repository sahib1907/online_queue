@extends('backend.app')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left" style="width: 100%; !important;">
                    <h3 style="display: inline-block;"> Sosial şəbələlər</h3>
                    <a href="/admin/socials/add" class="btn btn-primary" style="float: right;">Əlavə et</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title">#</th>
                                        <th class="column-title">İkon </th>
                                        <th class="column-title">Ad </th>
                                        <th class="column-title">Link </th>
                                        <th class="column-title">Qeydiyyat tarixi </th>
                                        <th class="column-title">Dəyişiklik tarixi </th>
                                        <th class="column-title">Silmək </th>
                                        <th class="column-title">Düzəliş etmək </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php
                                        $row = 1;
                                    @endphp
                                    @foreach($socials as $social)
                                        <tr class="even pointer" id="row_{{$row}}">
                                            <td>{{$social->id}}</td>
                                            <td><i class="fa {{$social->icon}} fa-2x"></i></td>
                                            <td>{{$social->name}}</td>
                                            <td><a href="{{$social->link}}">{{$social->link}}</a></td>
                                            <td>{{$social->created_at}}</td>
                                            <td>{{$social->updated_at}}</td>
                                            <td>
                                                <input class="btn btn-danger" type="button"
                                                       onclick="del(this, '{{$social->id}}', '{{$row}}');"
                                                       value="Sil">
                                            </td>
                                            <td>
                                                <a href="socials/update/{{$social->id}}" class="btn btn-warning">Update</a>
                                            </td>
                                        </tr>
                                        @php
                                            $row++;
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
@endsection

@section('js')
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>

    {{--alert--}}
    <script>
        function del(e, id, row_id) {
            swal({
                title: 'Silmək istədiyinizə əminsiniz?',
                text: 'Bu prosesin geri dönüşü yoxdur',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Geri',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sil!'
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "Post",
                        url: '',
                        data: {
                            'id': id,
                            '_token': CSRF_TOKEN,
                            'row_id': row_id
                        },
                        beforeSubmit: function () {
                            //loading
                            swal({
                                title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Gözləyin...</span>',
                                text: 'Loading, please wait...',
                                showConfirmButton: false
                            });
                        },
                        success: function (response) {
                            swal(
                                response.title,
                                response.content,
                                response.case
                            );
                            if (response.case === 'success') {
                                var elem = document.getElementById('row_' + response.row_id);
                                elem.parentNode.removeChild(elem);
                            }
                        }
                    });
                } else {
                    return false;
                }
            });
        }
    </script>
@endsection