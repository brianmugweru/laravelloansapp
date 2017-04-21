@include('partials.header')
   <body>
    <div class="row">
      <h3>Welcome, Please do Sign up</h3>
    </div>
      {!! Form::open(['route'=>'user.register', 'method'=>'post']) !!}
      <div class="row">
        <div class="medium-4 columns">
          <label>First Name</label>
          <input type="text" name="fname" required/>
        </div>
        <div class="medium-4 columns">
          <label>Middle Name</label>
          <input type="text" name="mname" required/>
        </div>
        <div class="medium-4 columns">
          <label>Last Name</label>
          <input type="text" name="lname" required/>
        </div>
      </div>
      <div class="row">
        <div class="medium-2 columns">
          <label>email</label>
        </div>
        <div class="medium-10 columns">
          <input type="email" name="email" required/>
        </div>
      </div>
      <div class="row">
        <div class="medium-2 columns">
          <label>Address</label>
        </div>
        <div class="medium-10 columns">
          <input type="text" name="address" required/>
        </div>
      </div>
      <div class="row">
        <div class="medium-2 columns">
          <label>Mobile Number</label>
        </div>
        <div class="medium-10 columns">
          <input type="text" name="tel" required/>
        </div>
      </div>
      <div class="row">
        <div class="medium-2 columns">
          <label>National Id</label>
        </div>
        <div class="medium-10 columns">
          <input type="text" name="idnumber" required/>
        </div>
      </div>
      <div class="row">
        <div class="medium-2 columns">
          <label>Date Of Birth</label>
        </div>
        <div class="medium-10 columns">
          <input type="date" name="dob" required/>
        </div>
      </div>
      <div class="row">
        <div class="medium-2 columns">
          <label>Marital Status</label>
        </div>
        <div class="medium-10 columns">
          <select name="marital">
            <option value="married">Married</option>
            <option value="single">Single</option>
            <option value="divorced">divorced</option>
            <option value="remarried">remarried</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="medium-2 columns">
          <label>residence</label>
        </div>
        <div class="medium-10 columns">
          <input type="text" name="residence" required/>
        </div>
      </div>
      <div class="row">
        <div class="medium-2 columns">
          <label>Password</label>
        </div>
        <div class="medium-10 columns">
          <input type="password" name="password" required/>
        </div>
      </div>
      <div class="row">
        <div class="medium-2 columns">
          <label>Retype Password</label>
        </div>
        <div class="medium-10 columns">
          <input type="password" name="retypepass" required/>
        </div>
      </div>
      <div class="row">
        <input type="submit" name="submit" value="Register" class="button radius"/>
      </div>
      {!! Form::Close() !!}
    </body>
</html>

 
