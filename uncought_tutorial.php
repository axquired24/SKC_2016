//Tutor Ajax PHP

<?php
    echo 'Hello';
?>

<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'file1.php',
                success: function(data) {
                    alert(data);
                }
            });

        }); //END $(document).ready()

    </script>
</head>
<body></body>
</html>

<script>
$(document).ready(function() {   
    $(".myclass").change(function(){
        var identifier = $(this).attr('id');
        var Qty = $(this).val();
        var Price = $("#price_"+identifier).val();//price value
        var Total =  Qty * Price;  
        $("#priceDisplay_"+identifier).html(Total);                 
        GrandTotal();

        //Call an ajax function here
          $.ajax({
             type: "GET",
             url: "sessionupdate.php",
             data: { quantity:Qty,price1:Price,id: <?php echo $_SESSION['r'];?>},
             success:function(data){
                     alert(data);
              }
           });
       });
     GrandTotal();      
      });
</script>

<?php 
//contoh array
$data = Array
(
    [1] => 'Kalkulator',
    [2] => 'Server',
    [3] => 'Komputer',
    [4] => 'PC'
);
 
//hasil serialisasi (serialization)
$hasil_serialisasi = serialize($data);
echo $hasil_serialisasi; ## akan menghasilkan a:4:{i:1;s:10:"Kalkulator";i:2;s:6:"Server";i:3;s:8:"Komputer";i:4;s:2:"PC";}
 
//$hasil_serisalisasi inilah yang dapat anda masukkan ke suatu kolom      

?>

<!-- JQUERY FORM -->
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
var val;
$(document).ready(function(){
    $("button").click(function(){
        val = $("tr.a1>td>div").attr("value");
        $("#var1").attr({
          "value" : val,
           "title" : "W3Schools jQuery Tutorial"
        });
        val = $("tr.a2>td>div").attr("value");
        $("#var2").attr({
          "value" : val,
           "title" : "W3Schools jQuery Tutorial"
        });
    });
});
</script>
</head>
<body>
<table id="table1">
<colgroup>
<col width="450"/>
</colgroup>
<tbody>
<tr class="a1"><td><span>1</span><div id="c" class="redips-drag green" value="Riao Manadies">Riao Manadi</div></td></tr>
<tr class="a2"><td><span>1</span><div id="d" class="redips-drag green" value="Kaori">Kaori</div></td></tr>
</tbody>
</table>
<p><a href="http://www.w3schools.com" id="w3s">W3Schools.com</a></p>

<form action="#" method="post">
<input type="text" name="var1" id="var1" placeholder="Variable 1" />
<input type="text" name="var2" id="var2" placeholder="Variable 2" />
</form> 
<button>Show href Value</button>

</body>
</html>

<!-- Bootstrap DatePicker -->

<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="./css/prettify-1.0.css" rel="stylesheet">
<link href="./css/base.css" rel="stylesheet">
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<div class="container">
  <h2 class="page-header">Date Picker </div>
    <div class="col-sm-6" style="height:130px;">
        <div class="form-group">
            <div class='input-group date' id='datetimepicker10'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
      $('#datetimepicker10').datetimepicker({
        viewMode: 'days',
        format: 'YYYY-MM-DD'
      });
    });    
</script>

---------------------------------------------------
random id

<?php

$rand_num = rand(1,30);
$array_id = [];
// echo "Angka Random: ".$rand_num;

for($i=1; $i<=30; $i++){
    $array_id[$i] = $i;
}

//Acak isi array
shuffle($array_id);

echo "Jumlah Array : ".count($array_id)."<br>"."Array: ";
foreach($array_id as $key_id => $val){
    echo $val.", ";
}
?>




---------------------------------------------------------
CARI Duplikat Data SQL
----------------------
SELECT JudulBuku, COUNT(*)
FROM tblBuku
GROUP BY JudulBuku
HAVING ( COUNT(JudulBuku) > 1 )


---------------------------------------------------------
auto required 
make a input field required if radio is checked
-------------
<input type="text" name="ladder-meters" id="ladder-meters">
and should like this at the onchange event on the radio
<input type="text" name="ladder-meters" id="ladder-meters" required>
-------------
$('#ladder').change(function () {
    if($(this).is(':checked') {
        $('#ladder-meters').attr('required');
    } else {
        $('#ladder-meters').removeAttr('required');
    }
});



--------------------------------------------------------
How to detect a textbox's content has changed

jQuery('#some_text_box').on('input', function() {
    // do your stuff
});

--------------------
...which is nice and clean, but may be extended further to:

jQuery('#some_text_box').on('input propertychange paste', function() {
    // do your stuff
});

------------------------------------------------------------
Secret Password JQUERY
-----------------------
<div style="display: none" class="secret">Correct password!</div>
var pass="password";
var typed="";

$(document).keypress(
    function (e) {
       typed += String.fromCharCode(e.which);

       if (typed===pass) {
           $('.secret').show();
       }
    }
);

---------------------------------------------------------