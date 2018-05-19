@extends('frontend.app')
@section('content')
    <div class="">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="featured-box featured-box-secundary default">
                <div class="box-content">
                    <h4>Online növbə</h4>
                    <form action="" id="" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Xidmət mərkəzi</label>
                                    <select class="form-control" name="service_id" required>
                                        <option value="">Seçilməyib</option>
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Şəxsiyyət vəsiqəsinin seriya nömrəsi</label>
                                    <input required type="text" value="" class="form-control input-lg" placeholder="09815711" maxlength="8" minlength="8" name="serial_number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Davam et" class="btn btn-primary pull-right push-bottom">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection