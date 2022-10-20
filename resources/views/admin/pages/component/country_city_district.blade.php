<script>
      $(document).ready(function () {
          $('#country-dd').on('change', function () {
              var idCountry = this.value;
              $("#city-dd").html('');
              $.ajax({
                  url: "{{route('fetch_city')}}",
                  type: "POST",
                  data: {
                      city_id: idCountry,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (result) {
                console.log(result.cities);

                      $('#city-dd').html('<option value="">Select City</option>');
                      $.each(result.cities, function (key, value) {
                          $("#city-dd").append('<option value="' + value
                              .id + '">' + value.name_en + '</option>');
                      });
                      // $('#city-dd').html('<option value="">Select City</option>');
                  },
                  
              });
          });
                  $('#city-dd').on('change', function () {
                      var idcity = this.value;
                      $("#state-dd").html('');
                      
                      $.ajax({
                          url: "{{route('fetchdistrict')}}",
                          type: "POST",
                          
                          data: {
                              city_id: idcity,
                              _token: '{{csrf_token()}}'
                          },
                          dataType: 'json',
                          success: function (result) {
                           var locate = {!! json_encode(app()->getLocale()) !!};
                        console.log(result.districts);

                              $('#state-dd').html('<option value="">Select City</option>');
                              $.each(result.districts, function (key, value) {
                                  $("#state-dd").append('<option value="' + value
                                      .id + '">' + value.name[locate]+ '</option>');
                              });
                              // $('#city-dd').html('<option value="">Select City</option>');
                          },
                          
                      });
                  });
      });
  </script>