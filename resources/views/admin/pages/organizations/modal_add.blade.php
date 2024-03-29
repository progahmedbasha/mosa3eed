<style>
/* * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    } */

#regForm {
    background-color: #ffffff;
    /* margin: 100px auto; */
    font-family: Raleway;
    padding: 21px;
    margin: auto;
    width: 90%;
    min-width: 300px;
}

h1 {
    text-align: left;
}

input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
    background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
    display: none;
}

button {
    background-color: #04AA6D;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
}

button:hover {
    opacity: 0.8;
}

#prevBtn {
    background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
    opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
    background-color: #04AA6D;
}

/* for widt modal */
.modal-dialog {
    max-width: 663px;
}
</style>
<div class="modal" id="modaldemo9">

    <div class="modal-dialog modal-dialog-centered" style="" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Create New Organization</h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>





            <form id="regForm" action="{{route('organizations.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab">
                    <div class="row">
                        <h5 style="color: #888;">( 1 )</h5>&nbsp;&nbsp;
                        <h1> Name:</h1>
                    </div>
                    <hr>
                    <label for="inputName">Name En</label>
                    <p><input class="form-control validate"  placeholder="Name En" value="{{old('name_en')}}" name="name_en"
                            required /></p>
                    @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="inputName">Name Ar</label>
                    <p><input placeholder="Name Ar" class="form-control form-control-solid validate" value="{{old('name_ar')}}"
                            name="name_ar" required /></p>
                    @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="inputState">Type</label>
                    <select class="form-control validate" name="type">
                        <option value="">Select Type</option>
                        <option value="Pharmacy">Pharmacy</option>
                        <option value="Store">Store</option>
                    </select>
                    @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                </div>
                <div class="tab">
                    <div class="row">
                        <h5 style="color: #888;">( 2 )</h5>&nbsp;&nbsp;
                        <h1>Contact Info:</h1>
                    </div>
                    <hr>
                    <label for="inputEmail4">Contact Email</label>
                    <p><input placeholder="E-mail..." class="form-control form-control-solid validate" value="{{old('email')}}"
                            name="email"></p>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="inputName">Phone</label>
                    <p><input placeholder="Phone..." class="form-control form-control-solid validate" value="{{old('phone')}}"
                            name="phone"></p>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="inputName">Contact</label>
                    <input type="text" class="form-control form-control-solid validate" placeholder="Contact"
                        value="{{old('contact_name')}}" name="contact_name">
                    @error('contact_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                </div>
                <div class="tab">
                    <div class="row">
                        <h5 style="color: #888;">( 3 )</h5>&nbsp;&nbsp;
                        <h1>Setting:</h1>
                    </div>
                    <hr>
                    <label for="inputName">Bio</label>
                    <input type="text" class="form-control form-control-solid validate" placeholder="Bio" value="{{old('bio')}}"
                        name="bio">
                    @error('bio')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="inputState">Verified Status</label>
                    <select class="form-control validate" name="status">
                        <option value="">Select Status</option>
                        <option value="Verified">Verified</option>
                        <option value="Not Verified">Not Verified</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label class="form-label" for="customFile">Photo</label>
                    <input type="file" class="form-control" id="customFile" name="photo"/>
                    <br>
                </div>
                <div class="tab">
                    <div class="row">
                        <h5 style="color: #888;">( 4 )</h5>&nbsp;&nbsp;
                        <h1>Address:</h1>
                    </div>
                    <hr>
                    <label for="inputState">Country</label>
                    <select id="country-dd" class="form-control validate" name="country_id">
                        <option value="">Select Country</option>
                        @foreach ($countries as $data)
                        <option value="{{$data->id}}">
                            {{$data->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputState">City</label>
                    <select id="city-dd" class="form-control validate" name="city_id">
                    </select>
                    @error('city_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputState">District</label>
                    <select id="state-dd" class="form-control validate" name="district_id">
                    </select>
                    @error('district_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputState">Address</label>
                    <input type="text" class="form-control form-control-solid validate" placeholder="Address"
                        value="{{old('address')}}" name="address">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <br>
                </div>
                <div class="tab">
                    <div class="row">
                        <h5 style="color: #888;">( 5 )</h5>&nbsp;&nbsp;
                        <h1>Owner:</h1>
                    </div>
                    <hr>
                    <label for="inputName">Name </label>
                    <input type="text" class="form-control validate" placeholder="Name " value="{{old('owner_name')}}"
                        name="owner_name">
                    @error('owner_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputName">Phone</label>
                    <input type="text" class="form-control form-control-solid validate" placeholder="Phone"
                        value="{{old('owner_phone')}}" name="owner_phone">
                    @error('owner_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputName">Email</label>
                    <input type="email" class="form-control form-control-solid validate" placeholder="Email"
                        value="{{old('owner_email')}}" name="owner_email">
                    @error('owner_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputName">Password</label>
                    <input type="password" class="form-control form-control-solid validate" placeholder="Password"
                        value="{{old('owner_password')}}" name="owner_password">
                    @error('owner_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label" for="customFile">Photo</label>
                    <input type="file" class="form-control" id="customFile" name="owner_photo" />
                    <br>
                </div>
                <div class="tab">
                    <div class="row">
                        <h5 style="color: #888;">( 6 )</h5>&nbsp;&nbsp;
                        <h1>Branch:</h1>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col">
                            <label for="inputName">Name En</label>
                            <input type="text" class="form-control validate" placeholder="Name En"
                                value="{{old('branch_name_en')}}" name="branch_name_en">
                            @error('branch_name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputName">Name Ar</label>
                            <input type="text" class="form-control form-control-solid validate" placeholder="Name Ar"
                                value="{{old('branch_name_ar')}}" name="branch_name_ar">
                            @error('branch_name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="inputName">Phone 1</label>
                            <input type="text" class="form-control validate" placeholder="Phone 1"
                                value="{{old('branch_phone_1')}}" name="branch_phone_1" />
                            @error('branch_phone_1')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputName">Phone 2</label>
                            <input type="text" class="form-control validate" placeholder="Phone 2"
                                value="{{old('branch_phone_2')}}" name="branch_phone_2">
                            @error('branch_phone_2')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>




                    <label for="inputName">Email</label>
                    <input type="email" class="form-control validate" placeholder="Email" value="{{old('branch_email')}}"
                        name="branch_email" />
                    @error('branch_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputName">Address</label>
                    <input type="text" class="form-control form-control-solid validate" placeholder="Address"
                        value="{{old('branch_address')}}" name="branch_address">
                    @error('branch_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label class="form-label" for="customFile">Photo</label>
                    <input type="file" class="form-control" id="customFile" name="branch_photo" />

                    <br>
                </div>
                <div class="tab">
                    <div class="row">
                        <h5 style="color: #888;">( 7 )</h5>&nbsp;&nbsp;
                        <h1>Branch Admin:</h1>
                    </div>
                    <hr>

                    <label for="inputName">Name</label>
                    <input type="text" class="form-control validate" placeholder="Name" value="{{old('admin_name')}}"
                        name="admin_name">
                    @error('admin_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputName">Email</label>
                    <input type="email" class="form-control form-control-solid validate" placeholder="Email"
                        value="{{old('admin_email')}}" name="admin_email">
                    @error('admin_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputName">Phone</label>
                    <input type="text" class="form-control form-control-solid validate" placeholder="Phone"
                        value="{{old('admin_phone')}}" name="admin_phone">
                    @error('admin_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="inputName">Passowrd</label>
                    <input type="password" class="form-control validate" placeholder="Passowrd" value="{{old('admin_password')}}"
                        name="admin_password">
                    @error('admin_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label" for="customFile">Photo</label>
                    <input type="file" class="form-control" id="customFile" name="admin_photo" />
                    <br>
                </div>
                <div class="tab">
                    <div class="row">
                        <h5 style="color: #888;">( 8 )</h5>&nbsp;&nbsp;
                        <h1>Shift:</h1>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col">
                            <label for="inputName">Shift Name</label>
                            <input type="text" class="form-control form-control-solid validate" placeholder="Shift Name"
                                value="{{old('shift_name')}}" name="shift_name">
                            @error('shift_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="inputName">Days</label>
                            <h4>Saturday :</h4>
                            <input type="hidden" name="day[]" value="saturday">
                        </div>
                        <div class="col">
                            <label for="inputName">Time From</label>
                            <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                value="{{old('from[]')}}" name="from[]">
                            @error('from')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputName">Time To</label>
                            <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                value="{{old('to[]')}}" name="to[]">
                            @error('to')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <h4>Sunday :</h4>
                            <input type="hidden" name="day[]" value="sunday">
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                value="{{old('from[]')}}" name="from[]">
                            @error('from')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                value="{{old('to[]')}}" name="to[]">
                            @error('to')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <h4>Monday :</h4>
                            <input type="hidden" name="day[]" value="Monday">
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                value="{{old('from[]')}}" name="from[]">
                            @error('from')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                value="{{old('to[]')}}" name="to[]">
                            @error('to')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <h4>Tuesday :</h4>
                            <input type="hidden" name="day[]" value="Tuesday">
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                value="{{old('from[]')}}" name="from[]">
                            @error('from')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                value="{{old('to[]')}}" name="to[]">
                            @error('to')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <h4>Wednesday :</h4>
                            <input type="hidden" name="day[]" value="Wednesday">
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                value="{{old('from[]')}}" name="from[]">
                            @error('from')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                value="{{old('to[]')}}" name="to[]">
                            @error('to')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <h4>Thursday :</h4>
                            <input type="hidden" name="day[]" value="Thursday">
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                value="{{old('from[]')}}" name="from[]">
                            @error('from')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                value="{{old('to[]')}}" name="to[]">
                            @error('to')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <h4>Friday :</h4>
                            <input type="hidden" name="day[]" value="Friday">
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                value="{{old('from[]')}}" name="from[]">
                            @error('from')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                value="{{old('to[]')}}" name="to[]">
                            @error('to')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <br>
                </div>
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" style="background: gainsboro;color: black;" id="skiptBtn"
                            onclick="skipPrev(1)">Skip</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        <button type="submit" style="display:none;" id="submit">Submit</button>

                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@include('admin.pages.component.country_city_district')
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
        document.getElementById("submit").style.display = "none";
        document.getElementById("skiptBtn").style.display = "inline";
        document.getElementById("nextBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("submit").style.display = "inline";
        document.getElementById("submit").innerHTML = "Submit";
        document.getElementById("skiptBtn").style.display = "none";
        document.getElementById("nextBtn").style.display = "none";

    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function skipPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    // if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByClassName("validate");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}
</script>