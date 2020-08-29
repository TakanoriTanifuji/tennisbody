<div class="container-fluid mt-5">
    <div class="row ">
        <div class="col-3 px-1 bg-dark position-fixed h-100" id="sticky-sidebar">

            <!-- search input  -->
            <form action="/search" method="get">
              {{ csrf_field() }}
                <div class="m-5 w-75 mx-auto mb-5">
                    <input type="text" class="form-control" id="address-input" name="location" placeholder="Enter location" value="Tokyo">
                    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
                    <script>
                      var placesAutocomplete = places({
                        container: document.querySelector('#address-input'),
                        templates: {
                              value: function(suggestion) {
                                return suggestion.name;
                              }
                            }
                          }).configure({
                            type: 'city',
                            aroundLatLngViaIP: false,
                          });
                    </script>

                    <div class="form-group mt-3">
                      <select class="form-control " name="level">
                      <option disabled selected value> select a level </option>
                        <option>1.0</option>
                        <option>1.5</option>
                        <option>2.5</option>
                        <option>3.0</option>
                        <option>3.5</option>
                        <option>4.0</option>
                        <option>4.5</option>
                        <option>5.0</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control " name="gender">
                        <option disabled selected value> select a gender </option>
                        <option>Female</option>
                        <option>Male</option>
                      </select>
                    </div>
                      <div class="input-group-append my-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </div>
                </div>
            </form>


        </div>
    </div>

</div>
