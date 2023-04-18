<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
 #city-search-results li {
    padding: 5px 10px;
    cursor: pointer;
    color: black; /* change to black color */
    border-bottom: 1px solid #ddd; /* add a border-bottom to each li */
}

#city-search-results li:last-child {
    border-bottom: none; /* remove the border-bottom from the last li */
}

#city-search-results li:hover {
    background-color: #f1f1f1;
}

#city-search-results ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
    border-radius: 5px; /* add border radius to the ul */
}

#city-search-results ul:after {
    content: '';
    display: block;
    height: 1px;
    background-color: #ddd;
    margin-top: 10px;
}
#city-search-results ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
    border-radius: 5px; /* add border radius to the ul */
}

</style>
<body>


    <div id=app>
        <div class="LayoutStyles__Body-sc-1gsctz3-0 byFXAO">
            <main class="LayoutStyles__Main-sc-1gsctz3-1 jvRVUD" data-flex=true data-layout=column
                data-layout-align="start center">
                <div class="Styled__Section-m8ru5e-0 cPOuVK" data-layout=column data-layout-align="start center">
                    <div class="Styled__City-m8ru5e-3
                ccvaVR">
                    </div>
                    <div class="Styled__HeadingContainer-m8ru5e-1
                iruFnG">
                        <div class="Container__Content-iuc7ta-0 iDvcNc">

                        </div>
                    </div>




                    {{-- <div class="input-holder Styled__InputHolder-m8ru5e-9 iXRprr">
                        <div class="Container__Content-iuc7ta-0 iDvcNc">
                            <div class="CitySearch__Holder-sc-1fv4klw-0 hBCXwb" data-flex="true">
                                <div style="position: relative; width: 100%;">
                                    <input class="Styled__InputElement-wks8ar-1 ilmAyS" role="combobox"
                                        aria-autocomplete="list" aria-expanded="false" autocomplete="off"
                                        id="city-search-input" placeholder="Search for your City">
                                </div>
                            </div>
                            <div id="city-search-results"></div>
                        </div>
                    </div>
                     --}}







                     

                     <div class="input-holder Styled__InputHolder-m8ru5e-9 iXRprr">
                        <div class="Container__Content-iuc7ta-0 iDvcNc">
                            <div class="CitySearch__Holder-sc-1fv4klw-0 hBCXwb" data-flex="true">
                                <div style="position: relative; width: 100%;">
                                    <input class="Styled__InputElement-wks8ar-1 ilmAyS" role="combobox"
                                        aria-autocomplete="list" aria-expanded="false" autocomplete="off"
                                        id="city-search-input" placeholder="Search for your City">
                                </div>
                            </div>




                            <div class="Styled__List-wks8ar-4 fYQHOI" open="">
                    <div data-layout="row"
                        data-layout-align="start center"
                        class="Styled__ListItem-wks8ar-3 dQKPgv"
                        id="downshift-38-item-0">
                        <img class="CitySearch__ListItemImage-sc-1fv4klw-2 fYVbAs"
                        src="static/bahawalpur1.jpg" alt="Bahawalpur">
                        <p>Bahawalpur, Pakistan</p>
                    </div>
                    <div data-layout="row" data-layout-align="start center"
                        class="Styled__ListItem-wks8ar-3 gNhIAc"
                        id="downshift-38-item-1">
                        <i class="CitySearch__ListItemIcon-sc-1fv4klw-1 material-icons
                        dWWAxa">location_on</i>
                        <p>Bahawalnagar, Pakistan</p>
                    </div>
                    
                    
            </div>


                            <div id="city-search-results" class="dropdown">
                                <ul class="dropdown-menu" aria-labelledby="city-search-input" style="display: none;">
                                    @if(isset($cities) && count($cities) > 0)
                                    
                                    <ul>
                                        @foreach($cities as $city)
                                            <li onclick="window.location.href='{{ route('city', $city->name) }}'">{{ $city->name }}, {{ $city->country }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No results found</p>
                                @endif
                                
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                   
                    







<div class="Container__Content-iuc7ta-0 iDvcNc">
<div class="Styled__FeaturedSection-m8ru5e-5 gonvaK" data-layout=row data-layout-wrap=true>
<div class="SectionHeading__Heading-fwgzwm-0 iHKPAh">
    <span>Featured
        Cities
    </span>
</div>

{{-- @foreach ($data as $city)
        <div data-flex=50 data-flex-gt-sm=33 data-flex-gt-xs=33 class=" bImZlT" onclick="redirectTo('{{ $city->name }}')">
            <div class=" jPrPcR">
                <div class="CityBlock__Overlay-fc0pwz-1 kuQeoG"></div>
                <div class="CityBlock__Content-fc0pwz-2 dcuRiJ" data-layout=column data-layout-align="end end">
                    <h3>{{ $city->name }}</h3>
                    <span>{{ $city->country }}</span>
                </div>
            </div>
        </div>
    @endforeach --}}





    {{-- @php
        dd($data);
    @endphp --}}

    @foreach ($data as $index => $city)
        @php
            $position = $index < 3 ? $index + 1 : $index - 2;
        @endphp

                                <div data-flex=50 data-flex-gt-sm=33 data-flex-gt-xs=33
                                    class="Styled__CityBlockHolder-m8ru5e-4 bImZlT"
                                    onclick="window.location.href='{{ route('city', $city->name) }}'"
                                    @if (isset($order[$index])) style="order: {{ $order[$index] }};" @endif>

                                    <div class="CityBlock__Block-fc0pwz-0 jPrPcR">
                                        <div class="CityBlock__Overlay-fc0pwz-1 kuQeoG"></div>
                                        <img src="{{ asset('storage/' . $city->image) }}" alt="{{ $city->name }}"
                                            style="max-width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); filter: brightness(70%);">

                                        <div class="CityBlock__Content-fc0pwz-2 dcuRiJ" data-layout=column
                                            data-layout-align="end end">
                                            <h3>{{ $city->name }}</h3>
                                            <span>{{ $city->country }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>



                    <div class="Styled__OtherCitiesHolder-m8ru5e-7 XqmYF
                         Container__Content-iuc7ta-0 iDvcNc"
                        data-layout=column data-layout-align="center center" data-flex-order=1>
                        <div class="SectionHeading__Heading-fwgzwm-0 iHKPAh"><span>Other
                                Cities</span></div>

                                <div class="Styled__CitiesContainer-m8ru5e-8 lbLhDd Container__Content-iuc7ta-0 iDvcNc"
                                data-layout=row data-layout-align="start start" data-layout-wrap=true>
                                @foreach ($otherCities as $city)
                                <div data-flex=50 data-flex-gt-sm=25 data-flex-gt-xs=33 class="Styled__CityTitleHolder-m8ru5e-10 ZjlBD"
                                    onclick="window.location.href='{{ route('city', $city->name) }}'">
                                    <div class="Styled__CityTitle-m8ru5e-11 eidlNM">{{ $city->name }}, {{ $city->country }}</div>
                                </div>
                                @endforeach
                            </div>
                            

                    </div>




                </div>
        </div>
        </main>
    </div>
    </div>
    <div id=a11y-status-message role=status aria-live=assertive aria-relevant="additions text"
        style=border:0px;clip:rect(0px,0px,0px,0px);height:1px;margin:-1px;overflow:hidden;padding:0px;position:absolute;width:1px>
    </div>









    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>.card_show{
        display: none;
      }
      .card_show:hover{display: table;}</style>
      <script>
              function myFunction1() {
            var x = document.getElementById("myDiv");
            if (x.style.display === "none") {
              x.style.display = "block";
            } else {
              x.style.display = "none";
            }
          }
        $(document).ready(function(){
          $("input").focusin(function(){
            // $(this).css("background-color", "#FFFFCC");
            document.getElementById("myDiv").style.display = "none"
          });
          $("input").focusout(function(){
            // $(this).css("background-color", "#FFFFFF");
            document.getElementById("myDiv").style.display = "table"
          });
        });
        </script>

    <script>
        document.getElementById("city-search-input").addEventListener("focus", function() {
            this.removeAttribute("placeholder");
        });
        document.getElementById("city-search-input").addEventListener("blur", function() {
            this.setAttribute("placeholder", "Search for your City");
        });
    </script>
    <script>
        function redirectTo(city) {
            window.location.href = '/cities/' + city;
        }
    </script>

<script>
    function selectCity(city) {
    // Do something with selected city
    console.log(city);
    window.location.href=`/city/${encodeURIComponent(city)}`;
}


$(document).ready(function() {
  // Add event listener for input on search box
  $('#city-search-input').on('input', function() {
    var query = $(this).val();
    if (query.length >= 2) {
      $.ajax({
        type: 'GET',
        url: '/searchCities',
        data: {query: query},
        dataType: 'json',
        success: function(response) {
          var results = response.cities;
          var html = '';
          if (results.length > 0) {
            for (var i = 0; i < results.length; i++) {
              html += '<li onclick="window.location.href=\'/city/' + encodeURIComponent(results[i].name) + '\'">' + results[i].name + ', ' + results[i].country + '</li>';
            }
          } else {
            html = '<p>No results found</p>';
          }
          $('#city-search-results').html(html);
          $('#city-search-results').show(); // Show the dropdown
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('Error: ' + errorThrown);
        }
      });
    } else {
      $('#city-search-results').hide(); // Hide the dropdown if there is not enough input
    }
  });

//   // Add event listener for blur on search box
//   $('#city-search-input').on('blur', function() {
//     $('#city-search-results').hide();
//   });

  // Add event listener for blur on search box
$('#city-search-input').on('blur', function() {
  setTimeout(function() {
    $('#city-search-results').hide();
  }, 200); // Delay for 200ms before hiding the dropdown
});
  // Add event listener for click outside of dropdown
  $(document).on('click', function(event) {
    if (!$(event.target).closest('#city-search-results').length && !$(event.target).is('#city-search-input')) {
      $('#city-search-results').hide();
    }
  });
});

</script>





    <script data-template-shadow-root>
        (() => {
            document.currentScript.remove();
            processNode(document);

            function processNode(node) {
                node.querySelectorAll("template[shadowroot]").forEach(element => {
                    let shadowRoot = element.parentElement.shadowRoot;
                    if (!shadowRoot) {
                        try {
                            shadowRoot = element.parentElement.attachShadow({
                                mode: element.getAttribute("shadowroot")
                            });
                            shadowRoot.innerHTML = element.innerHTML;
                            element.remove()
                        } catch (error) {}
                        if (shadowRoot) {
                            processNode(shadowRoot)
                        }
                    }
                })
            }
        })()
    </script>


</body>

</html>
