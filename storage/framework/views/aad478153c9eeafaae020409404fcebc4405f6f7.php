<?php $__env->startSection('title', 'Currency Create'); ?>
<?php $__env->startSection('content'); ?>
<script language=JavaScript type="text/javascript">
function stripNum(num) {

var iPercent
var iDollar
var iSpace
var iComma
var numLength = num.length

//lalalla Line #114

if(numLength > 0) {

   num=num.toString();

   iPercent = num.indexOf("%");
   if(iPercent >= 0) {
      num=num.substring(0,iPercent) + "" + num.substring(iPercent + 1,numLength);
      numLength=num.length;
      }
   iDollar = num.indexOf("$");
   if(iDollar >= 0) {
      num=num.substring(0,iDollar) + "" + num.substring(iDollar + 1,numLength);
      numLength=num.length;
      }
   iSpace = num.indexOf(" ");
   if(iSpace >= 0) {
      num=num.substring(0,iSpace) + "" + num.substring(iSpace + 1,numLength);
      numLength=num.length;
      }
   iComma = num.indexOf(",");
   if(iComma >= 0) {
      while(iComma >=1) {
         num=num.substring(0,iComma) + "" + num.substring(iComma + 1,numLength);
         numLength=num.length;
         iComma = num.indexOf(",");
      }
      }

      num = eval(num);


} else {

num = 0;

}

return num;

}




function computeMonthlyPayment(prin, numPmts, intRate) {

var pmtAmt = 0;

if(intRate == 0) {
   pmtAmt = prin / numPmts;
} else {
   
   if (intRate >= 1.0) {
     intRate = intRate / 100.0;
   }
   intRate /= 12;

   var pow = 1;
   for (var j = 0; j < numPmts; j++)
      pow = pow * (1 + intRate);

   pmtAmt = (prin * pow * intRate) / (pow - 1);

}

return pmtAmt;

}




function formatNumberDec(num, places, comma) {

var isNeg=0;

    if(num < 0) {
       num=num*-1;
       isNeg=1;
    }

    var myDecFact = 1;
    var myPlaces = 0;
    var myZeros = "";
    while(myPlaces < places) {
       myDecFact = myDecFact * 10;
       myPlaces = eval(myPlaces) + eval(1);
       myZeros = myZeros + "0";
    }
    
	onum=Math.round(num*myDecFact)/myDecFact;
		
	integer=Math.floor(onum);

	if (Math.ceil(onum) == integer) {
		decimal=myZeros;
	} else{
		decimal=Math.round((onum-integer)* myDecFact)
	}
	decimal=decimal.toString();
	if (decimal.length<places) {
        fillZeroes = places - decimal.length;
	   for (z=0;z<fillZeroes;z++) {
        decimal="0"+decimal;
        }
     }

   if(places > 0) {
      decimal = "." + decimal;
   }

   if(comma == 1) {
	integer=integer.toString();
	var tmpnum="";
	var tmpinteger="";
	var y=0;

	for (x=integer.length;x>0;x--) {
		tmpnum=tmpnum+integer.charAt(x-1);
		y=y+1;
		if (y==3 & x>1) {
			tmpnum=tmpnum+",";
			y=0;
		}
	}

	for (x=tmpnum.length;x>0;x--) {
		tmpinteger=tmpinteger+tmpnum.charAt(x-1);
	}


	finNum=tmpinteger+""+decimal;
   } else {
      finNum=integer+""+decimal;
   }

    if(isNeg == 1) {
       finNum = "-" + finNum;
    }

	return finNum;
}
function CalcDPA(form)
{
	var inc=form.intrate.value;
	var incom=form.income.value;
	var dbt=form.debt.value;
	var lan=form.landamt.value;
	var improve=form.improveamt.value;
	var cc=form.ccost.value;
	var debtratio=(dbt/incom)*100;
	var PITI=0;
	var qualifing=0;
	var hratio=0;
	var hdratio=0;
	if(debtratio<=12.5)
	{
	hratio=31;
	}
	else if(debtratio>12.5 && debtratio<=13.5)
	{
	hratio=30;
	}
	else if(debtratio>13.5 && debtratio<=14.5)
	{
	hratio=29;
	}
	else if(debtratio>14.5 && debtratio<=15.5)
	{
	hratio=28;
	}
	else if(debtratio>15.5 && debtratio<=16.5)
	{
	hratio=27;
	}

	else if(debtratio>16.5 && debtratio<=17.5)
	{
	hratio=26;
	}

	else if(debtratio>17.5 && debtratio<=18.5)
	{
	hratio=25;
	}

	else if(debtratio>18.5 && debtratio<=19.5)
	{
	hratio=24;
	}

	else if(debtratio>19.5 && debtratio<=20.5)
	{
	hratio=23;
	}
	else if(debtratio>20.5 && debtratio<=21.5)
	{
	hratio=22;
	}

	else if(debtratio>21.5 && debtratio<=22.5)
	{
	hratio=21;
	}
	else if(debtratio>22.5 && debtratio<=23.5)
	{
	hratio=20;
	}
	else if(debtratio>23.5 && debtratio<=24.5)
	{
	hratio=19;
	}

	else if(debtratio>24.5 && debtratio<=25.5)
	{
	hratio=18;
	}

	else if(debtratio>25.5 && debtratio<=26.5)
	{
	hratio=17;
	}
	else if(debtratio>26.5 && debtratio<=27.5)
	{
	hratio=16;
	}
	else if(debtratio>27.5 && debtratio<=28.5)
	{
	hratio=15;
	}
	else if(debtratio>28.5 && debtratio<=29.5)
	{
	hratio=14;
	}
	else if(debtratio>29.5 && debtratio<=30.5)
	{
	hratio=13;
	}
	else if(debtratio>30.5 && debtratio<=31.5)
	{
	hratio=12;
	}
	else if(debtratio>31.5 && debtratio<=32.5)
	{
	hratio=11;
	}
	else if(debtratio>32.5 && debtratio<=33.5)
	{
	hratio=10;
	}
	else if(debtratio>33.5 && debtratio<=34.5)
	{
	hratio=9;
	}
	else if(debtratio>34.5 && debtratio<=35.5)
	{
	hratio=8;
	}
	else if(debtratio>34.5 && debtratio<=36.5)
	{
	hratio=7;
	}
	else if(debtratio>36.5 && debtratio<=37.5)
	{
	hratio=6;
	}
	else if(debtratio>37.5 && debtratio<=38.5)
	{
	hratio=5;
	}
	else if(debtratio>38.5 && debtratio<=39.5)
	{
	hratio=4;
	}
	else if(debtratio>39.5 && debtratio<=40.5)
	{
	hratio=3;
	}
	else if(debtratio>40.5 && debtratio<=41.5)
	{
	hratio=2;
	}
	else if(debtratio>41.5 && debtratio<=42.5)
	{
	hratio=1;
	}
	else if(debtratio>43.5 && debtratio<=44.5)
	{
	hratio=0;
	}

	hdratio=eval(hratio)+eval(debtratio);
	if (hdratio>43) {
		temphratio=43-eval(debtratio);
		hdratio=43;
		hratio=Math.round(temphratio);
	} else {
		hdratio=Math.round(hdratio);
		temphratio=hratio;
	}
	PITI=(incom*temphratio)/100;
	qualifing=PITI*94.82769230;
	saleprice=qualifing*1.007899;
	downpayment=(saleprice*.0225);
	baseprice=saleprice-downpayment;
	orgfee=baseprice*.01;
	ufmif=(baseprice*.015);
	discpoint=(qualifing*.01);
	coachprice=eval(saleprice) - (eval(lan)+eval(improve));
	titlepolicy=eval(qualifing*.006)+225;
	MinInv=saleprice*.01;
	TransFee=saleprice*.01;
	prepaids=saleprice*.023;
	totalcash=eval(downpayment)+eval(prepaids)+eval(orgfee)+eval(discpoint)+eval(titlepolicy)+eval(cc);
	ccontribution=eval(totalcash)-eval(MinInv)-eval(TransFee);
	var StrOut = '';
	StrOut = StrOut + "<table width=100% cellspacing=0 cellpadding=3 border=0 align=center>";
	StrOut = StrOut + "<tr><td align=right><strong>Based On Stated Income/Debt</strong></td></tr>";
	StrOut = StrOut + "<tr><td><strong>Qualifying Amount: </strong>"+formatNumberDec(qualifing,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Housing Ratio: </strong>"+hratio+"%</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Housing and Debt Ratio: </strong>"+hdratio+"%</td></tr>";
	StrOut = StrOut + "<tr><td><strong>PITI: </strong>"+formatNumberDec(PITI,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td>% to Total can't exceed 12%: <strong><font color=#ff0000>perratio%</font></strong></td></tr>";

	StrOut = StrOut + "<tr><td align=right><strong>Sales Price Calculation</strong></td></tr>";
	StrOut = StrOut + "<tr><td><strong>Coach: </strong>"+formatNumberDec(coachprice,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><I>Base Coach Price: "+formatNumberDec(qualifing,2,1)+"</I></td></tr>";
	StrOut = StrOut + "<tr><td><strong>Sales Price: </strong>"+formatNumberDec(saleprice,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Base Loan: </strong>"+formatNumberDec(baseprice,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>UFMIP: </strong>"+formatNumberDec(ufmif,2,1)+"</td></tr>";

	StrOut = StrOut + "<tr><td align=right><strong>Seller Calculations</strong></td></tr>";
	StrOut = StrOut + "<tr><td><strong>Down Payment: </strong>"+formatNumberDec(downpayment,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Origination Fee: </strong>"+formatNumberDec(orgfee,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Discount point: </strong>"+formatNumberDec(discpoint,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Title Policy: </strong>"+formatNumberDec(titlepolicy,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Closing costs: </strong>"+formatNumberDec(cc,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td>&nbsp;</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Prepaids: </strong>"+formatNumberDec(prepaids,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Total Cash: </strong>"+formatNumberDec(totalcash,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><font color=#ff0000>Less 1% Min. Inv: "+formatNumberDec(MinInv,2,1)+"</font></td></tr>";
	StrOut = StrOut + "<tr><td><strong>Transaction Fee: </strong>"+formatNumberDec(TransFee,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Closing cost contribution: </strong>"+formatNumberDec(ccontribution,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Gift Donation For Borrowers Use: </strong>"+formatNumberDec(downpayment,2,1)+"</td></tr>";


	StrOut = StrOut + "<tr><td align=right><strong>Borrower Closing Cost Calculations</strong></td></tr>";
	StrOut = StrOut + "<tr><td><strong>Down Payment: </strong>"+formatNumberDec(downpayment,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Total Closing Costs: </strong>"+formatNumberDec(qualifing,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Prepaids: </strong>"+formatNumberDec(qualifing,2,1)+"%</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Sub Total: </strong>"+formatNumberDec(PITI,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Less Closing Cost Contribution: </strong>"+formatNumberDec(PITI,2,1)+"</td></tr>";
	StrOut = StrOut + "<tr><td><strong>Less Gift Funds: </strong>"+formatNumberDec(qualifing,2,1)+"%</td></tr>";
	StrOut = StrOut + "<tr><td><font color=#ff0000>Less 1% Min. Inv: "+formatNumberDec(qualifing,2,1)+"</font></td></tr>";
	StrOut = StrOut + "<tr><td><strong>Additional Cash from Borrower: </strong>"+formatNumberDec(qualifing,2,1)+"%</td></tr>";

	StrOut = StrOut + "</table>";

	document.getElementById("results").innerHTML=StrOut;
	document.getElementById("results").style.display='block';
}



</script>
<form name=MORTGAGE action='maxgrant.php'>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td colspan="2" bgcolor="#EEEEEE"><strong>Max Loan Calculation</strong></td>
    </tr>
  <tr>

    <td width="32%">Interest Rate</td>
    <td width="43%"><select name="intrate"><option value=" 0.025">2.500</option><option value=" 0.03">3.000</option><option value=" 0.035">3.500</option><option value=" 0.04">4.000</option><option value=" 0.045">4.500</option><option value=" 0.05">5.000</option><option value=" 0.05125">5.125</option><option value=" 0.0525">5.250</option><option value=" 0.05375">5.375</option><option value=" 0.055">5.500</option><option value=" 0.05625">5.625</option><option value=" 0.0575">5.750</option><option value=" 0.05875">5.875</option><option value=" 0.06">6.000</option><option value=" 0.06125">6.125</option><option value=" 0.0625">6.250</option><option value=" 0.06375">6.375</option><option value=" 0.065">6.500</option><option value=" 0.06625">6.625</option><option value=" 0.0675">6.750</option><option value=" 0.06875">6.875</option><option value=" 0.07">7.000</option><option value=" 0.07125">7.125</option><option value=" 0.0725">7.250</option><option value=" 0.07375">7.375</option><option value=" 0.075">7.500</option><option value=" 0.07625">7.625</option><option value=" 0.0775">7.750</option><option value=" 0.07875">7.875</option><option value=" 0.08">8.000</option><option value=" 0.08125">8.125</option><option value=" 0.0825">8.250</option><option value=" 0.08375">8.375</option><option selected="selected" value=" 0.085">8.500</option><option value=" 0.08625">8.625</option><option value=" 0.0875">8.750</option><option value=" 0.08875">8.875</option><option value=" 0.09">9.000</option><option value=" 0.09125">9.125</option><option value=" 0.0925">9.250</option><option value=" 0.09375">9.375</option><option value=" 0.095">9.500</option><option value=" 0.09625">9.625</option><option value=" 0.0975">9.750</option><option value=" 0.09875">9.875</option><option value=" 0.1">10.000</option><option value=" 0.10125">10.125</option><option value=" 0.1025">10.250</option><option value=" 0.10375">10.375</option><option value=" 0.105">10.500</option><option value=" 0.10625">10.625</option><option value=" 0.1075">10.750</option><option value=" 0.10875">10.875</option><option value=" 0.11">11.000</option><option value=" 0.11125">11.125</option><option value=" 0.1125">11.250</option><option value=" 0.11375">11.375</option><option value=" 0.115">11.500</option><option value=" 0.11625">11.625</option><option value=" 0.1175">11.750</option><option value=" 0.11875">11.875</option><option value=" 0.12">12.000</option></select>
      %</td>
  </tr>
  <tr>

    <td bgcolor="#EEEEEE">Stated Income</td>
    <td bgcolor="#EEEEEE"><input  name="income" id="income" value="4000" size='9' /></td>
  </tr>

  <tr>

    <td>Stated Debt</td>
    <td><input  name="debt" value="500" size='9' id="debt" /></td>
  </tr>

  <tr bgcolor="#EEEEEE">

    <td>Land</td>
    <td><input  name="landamt" value="20000" size='9' id="landamt" /></td>
  </tr>
  <tr>

    <td>Improvements</td>
    <td><input  name="improveamt" id="improveamt" value="10000" size='9' /></td>
  </tr>

  <tr bgcolor="#EEEEEE">

    <td colspan="2"><strong>Seller Calculation</strong></td>
    </tr>

  <tr>

    <td>Closing Cost</td>
    <td><input  name="ccost" id="ccost" value="1500" size='9' /></td>
  </tr>

  <tr>

    <td bgcolor="#EEEEEE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#EEEEEE"><input size='0' onclick='CalcDPA(this.form)' type=button value=' Calculate ' name=cmdCalc /></td>
  </tr>
  <tr>
    <td colspan="3"><div id="results" style="display:none;"></div></td>
    </tr>
</table>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>