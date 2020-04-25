<html>
	 <head>
		  <title>PHP Password Generator Script | Random Password Generator</title>
		  <link rel="stylesheet" type="text/css" href="style.css">
<script src='jquery.js'></script>
<script type='text/javascript'>
var countselect='';
var $lcl,$ucl,$nl,$sl=0;
	 $(document).ready(function(){
	 var sds = document.getElementById("gaurav");
     if(sds == null){
         alert("You are not supposed to remove this tag");
     } 
	 $('.ckbox').click(function() {
		  $ckidd=$(this).attr('id');
		  if($(this).attr("checked")==true)
		  {
			   $("#"+$ckidd).val($ckidd);
		  }
		  else
		  {
			   $("#"+$ckidd).val(0)
			   if ($ckidd=="lowl") {$lcl=0; }
			   if ($ckidd=="upl") {$ucl=0;}
			   if ($ckidd=="nol") {$nl=0;}
			   if ($ckidd=="syml") {$sl=0;}
		  }	
	 });	
});
function submitt()
{
	 var chkval = [];
	 $.each($("input:checked"), function(){            
		   chkval.push($(this).val());
	 });
	 var countChecked = function() {
	 countselect = $( "input:checked" ).length;
	 };
	 countChecked();
	 if (countselect==0) {
		  $('#texarea').slideUp('slow');
		  alert("Select atleast one option");		  
	 }
	 var num =$("#mlen").val();
	 var division = num/countselect;	
	 var testarray=new Array("lowl","upl","nol","syml");
	 for(var i=0;i<=countselect;i++)
	 {
	   if (chkval[i]=="lowl") {$lcl=division;}
	   if (chkval[i]=="upl") {$ucl=division;}
	   if (chkval[i]=="nol") {$nl=division;}
	   if (chkval[i]=="syml") {$sl=division;}
	 }
	 var one = chkval[0];
	 $len=$("#mlen").val();	
	 if ($len!='') {		  	 
		  if(countselect!=0)
		  {
		  $('#err_msg').html("<font color='green'><img src='loader.gif' border='0' alt='Loading...' /></font>");
			   $.post("ajax-generator.php","length="+$len+"&lowl="+$lcl+"&upl="+$ucl+"&nol="+$nl+"&syml="+$sl,function(resp){	   
					$('#err_msg').html("");
					$('#texarea').slideDown('slow');	
					$('#texarea').html(resp);          
			   });    
		  }
	 }
	 else{
		  alert("Check Password Length");
	 }
}
function isnumeric(idd)
{
	 $data=$('#'+idd).val();
	 if($data!="")
	 {
		if($data.match('^(0|[1-9][0-9]*)$'))
		{
			 return true;
		}
		else
		{ 
			 $('#'+idd).val("");
			 return false;
		} 
	 } 
}
function checknum(vv)
{
	 var dat = vv.value;
        if (dat>20 || dat<6) {
            alert("Check Password Length");
            vv.value='';
        }
		
}
function copy() {
  var copyText = document.getElementById("gene");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Text Copied: " + copyText.value);
}
</script>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	 </head>
	 <body>
	 <center><b class="ttl">Password Generator</b></center><br>
		  <div class='resp_code frms'>
	
<div align='center' id='content'>
	<b>Password Length(6 - 20 chars) : </b><br><br>
	 <input size="2" name="length" maxlength="2" value="8" type="text" id='mlen' class='input_text_class' onkeyup="isnumeric('mlen')" onblur='checknum(this)' style='width:30%;'>
	 <div style='width:100%;'>
		  <div style='float:left;width:50%;'>
			   <b>Lowercase :</b>
			   <input name="alpha" id='lowl' value="lowl" type="checkbox" checked class='ckbox'><br /><br />( e.g. abcdef)
		  </div>
		  <div style='float:left;width:50%;'>
			   <b>Numbers : </b>
			   <input name="numeric" id='nol' value="nol" type="checkbox" class='ckbox'><br /><br />( e.g. 1234567)
		  </div>
		 
	 </div><br><br><br />
	 <div style='width:100%; padding: 50px 0 0;'>
	 <div style='float:left;width:50%;'>
			   <b>Uppercase :</b>
			   <input name="mixedcase" id='upl' value="upl" type="checkbox" class='ckbox'><br /><br />( e.g. ABCDEF)	
		  </div>
		  <div style='float:left;width:50%;'>
			   <b>Symbols : </b>
			   <input name="punctuation" id='syml' value="syml" type="checkbox" class='ckbox'><br /><br />( e.g. !*_&)	
		  </div>
	 </div><br>	 <br /><br />	
	 <div id='err_msg' class='error'></div><br />
	 <input  type="button"  value="Generate Password(s)" onclick="submitt()" class="blue_button" />
	 <div class='texareas' id='texarea' ></div> <button onclick="copy()">Copy text</button>
	 <input name="generate" value="true" id="gene" type="hidden">
</div>

</div>

<div class="animation-area">
<ul class="box-area">
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>
</div>
<div align="center"> <b>
<a href="https://thegauravparmar.com"  id="gaurav"   style="font-size: 25px;color: #fff; text-decoration:none;">&copy;TheGauravParmar</a>
</b>
</div>
	 </body>
</html>



