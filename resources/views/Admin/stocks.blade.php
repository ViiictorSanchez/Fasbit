@extends('Admin.master')

@section('title')

Stocks

@endsection

@section('content')

<div id="wrap">
    <div class="wrapper">
        <div id="content" class="bg-container">
            <div style="width: 100%; text-align: center; font-size: 30px; color: white; margin-top: 50px"></div>

            <div style="width: 100%; display: flex; justify-content: center;">
                <div class="search_stock_section">
                    <div class="container">
                        <form action="/" id="search_stock_form" method="POST">
                            <div class="label-stock">Add Stock</div>
                            <div class="input-group mb-1">
                                <input type="text" id="search_stock_text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon2"/>
                                <div class="input-group-append">
                                    <input type="submit" value="search" class="btn btn-outline-secondary"/>
                                </div>
                            </div>
                        </form>
                    </div>

                    
                    <div class="container">
                        <ul id="list_search_stock">
                        </ul>
                        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    </div>
                </div>
            </div>

            <div class="outer coins">
                <div class="inner bg-light lter bg-container">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card">
                                <!--div class="card-header bg-white">
                                  Coins
                                </div-->
                                <div class="card-block m-t-35">
                                    <table  id="example1" class="display table table-stripped table-bordered"> 
                                      <thead>
                                        <tr> 
                                          <th>Symbol</th> 
                                          <th>Name</th> 
                                          <th>Region</th>
                                          <th>Delete</th>
                                        </tr>
                                      </thead> 
                                      <tbody>
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{$item->symbol}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->region}}</td>
                                            <td>
                                                <form action="/admin/stocks/delete/{{$item->id}}" method="GET" style="padding-top: 4px;">
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>    
                                        <tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                    @if ($data->lastPage() > 1)
                                    <ul class="custom-pagination">
                                        <li class="{{ ($data->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a href="{{ $data->url(1) }}">First</a>
                                        </li>
                                        
                                        @for ($i = $data->currentPage()-1; $i < $data->currentPage()+3; $i++)
                                            @if($i > 0 && $i <= $data->lastPage())
                                            <li class="{{ ($data->currentPage() == $i) ? ' active' : '' }}">
                                                <a href="{{ $data->url($i) }}">{{ $i }}</a>
                                            </li>
                                            @endif
                                        @endfor
                                        <li class="{{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">
                                            <a href="{{ $data->url($data->lastPage()) }}" >Last</a>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="errorStock">
                Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-body">
                            The stock already exists
                        </div>
                        </div>
                    </div>
                </div>



            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset("public/js/stocks.js") }}"></script>
@endsection