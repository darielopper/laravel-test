@extends("layouts.app")

@section('styles')
    <style>
        .label-default{
            font-size: 18px;
        }
    </style>
@endsection

@section("content")
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Orders</strong> <a class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#orderModal">Add</a>
                </div>
                <div class="panel-body">
                    <orders></orders>
                </div>
                <div class="panel-footer">
                   <strong>TOTAL: </strong> <span class="label label-default">$0</span>
                </div>
            </div>
        </div>
        <modal @accept="send_data"></modal>
    </div>
@endsection