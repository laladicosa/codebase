@extends('backend.core.main')

@section('content')

        @include('backend.core.bars')

        <!-- Begin Page Content -->
               <div class="container-fluid">
                 <!-- DataTales Example -->
                 <div class="card shadow mb-4">
                   <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">
                     	Role Details
                     	<a href="" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></a>
                     	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                     		@csrf
                     	  <div class="input-group">
                     	    <input type="text" class="form-control bg-light border-0 small" id="search_key" name="user_search" placeholder="Search role..." aria-label="Search" aria-describedby="basic-addon2" required>
                     	    <div class="input-group-append">
                     	      <button id="search_btn" class="btn btn-primary" type="submit" disabled>
                     	        <i class="fas fa-search fa-sm"></i>
                     	      </button>
                     	    </div>
                     	  </div>
                     	</form>
                     </h6>
                   </div>
                   <div class="card-body">
                     <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       	<thead>
                       		<tr>
                       			<th>Role</th>
                       			<th>Edit</th>
                       			<th>Trash</th>
                       		</tr>
                       	</thead>
                         <tbody id="all_users">
                           @foreach($roles as $key => $role)
                           	<tr>
                           	  <td>{{ $role['role_name'] }}</td>
                           	  <td class="text-center"><a href="" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a></td>
                           	  <td class="text-center"><a href="" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a></td>
                           	</tr>
                           @endforeach
                         </tbody>
                       </table>
                     </div>
                   </div>
                 </div>

               </div>
               <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->

@stop