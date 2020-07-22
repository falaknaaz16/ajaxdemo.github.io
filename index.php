
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Hello, world!</title>

  </head>
   
 

       <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
       <div class="container">
      <h1 class="text-primary text-center">AJAX CRUD  </h1>
      <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Add
        </button>
      </div>
      <h2 class="text-warning">all recodsrs</h2>
      <div id="record_contents"></div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="modal-dialog">


  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First name</label>
    <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last name</label>
    <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">email</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Mobile</label>
    <input type="text" class="form-control" id="mobile" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
 
        ...
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addrecords();" >Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>


<!-- update model -->

<div class="modal fade" id="update_user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First name</label>
    <input type="text" class="form-control" id="ufirstname" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last name</label>
    <input type="text" class="form-control" id="ulastname" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">email</label>
    <input type="email" class="form-control" id="uemail">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Mobile</label>
    <input type="text" class="form-control" id="umobile" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
 
        ...update details
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updatedetails()">Save changes</button>
        <input type="hidden" name="" id="hidden_user_id">
      </div>
    </div>
  </div>
</div>
</div>




  </div>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>



<script>

  $(document).ready(function(){
    readRecords();

  });

  function readRecords(){
    var readrecords = "readrecordslllllllllll";
    $.ajax({
      url:'backend1.php',
      type: 'post',
      data:{readrecords : readrecords },
        success:function(data,status){
          $('#record_contents').html(data); 
        }

    });
  }

  function addrecords(){
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();
      $.ajax({
        url:"backend1.php",
        type:'post',
        data: { firstname : firstname,
                lastname : lastname,
                email : email,
                mobile : mobile
              },
             success:function(data,status){
              readRecords();
                     }

      });
  }


  function D_user(deleteid){
    var conf = confirm("are you sure wants to delete ");
    if(conf == true)
    {
      $.ajax({
        url:"backend1.php",
        type:"post",
        data:{ deleteid : deleteid },
          success:function(data,status){
            readRecords();

          }

      });
    }
  }


  function get_user(updateid){
    $('#hidden_user_id').val(updateid);
    $.post("backend1.php",{ uid: updateid }, function(data,status)
    {
     var user = JSON.parse(data);
      $('#ufirstname').val(user.firstname);
      $('#ulastname').val(user.lastname);
      $('#uemail').val(user.email);
      $('#umobile').val(user.mobile);

    }

    );
  // $('#update_user_modal').modal("show");
  }

  function  updatedetails()
  {
    var firstnameupd = $('#ufirstname').val();
    var lastnameupd = $('#ulastname').val();
    var emailupd = $('#uemail').val();
    var mobileupd = $('#umobile').val();

     var hidden_user_idupd = $('#hidden_user_id').val();

     //alert(firstnameupd,lastnameupd,emailupd,mobileupd);
   $.ajax({

        url:"backend1.php",
        type:"post",
        data:{ hidden_user_idsupd : hidden_user_idupd,
                firstnameupd :firstnameupd,
                lastnameupd :lastnameupd,
                emailupd :emailupd,
                mobileupd :mobileupd                 
             }, 
        success:function(data,status){
  //$('#update_user_modal').modal("hide");
 
          readRecords();
       }

      });


  }
  
</script>
</body>

</html>