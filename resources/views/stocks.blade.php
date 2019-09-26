@extends('Layout.master')

@section('title')

{{$title->value}} | Stocks

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
                                    <th>Symbol</th> 
                                    <th>Name</th>
                                    <th>Open</th>
                                    <th>High</th>
                                    <th>Low</th>
                                    <th>Price</th>
                                    <th>Volume</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <td id="loading" colspan="10">
                                    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                                </td>
                                <?php $cont=0; ?>
                                @foreach($data as $item)
                                    <?php $cont++; ?>
                                    <tr class="itemsStock">
                                        <td data-id="{{$item->symbol}}"><a href="/stock/{{$item->symbol}}">{{$item->symbol}}</a></td>
                                        <td><a href="/stock/{{$item->symbol}}">{{$item->name}}</a></td>
                                        <td id="{{$item->symbol}}Open"></td>
                                        <td id="{{$item->symbol}}High"></td>
                                        <td id="{{$item->symbol}}Low"></td>
                                        <td id="{{$item->symbol}}Price"></td>
                                        <td id="{{$item->symbol}}Volume"></td>
                                    </tr>
                                @endforeach
                                <?php 
                                  if($cont == 0):
                                  ?>
                                      <td colspan="10" style="font-size: 26px !important; text-align: center;">
                                        No results found
                                      <td>
                                  <?php   
                                  endif;
                                  ?>
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
<script type="text/javascript" src="{{ URL::asset("public/js/stocks.js") }}"></script>
@endsection