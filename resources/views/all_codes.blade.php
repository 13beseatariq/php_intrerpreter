<!DOCTYPE html>
<html>
    <head>
        <title>All Codes</title>
    <style>
        hr{
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }
    </style>
    </head>
    <body>
    <h1 align="center" style="font-family: Centaurl; color:red">
        All Codes
    </h1>
    <?php
    if (isset($codes))
    {
    ?>
    @foreach($codes as $code)
        <p style="font-weight: bold; color: purple">Code Id: {{$code->id}}</p>
        <span style="font-weight: bold ">Published At:</span> <span> {{$code->published_at}}</span><br>
        <span style="font-weight: bold;">Code Sumbitted:</span> <br><span style=" font-style: italic">
            <?php
                $line = str_split($code->code);
                for ($i=0; $i<sizeof($line); $i++)
                 {
                     if ($line[$i]==";")
                         {
                         echo $line[$i];
                             echo "<br>";
                             }
                     else
                         echo $line[$i];
                }
            ?>
        </span>
        <hr>
    @endforeach
    <?php } ?>
    <div align="center" style="text-decoration:none;font-weight: bold; font-size: 20px">
    <a href="code" > Click here to run and test code</a>
        <br><a href="logout"> Logout </a>
    </div>
    </body>
</html>
