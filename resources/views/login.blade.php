@include('partials.header')
   <body>
    <div class="row">
      <h3>Welcome, Please do login</h3>
      @if(count($errors))
        <div class="alert success">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>

    </div>
    {!! Form::open(['route'=>'auth.login', 'method'=>'post']) !!}
      <div class="row">
        <div class="medium-2 columns">
          <label>Username/email</label>
        </div>
        <div class="medium-10 columns">
          <input type="text" name="email" required/>
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
        <input type="submit" name="submit" value="log in" class="button radius"/>
      </div>
      {!! form::close() !!}
    </body>
</html>

 
