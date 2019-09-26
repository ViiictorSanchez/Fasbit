@extends('Admin.master')

@section('title')

Forex

@endsection

@section('content')

<div id="wrap">
    <div class="wrapper">
        <div id="content" class="bg-container">
            <div style="width: 100%; text-align: center; font-size: 30px; color: white; margin-top: 50px"></div>

            <div style="display: flex; justify-content: center;">
                <div class="search_stock_section container">
                    <div class="label-stock container">Add Forex</div>
                    <form action="/admin/forex/add" method="POST" class="form-inline form-search-forex" onsubmit="return check(this)">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!--@From-->
                            <br>
                            <div class="col-sm-5">
                                <input placeholder="From" type="text" id="search_forex_text_from" value="" name="from" class="form-control" autocomplete="off">      
                                <ul id="result_from" class="label-stock search-forex-list"></ul>
                            </div>
                        <!--//Fr-->

                        <!--To-->
                            <div class="col-sm-5">
                                <input placeholder="To" type="text" id="search_forex_text_to" name="to" class="form-control"  autocomplete="off">  
                                <ul id="result_to" class="label-stock search-forex-list"></ul>
                            </div>
                        <!--//-->
                            <div class="col-sm-2 btn-forex">
                                <input type="submit" value="GO" class="btn btn-outline-secondary"/>
                            </div>
                    </form>
                </div>
            </div>


            <br><br>
            <!-- Table-->
            <div class="outers coins">
                <div class="inner bg-light lter bg-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block m-t 35">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>From Symbol</th>
                                                <th>To Symbol</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $item)
                                            <tr>
                                                <td>{{$item->from}}</td>
                                                <td>{{$item->to}}</td>
                                                <td>
                                                    <form action="/admin/forex/delete/{{$item->id}}" method="GET">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
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
            <!-- //Table -->
 
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::asset("public/js/forex.js") }}"></script>
@endsection