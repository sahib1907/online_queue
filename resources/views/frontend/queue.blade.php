@extends('frontend.app')
@section('content')
    <div role="main" class="main shop">

        <div class="container">

            <hr class="tall">

            <div class="row">
                <div class="col-md-9">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Növbə
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="panel-body">
                                    <form action="" id="" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="queue" value="1">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Xidmət mərkəzi</label>
                                                    <input disabled type="text" value="{{$current_service_name}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Şəxsiyyət vəsiqəsinin seriya nömrəsi</label>
                                                    <input readonly type="text" value="{{$serial_number}}" class="form-control" name="client[serial_number]" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Ad</label>
                                                    <input type="text" value="{{$client_arr['name']}}" class="form-control" name="client[name]" required placeholder="ad" {{$disabled}}>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Soy ad</label>
                                                    <input type="text" value="{{$client_arr['surname']}}" class="form-control" name="client[surname]" required placeholder="soy ad" {{$disabled}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>E-mail</label>
                                                    <input type="email" value="{{$client_arr['mail']}}" class="form-control" name="client[mail]" required placeholder="sahib.fermanli@mail.ru">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Telefon</label>
                                                    <input type="tel" value="{{$client_arr['phone']}}" class="form-control" name="client[phone]" required placeholder="+994777220075">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" value="Təsdiq et" class="btn btn-primary pull-right push-bottom">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Rezerv
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="panel-body">
                                    <form action="" id="" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="reservation" value="1">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Xidmət mərkəzi</label>
                                                    <input disabled type="text" value="{{$current_service_name}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Şəxsiyyət vəsiqəsinin seriya nömrəsi</label>
                                                    <input readonly type="text" value="{{$serial_number}}" class="form-control" name="client[serial_number]" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Ad</label>
                                                    <input type="text" value="{{$client_arr['name']}}" class="form-control" name="client[name]" required placeholder="ad" {{$disabled}}>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Soy ad</label>
                                                    <input type="text" value="{{$client_arr['surname']}}" class="form-control" name="client[surname]" required placeholder="soy ad" {{$disabled}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>E-mail</label>
                                                    <input type="email" value="{{$client_arr['mail']}}" class="form-control" name="client[mail]" required placeholder="sahib.fermanli@mail.ru">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Telefon</label>
                                                    <input type="tel" value="{{$client_arr['phone']}}" class="form-control" name="client[phone]" required placeholder="+994777220075">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Tarix</label>
                                                    <select class="form-control" name="date" required>
                                                        <option>Select</option>
                                                        <?php
                                                            $count = 0;
                                                            $date = date('Y-m-d');
                                                            echo "<option value='{$date}'>{$date}</option>";
                                                            while ($count<=6) {
                                                                $date = date('Y-m-d', strtotime($date. ' + 1 days'));
                                                                echo "<option value='{$date}'>{$date}</option>";
                                                                $count++;
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Saat</label>
                                                    <select class="form-control" name="time" required>
                                                        <option>Select</option>
                                                        <?php
                                                        $count = 0;
                                                        for ($i=10;$i<=20;$i++) {
                                                            echo "<option value='{$i}:00:00'>{$i}:00:00</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" value="Təsdiq et" class="btn btn-primary pull-right push-bottom">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <h4>Növbə tablosu</h4>
                    <table cellspacing="0" class="cart-totals">
                        <tbody>
                        <tr class="cart-subtotal">
                            <th>
                                <strong>Xidmət görən nəvbə:</strong>
                            </th>
                            <td>
                                <strong><span id="current_queue">{{$current_queue}}</span></strong>
                            </td>
                        </tr>
                        <tr class="shipping">
                            <th>
                                <strong>Sonuncu növbə:</strong>
                            </th>
                            <td>
                                <strong><span id="last_queue">{{$last_queue}}</span></strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div id="barcode" style="width: 200px !important; height: 200px !important;"></div>
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
    {{--barcode--}}
    <script type="text/javascript" src="/js/barcode/jquery-barcode.js"></script>

    <script>
        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                beforeSubmit:function () {
                    //loading
                    swal ({
                        title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Əməliyyat aparılır...</span>',
                        text: 'Xaiş edirik biraz gözləyin...',
                        showConfirmButton: false
                    });
                },
                success:function (response) {
                    swal(
                        response.title,
                        response.content,
                        response.case
                    );
                    if (response.case === 'success' && response.barcode !== '') {
                        $('#last_queue').html(response.last_queue);
                        $('#current_queue').html(response.current_queue);
                        $("#barcode").barcode(
                            response.barcode, // Value barcode (dependent on the type of barcode)
                            "datamatrix" // type (string)
                        );
                    }
                }
            });
        });
    </script>

@endsection