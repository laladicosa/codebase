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
                     <div class="card-body col-lg-12">
                       <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>All</th>
                              <th>Owner</th>
                              <th>View</th>
                              <th>Restore</th>
                            </tr>
                          </thead>
                           <tbody id="all_users">
                             @foreach($houses as $key => $house)
                              <tr>
                                @if(isset($house['title']))
                                <td>{{ $house['title'] }}</td>
                                @endif
                                @if(isset($owner))
                                <td>{{ $owner['name'] }}</td>
                                @endif
                                <td class="text-center"><a href="" data-toggle="modal" data-target="#viewModalHouse-{{ $house['id'] }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a></td>
                                <td class="text-center">
                                    <a href="{{ route('nha.restore', $house['id']) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-undo-alt"></i></a>
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
                                      <p class="text-info">Owner: @if(isset($master_arrays["owner"])){{ $master_arrays["owner"] }}@endif</p>
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
                   </div>
                 </div>

               </div>
               <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->

@stop