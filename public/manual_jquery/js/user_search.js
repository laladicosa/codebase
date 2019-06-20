		$(document).ready(function(){
			$('#search_btn').click(function(e){
				e.preventDefault();
				$('#all_users').hide();
				var key = $('#search_key').val();
				$.ajax({
					url: "/admin/users/look-up",
					type: "GET",
					dataType: "TEXT",
					data:{user_search:key},
					success:function($response){
						$.each(JSON.parse($response)["users"], function(i, values){
							$.each(values, function(index, v){
	              $.each(JSON.parse($response)["roles"], function(ri, rv){
	                if(rv["id"] === v["role_id"]){
	                  $('#dataTable').append('<tbody id="all_users"><tr><td>'+v["name"]+'</td><td>'+v["email"]+'</td><td>'+v["email_verified_at"]+'</td><td>'+rv["role_name"]+'</td><td>'+v["provider"]+'</td><td class="text-center"><a href="" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a></td><td class="text-center"><a href="" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a></td></tr></tbody>');
	                }
	              });
	            });
						});
					}
				});
			});
		});