@extends('backend.core.main')

@section('content')

        @include('backend.core.bars')

        <!-- Begin Page Content -->
               <div class="container-fluid">
                 <!-- DataTales Example -->
                 
                 @if(Session::has('success'))
                       <div class="alert alert-success">
                           {{ Session::get('success') }}
                       </div>
                   @endif
                 <div class="card shadow mb-4">
                   <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">
                     	Property Details
                     	<a href="" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></a>
                     	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                     		@csrf
                     	  <div class="input-group">
                     	    <input type="text" class="form-control bg-light border-0 small" id="search_key" name="user_search" placeholder="Search properties..." aria-label="Search" aria-describedby="basic-addon2" required>
                     	    <div class="input-group-append">
                     	      <button id="search_btn" class="btn btn-primary" type="submit" disabled>
                     	        <i class="fas fa-search fa-sm"></i>
                     	      </button>
                     	    </div>
                     	  </div>
                     	</form>
                     </h6>
                   </div>
                   <div class="row">
                     <div class="card-body col-lg-5">
                       <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>All</th>
                              <th>Owner</th>
                              <th>View</th>
                              <th>Trash</th>
                            </tr>
                          </thead>
                           <tbody id="all_users">
                             @foreach($master_arrays["all"] as $key => $house)
                              <tr>
                                @if(isset($house['title']))
                                <td>{{ $house['title'] }}</td>
                                @endif
                                @if(isset($house[0]['name']))
                                <td>{{ $house[0]['name'] }}</td>
                                @endif
                                <td class="text-center"><a href="" data-toggle="modal" data-target="#viewModalHouse-{{ $house['id'] }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a></td>
                                <td class="text-center">
                                  <form action="{{ route('xoa-nha.trash', ['id'=>$house['id']]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                  </form>
                                </td>
                              </tr>

                              <!-- Modal -->
                              <div class="modal fade" id="viewModalHouse-{{ $house['id'] }}" tabindex="-1" role="dialog" aria-labelledby="viewModalHouseTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">
                                        @if(isset($house['title']))
                                          {{ $house['title'] }}
                                        @endif
                                      </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <small>Created at: @if(isset($house['created_at'])){{ $house['created_at'] }}@endif</small>
                                      <div></div>
                                      <small>Updated at: @if(isset($house['updated_at'])){{ $house['updated_at'] }}@endif</small>
                                      <p class="text-info">Owner: @if(isset($house[0]['name'])){{ $house[0]['name'] }}@endif</p>
                                      <hr>
                                      <p class="text-warning">Description:</p>
                                      {{ $house['description'] }}
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-danger text-white">
                                        Ban
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                             @endforeach
                           </tbody>
                         </table>
                       </div>
                     </div>
                     <div class="card-body col-lg-7">
                       <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Has features</th>
                              <th>Owner</th>
                              <th>District</th>
                              <th>City/Town</th>
                              <th>View</th>
                              <th>Trash</th>
                            </tr>
                          </thead>
                           <tbody id="all_users">
                             @foreach($master_arrays["has-features"] as $key => $h)
                                 <tr>
                                   @if(isset($h['title']))
                                   <td>{{ $h['title'] }}</td>
                                   @endif
                                   @if(isset($h[0]['name']))
                                   <td>{{ $h[0]['name'] }}</td>
                                   @endif
                                   @if(isset($h[2][0]['name']))
                                   <td>{{ $h[2][0]['name'] }}</td>
                                   @endif
                                   @if(isset($h[2]['name']))
                                   <td>{{ $h[2]['name'] }}</td>
                                   @endif
                                   <td class="text-center"><a href="" data-toggle="modal" data-target="#viewModalHouseFeature-{{ $h['id'] }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a></td>
                                   <td class="text-center">
                                    <form action="{{ route('xoa-nha.trash', ['id'=>$h['id']]) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                   </td>
                                 </tr>

                                 <!-- Modal -->
                                 <div class="modal fade" id="viewModalHouseFeature-{{ $h['id'] }}" tabindex="-1" role="dialog" aria-labelledby="viewModalHouseTitle" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLongTitle">
                                           @if(isset($h['title']))
                                             {{ $h['title'] }}
                                           @endif
                                         </h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                         </button>
                                       </div>
                                       <div class="modal-body">
                                         <small>Created at: @if(isset($h['created_at'])){{ $h['created_at'] }}@endif</small>
                                         <div></div>
                                         <small>Updated at: @if(isset($h['updated_at'])){{ $h['updated_at'] }}@endif</small>
                                         <p class="text-info">Owner: @if(isset($h[0]['name'])){{ $h[0]['name'] }}@endif</p>
                                         <hr>
                                         <p class="text-warning">Description:</p>
                                         {{ $h['description'] }}
                                         <hr>
                                         @if(isset($h[1]['bedroom']))
                                           <div class="box border border-primary pt-2 pb-2 pl-2 pr-2">
                                             Bedroom: {{ $h[1]['bedroom'] }}
                                           </div>
                                         @endif
                                         @if(isset($h[1]['bathroom']))
                                           <div class="box border border-primary pt-2 pb-2 pl-2 pr-2">
                                             Bathroom: {{ $h[1]['bathroom'] }}
                                           </div>
                                         @endif
                                         @if(isset($h[1]['kitchen']))
                                           <div class="box border border-primary pt-2 pb-2 pl-2 pr-2">
                                             Kitchen: {{ $h[1]['kitchen'] }}
                                           </div>
                                         @endif
                                         @if(isset($h[1]['toilet']))
                                           <div class="box border border-primary pt-2 pb-2 pl-2 pr-2">
                                             Toilet: {{ $h[1]['toilet'] }}
                                           </div>
                                         @endif
                                         @if(isset($h[1]['living_room']))
                                           <div class="box border border-primary pt-2 pb-2 pl-2 pr-2">
                                             Living Room: {{ $h[1]['living_room'] }}
                                           </div>
                                         @endif
                                         @if(isset($h[1]['patio']))
                                           <div class="box border border-primary pt-2 pb-2 pl-2 pr-2">
                                             Patio: {{ $h[1]['patio'] }}
                                           </div>
                                         @endif
                                         @if(isset($h[1]['garage']))
                                           <div class="box border border-primary pt-2 pb-2 pl-2 pr-2">
                                             Garage: {{ $h[1]['garage'] }}
                                           </div>
                                         @endif
                                         @if(isset($h[1]['garden']))
                                           <div class="box border border-primary pt-2 pb-2 pl-2 pr-2">
                                             Garden: {{ $h[1]['garden'] }}
                                           </div>
                                         @endif
                                         @if(isset($h[1]['swimming_pool']))
                                           <div class="box border border-primary pt-2 pb-2 pl-2 pr-2">
                                             Swimming Pool: {{ $h[1]['swimming_pool'] }}
                                           </div>
                                         @endif
                                       </div>
                                       <div class="modal-footer">
                                         <button type="submit" class="btn btn-danger text-white">
                                           Ban
                                         </button>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                             @endforeach
                           </tbody>
                         </table>
                       </div>
                     </div>
                   </div>
                 </div>

               </div>
               <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->

@stop