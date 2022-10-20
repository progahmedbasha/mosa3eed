<script>
    	  ////////////////////for fetch branch////////////
	   $(document).ready(function () {
          $('#organization').on('change', function () {
              var organization_id = $('.organization_id').val();
              $.ajax({
                  url: "{{route('fetch_branch')}}",
                  type: "POST",
                  data: {
                      organization_id: organization_id,
                      _token: '{{csrf_token()}}'
                  },
                 success:function(response){
					      $('#branch-dd').html(response.result);
                  },
              });
          });  	
      });
 ////////////////////for fetch branch////////////
</script>