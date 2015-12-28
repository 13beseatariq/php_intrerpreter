<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Run And Test Your PHP Code!</title>
    <style type="text/css">
        #mybox {
            width: 600px;
            height: 490px;
            border: 1px solid green;
        }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        function run_code() {
            var request = $.ajax({
                url: "code.php",
                type: "GET",
                dataType: "html"
            });

            request.done(function(msg) {
                $("#mybox").html(msg);
            });

            request.fail(function(jqXHR, textStatus) {
                alert( "Request failed: " + textStatus );
            });
        }

    </script>
</head>
<body>
<div class="row">
    <div class="col-lg-6">
        <p style="color:black; font-size:24px; font-weight: bold; font-family: Century;"> Welcome <?php echo (\Auth::user()->name); ?>! </p>
    </div>
    <div class="col-lg-6">
        <p style="color:black; font-size:24px; font-weight: bold; font-family: Century;"> Run And Test Your PHP Code! </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-6" class="form-group" style="padding-left: 10px">
        {!! Form::open(array('url'=>'/code','method'=>'POST', 'id'=>'myform')) !!}
        {!! Form::textarea('code','',array('id'=>'usercoded','class'=>'form-control span6', 'rows'=>'24')) !!}
    </div>
    <div class="col-lg-6">
        <div id="mybox">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12" align="center" style="padding-top: 15px">
        {!! Form::button('Run Code!', array('class'=>'btn btn-success','id'=>'send')) !!}
        {!! Form::button('Save Code!', array('class'=>'btn btn-info','id'=>'save')) !!}

    </div>
</div>
<div class="row">
    <div class="col-lg-12" align="center" style="padding-top: 10px">
        <a href="allcodes" style="font-weight: bold"> View All Codes </a>&nbsp;&nbsp;&nbsp; <a href="logout" style="font-weight: bold"> Logout </a>
        {!! Form::close() !!}
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#send').click(function(){
            //alert ("Send button called");
            $.ajax({
                url: 'code',
                type: "post",
                data: {'code':$('#usercoded').val(), '_token': $('input[name=_token]').val(),'type':'run_it'},
                success: function(data){
                   // alert(data);
                    run_code();
                }
            });
        });

        $('#save').click(function(){
           // alert ("Save button called");
            /*
            $oldstr = $('#usercoded').val();
            $str_to_insert= "<br>"
            $pos =  strrpos($oldstr,';');
            $newstr = substr_replace($oldstr, $str_to_insert, $pos, 0);
            alert($newstr);
            */

            $.ajax({
                url: 'code',
                type: "post",
                data: {'code':$('#usercoded').val(), '_token': $('input[name=_token]').val(),'type':'store_it'},
                success: function(data){
                    alert("Code Successfully Saved In Database!");
                    //run_code();
                },
                error:function(data)
                {
                  alert ("error");
                }
             });

        });
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>
</body>
</html>