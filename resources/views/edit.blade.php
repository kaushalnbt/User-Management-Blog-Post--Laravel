<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        @if(session('success'))
                    <div class="alert alert success">{{ session('success')}}</div>
                    @endif
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Edit Details</Details>
                                </h2>

                                <form action="{{ url('update-data/'.$users->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="Name" value=" {{ $users -> Name }}" />
                                        <label class="form-label" for="form3Example1cg">Your Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="Email" value="{{ $users -> Email}}" />
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="phone" id="form3Example4cg" class="form-control form-control-lg" name="Phone" value=" {{ $users -> Phone }}" />
                                        <label class="form-label" for="form3Example4cg">Phone</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example4cdg" class="form-control form-control-lg" name="Address" value=" {{ $users -> Address }}" />
                                        <label class="form-label" for="form3Example4cdg">Address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <select name="State" id="state" class="form-control form-control-lg">
                    
                                                @foreach($states as $state)
                                                @if($state == $users->State)
                                                
                                        
                                            <option value=" {{ $state }}" selected>{{$state}}</option>
                                                    @else
                                                
                                        

                                            <option value=" {{ $state }}" >{{$state}}</option>
                                            @endif
                                            
                                        
                                            @endforeach
                                            <!-- <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option> -->
                                        </select>
                                    </div>

                                    <h6 class="mb-0 me-4">Gender: </h6>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="Gender" id="femaleGender" value="Female" @if( $users->Gender =="Female")
                                        checked
                                        @endif
                                        />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="Gender" id="maleGender" value="Male" @if( $users->Gender =="Male")
                                        checked
                                        @endif/>
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="Gender" id="otherGender" value="Other" @if( $users->Gender =="Other")
                                        checked
                                        @endif/>
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>

                                    <br />
                                    <br />

                                    <h4>Select Your Hobbies</h4>
                                    <div class="">
                                        <!-- <input type="Checkbox" id="hobbies1" class="form-check-input" name="Hobbies[]" value="Cricket" />
                                        <label class="form-check-label" for="hobbies1">Cricket</label>
                                        <br />
                                        <input type="Checkbox" id="hobbies1" class="form-check-input" name="Hobbies[]" value="Singing" />
                                        <label class="form-check-label" for="hobbies2">Singing</label>
                                        <br />
                                        <input type="Checkbox" id="hobbies1" class="form-check-input" name="Hobbies[]" value="Dancing" />
                                        <label class="form-check-label" for="hobbies3">Dancing</label>
                                        <br />
                                        <input type="Checkbox" id="hobbies1" class="form-check-input" name="Hobbies[]" value="Travelling" />
                                        <label class="form-check-label" for="hobbies4">Travelling</label>
                                        <br />
                                        <input type="Checkbox" id="hobbies1" class="form-check-input" name="Hobbies[]" value="Swimming" />
                                        <label class="form-check-label" for="hobbies5">Swimming</label> -->
                                        
                                            @foreach($hobbies as $hobby)
                                            
                                                @if(in_array($hobby,$store))
                                                
                                                    
                                                    <input type="Checkbox" id="hobbies1" class="form-check-input" name="Hobbies[]" value="{{$hobby}}" checked/>
                                                    <label class="form-check-label" for="hobbies1">{{$hobby}}</label>
            
                                                
                                                    @else
                                                    
                                                    
                                                    <input type="Checkbox" id="hobbies1" class="form-check-input" name="Hobbies[]" value="{{$hobby}}" />
                                                    <label class="form-check-label" for="hobbies1">{{$hobby}}</label>   
                                                    @endif
                                                
                                            @endforeach
                                        
                                    </div>

                            </div>
                            <input type="hidden" name="hidden_id" value="{{ $users -> id }}" />
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Update</button>
                            </div>

                            <br><br>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- <script>
        document.getElementByName('State')[0].value = "{{ $users -> State}}";
        document.getElementByName('Gender')[0].value = "{{ $users -> Gender}}";
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>