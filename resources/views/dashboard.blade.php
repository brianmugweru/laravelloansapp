@include('partials.header')
<style>
  .row{
    max-width:100%;
  }
  ul.right li{
    display:inline;
    list-style:none;
    float:right;
  }
  div.header{
    background:#4527A0;
    padding:auto;
    min-height:70px;
    line-height:70px;
  }
  div.header h4{
    line-height:70px;
    color:white;
    margin-left:10px;
    font-size:26px;
  }
  div.header ul li{
    line-height:60px;
  }
  div.header ul li a{
    color:white;
    margin-right:20px;
  }
  div.header ul li a:hover{
    color:magenta;
  }
  div.header .medium-2{
    background:#3F51B5;
  }
  .username{
    background:#4527A0;
  }
  .username img{
    height:90px;
    width:90px;
    border-radius:20px;
  }
  .username span{
    color:white;
  }
  .dashboard{
    margin:auto 20px;
  }
  .account{
    background:white;
  }
  .menu{
    background:#212121;
  }
  .menu li{
    background:#424242;
    height:120px;
  }
  .menu li p{
    text-align:center;
  }
  .menu li a{
    color:white;
    text-align:center;
    line-height:40px;
    margin:auto;
    padding:auto;
  }
  .menu li:hover{
    background:white;
  }
  .menu li:hover a{
    color:#263238;
  } 
  .account span{
    font-size:14px;
  }
  .content{
    background:white;
  }
</style>
<!-- header row begins here -->
<body>
<div class="row header collapse">
  <div class="medium-2 columns">
    <h4>Loans Dashboard</h4>
  </div>
  <div class="medium-10 columns">
    <ul class="right">
      <li> <a href="#">User role</a> </li>
      <li> <a href="#">Settings</a> </li>
      <li> <a href="/logout">logout</a></li>
  </div>
</div>
<!-- Header ends here -->

<div class="row collapse">
  <div class="medium-12 columns">
    <div class="dashboard">
      <h3>Page title</h3>
      <div class="account">
        <div class="row">
          <div class="medium-4 columns">
            <p><span style='margin-left:24px;'> {{Auth::User()->fname}} {{Auth::User()->mname}} {{Auth::User()->lname}}</span>
            <br>
            <span style='margin-left:24px;'>{{Auth::User()->email}}</span><br>
            <span style='margin-left:24px;'>id number:{{Auth::User()->idnumber}}</span></p>
          </div>
          <div class="medium-4 columns">
            <p><span>residence:{{auth::user()->residence}}</span>
            <br><span>address:{{auth::user()->address}}</span>
            <br><span>telephone:{{auth::user()->tel}}</span> </p> 
          </div>
          <div class="medium-4 columns">
            <p><span>marital status:{{auth::user()->marital}}</span>
            <br><span>dob:{{auth::user()->dob }}</span>
            <br><span>contact details</span></p>
          </div>
        </div>
        <a class='button tiny' style='margin-left:36px; border-radius:5px;'href='#'>view More</a>
      </div>

<ul class="tabs" data-tab style="margin-top:20px;">
  <li class="tab-title active"><a href="#panel1">Take a Loan</a></li>
  <li class="tab-title"><a href="#panel2">Add to Savings</a></li>
  <li class="tab-title"><a href="#panel3">Pay a Loan</a></li>
  <li class="tab-title"><a href="#panel4">Check savings</a></li>
  <li class="tab-title"><a href="#panel5">Check loans</a></li>
</ul>
<div class="tabs-content">
  <div class="content active" id="panel1">
    {!! Form::open(['route'=>'loans.store','method'=>'post','class'=>'col s12']) !!}
      <fieldset>
        <legend>Enter loan amount</legend>
        <label for="loan">Enter amount</label>
        <input type="text" name="loan" value="" id="loan" />
        <input type="submit" name="submit" value="take loan" class="button small radius"/>
      </fieldset>

    {!! Form::close() !!}
  </div>
  <div class="content" id="panel2">
    {!! Form::open(['route'=>'savings.store','method'=>'post','class'=>'col s12']) !!}
      <fieldset>
        <legend>Add personal savings</legend>
        <label for="savings">Enter amount</label>
        <input type="text" name="savings" value="" id="savings" />
        <input type="submit" name="submit" value="Add savings" class="button small radius"/>
      </fieldset>

    {!! Form::close() !!}
  
  </div>
  <div class="content" id="panel3">
    @if($loans)
      @foreach($loans as $loan)
        <p>pay your loan of {{ $loan->loan }} 
          {!! Form::open(array('url'=>'loans/'.$loan->id)) !!}
            {!! Form::hidden('_method','PUT') !!}
            {!! Form::hidden('value','1')!!}
            {!! Form::submit('Pay Loan', array('class'=>'button small radius')) !!}
          {!! Form::close() !!}
      @endforeach
    @endif
  </div>
  <div class="content" id="panel4">
    <table class="responsive-table">
      @if($savings)
      <thead>
        <tr>
          <th>Saving</th>
          <th>Amount</th>
          <th>Saved On</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($savings as $saving)
        <tr>
          <td>{{ $saving->id }}</td>
          <td>{{ $saving->saving }}</td>
          <td>{{ $saving->created_at }}</td>
          <td><a href="{{ URL::to('savings/'.$saving->id) }}">View</a></td>
        </tr>
      @endforeach
      </tbody>
      @endif
    </table>
    Total savings Amount: {{ $total }}
  </div>
  <div class="content" id="panel5">
    <table class="responsive-table">
      @if($totalloans)
      <thead>
        <tr>
          <th>loan</th>
          <th>Amount</th>
          <th>Taken On</th>
          <th>Payment</th>
        </tr>
      </thead>
      <tbody>
      @foreach($totalloans as $loan)
        <tr>
          <td>{{ $loan->id }}</td>
          <td>{{ $loan->loan }}</td>
          <td>{{ $loan->created_at }}</td>
          @if($loan->repayment==1)
            <td>repayed</td>
          @else
            <td>not yet</td>
          @endif
        </tr>
      @endforeach
      </tbody>
      @endif
    </table>

  </div>
</div>
    </div>
  </div>
</div>
<script type='text/javascript' src="js/jquery.min.js"></script>
<script type='text/javascript' src="js/foundation.min.js"></script>
<script type='text/javascript' src="js/foundation.tabs.min.js"></script>
<script type='text/javascript' >
  $(document).foundation();
</script>
</body>
</html>
