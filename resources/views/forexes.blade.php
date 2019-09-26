@extends('Layout.master')

@section('title')

{{$title->value}} | Forex

@endsection

@section('content')



<div class="outer container" id="stocks-table">
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-pane">
                <div class="row no-gutters">
                            
                    <div class="m-t-35 table-responsive">
                        <table class="table table-bordered table-striped flip-content">
                            <thead class="flip-content">
                                <tr>
                                    <th>FROM</th>
                                    <th>TO</th>
                                    <th>CHART</th>
                                </tr>
                            </thead> 
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td><a href="/forex/{{$item->from}}_{{$item->to}}">{{$item->from}}</a></td>
                                    <td><a href="/forex/{{$item->from}}_{{$item->to}}">{{$item->to}}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                      
</div>
@endsection

@section('scripts')

@endsection