@extends('Admin.master')

@section('title')

Admin Coins

@endsection

@section('content')

<div id="wrap">
    <div class="wrapper">
        <div id="content" class="bg-container">
            <div style="width: 100%; text-align: center; font-size: 30px; color: white; margin-top: 50px"></div>

            <div style="width: 100%; display: flex; justify-content: center;">
                <div class="search_stock_section">
                    <div class="container">
                        <form action="/" id="search_coin_form" method="POST">
                            <div class="label-stock">Add Coin</div>
                            <div class="input-group mb-1">
                                <input type="text" id="search_coin_text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon2"/>
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

            <div class="outer stocks">
                <div class="inner bg-light lter bg-container">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card">
                                <!--div class="card-header bg-white">
                                  Coins
                                </div-->
                                <div class="card-block m-t-35">
                                    <table  id="" class="display table table-stripped table-bordered"> 
                                      <thead>
                                        <tr> 
                                          <th>Name</th> 
                                          <th>Price</th> 
                                          <th>Image</th>
                                          <th>Action</th>
                                          <th>Delete</th>
                                        </tr>
                                      </thead> 
                                      <tbody>
                                        @if(count($data)>0)
                                        @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->price}}</td>                                                                  
                                            <td><img src="{{$d->image_url}}" height="50" width="50"></td>
                                            @if($d->status==1)
                                            <td>
                                            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#{{$d->id}}">
                                                <i class="fa  fa-times" aria-hidden="true"></i>
                                            </button>
                                            </td>
                                            @endif
                                            @if($d->status==0)
                                            <td>
                                            <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#d{{$d->id}}">
                                                <i class="fa  fa-check-square" aria-hidden="true"></i>
                                            </button>
                                            </td>
                                            @endif
                                            <td>
                                                <div class="tools">
                                                    <a href="{{route('coin.delete', $d->id)}}" class="btn btn-danger">
                                                        </i><i class="fa fa-trash-o"></i>
                                                    </a>        
                                                </div>
                                            </td>
                                        </tr>

                                        <div id="{{$d->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
    
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Are you sure to desactivate {{$d->name}} ? </h4>
                                                        </div>
    
                                                        <div class="modal-footer">
                                                            <a href="{{url('/')}}/admin/ccoins/desactivate/{{$d->id}}" class="btn btn-danger" >Yes</a>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
    
                                            <div id="d{{$d->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
    
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Are you sure to activate {{$d->name}} ? </h4>
                                                        </div>
    
                                                        <div class="modal-footer">
                                                            <a href="{{url('/')}}/admin/ccoins/activate/{{$d->id}}" class="btn btn-danger" >Yes</a>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                            
                                      @endforeach
                                      @else
                                      <td valign="top" colspan="5" class="dataTables_empty">
                                          <div style="font-size: 26px !important; text-align: center; padding: 20px 0;">
                                                No data available in table
                                          </div>
                                      </td>
                                      @endif
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
                        <div class="modal-body" id="error-t">
                            The coin doesnt exists
                        </div>
                        </div>
                    </div>
                </div>



            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset("public/js/coins.js") }}"></script>
@endsection