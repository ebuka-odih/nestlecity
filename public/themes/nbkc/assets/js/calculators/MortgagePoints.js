KJE.MortgagePointsCalc=function(){this.bShort=false;this.totalpaid_cats=new Array(2);this.totalpaid_cats[0]=KJE.parameters.get("MSG_CAT_LBL1","With Points");this.totalpaid_cats[1]=KJE.parameters.get("MSG_CAT_LBL2","Without Points");this.TITLE_MESSAGE1=KJE.parameters.get("TITLE_MESSAGE1","Buying points can save you TOTAL_DIFF over YEARS_IN_HOME years.");this.TITLE_MESSAGE2=KJE.parameters.get("TITLE_MESSAGE2","Buying points may cost you TOTAL_DIFF over YEARS_IN_HOME years.");this.RESULTS_START1=KJE.parameters.get("RESULTS_START1","Buying points, in this case, can save you TOTAL_DIFF.");this.RESULTS_START2=KJE.parameters.get("RESULTS_START2","Buying points, in this case, may cost you TOTAL_DIFF.");this.RESULTS_MIDDLE1=KJE.parameters.get("RESULTS_MIDDLE1","This includes PAYMENT_DIFF less in monthly payments");this.RESULTS_MIDDLE2=KJE.parameters.get("RESULTS_MIDDLE2","This includes PAYMENT_DIFF more in monthly payments");this.RESULTS_END1=KJE.parameters.get("RESULTS_END1","and a EQUITY_DIFF higher remaining loan balance.");this.RESULTS_END2=KJE.parameters.get("RESULTS_END2","and a EQUITY_DIFF lower remaining loan balance.");this.sSchedule=new KJE.Repeating()};KJE.MortgagePointsCalc.prototype.clear=function(){this.INTEREST_RATE=0;this.TERM=0;this.LOAN_AMOUNT=0;this.DISCOUNT_POINTS_RATE=0;this.MARGINAL_TAX_RATE=0;this.YEARS_IN_HOME=0;this.DISCOUNT_POINTS_PERCENT=0;this.BY_YEAR=1};KJE.MortgagePointsCalc.prototype.calculate=function(R){var g=KJE;var f=this.INTEREST_RATE;var af=this.TERM;var t=this.LOAN_AMOUNT;var m=this.DISCOUNT_POINTS_RATE;var e=this.MARGINAL_TAX_RATE;var Q=this.YEARS_IN_HOME;var A=this.DISCOUNT_POINTS_PERCENT;var F=this.BY_YEAR;var s=0;var u=0;var ad=0;var T=0;var L=0;var ae=0;var Y=0;var B=0;var ag=0;var b=0;var o="";var J="";var I=0;var ab=0;var O=0;if(Q==0){Q=af}else{if(Q>af){Q=af}}var v=Q*12;var aa=f/1200;var y=m/1200;var D=0;if(e==0){D=0}else{D=e/100}var a=(A/100)*t;var z=a*D;var l=a-z;var H=g.round(KJE.PMT(m/1200,af*12,t),2);var k=t-l;var W=g.round(KJE.PMT(f/1200,af*12,k),2);var C=g.round(W,2)-g.round(H,2);var h=Math.round(Q)+1;var ac=0;this.DS_PRINCIPAL_BAL=KJE.FloatArray(h);this.DS_POINTS_PRINCIPAL_BAL=KJE.FloatArray(h);this.cats=KJE.FloatArray(h);var ah=t;var x=0;var j=0;var M=0;var d=0;var P=0;var N=H;var Z=k;var p=0;var w=0;var K=0;var V=0;var c=0;var E=W;var U=0;this.cats[U]="0";this.DS_POINTS_PRINCIPAL_BAL[U]=(t);this.DS_PRINCIPAL_BAL[U]=(k);U+=1;if(R){var G=this.sSchedule;G.clearRepeat();if(F!=1){this.addPointsTitle(G,G.sReportCol("<br><br>Nbr",1),G.sReportCol("<br><br>Payment",2),G.sReportCol("<br><br>Interest",3),G.sReportCol("Ending<br>Balance",4),G.sReportCol("<br><br>Payment",2),G.sReportCol("<br><br>Interest",3),G.sReportCol("<br>Ending<br>Balance",4))}else{this.addPointsTitle(G,G.sReportCol("<br><br>Yr",5),G.sReportCol("<br>Total<br>Payment",6),G.sReportCol("<br>Interest<br>Paid",7),G.sReportCol("<br>Ending<br>Balance",4),G.sReportCol("<br>Total<br>Payments",6),G.sReportCol("<br>Interest<br>Paid",7),G.sReportCol("<br>Ending<br>Balance",4))}if(this.bShort){G.addRepeat("&nbsp;","&nbsp;",g.dollars(Z),"&nbsp;",g.dollars(ah))}else{G.addRepeat("&nbsp;","&nbsp;","&nbsp;",g.dollars(Z),"&nbsp;","&nbsp;",g.dollars(ah))}}for(var X=1;X<=(af*12);X++){ac=X-1;N=H;E=W;if(Z==0){E=0;w=0;p=0}else{p=g.round((aa)*Z,2);w=E-p;Z-=w;if(ah<0||(af*12==X)){E=E+Z;Z=0;w=E}}if(ah==0){N=0;j=0;x=0}else{x=g.round((y)*ah,2);j=N-x;ah-=(j);if(ah<0||(af*12==X)){N=N+ah;ah=0;j=N}}M+=x;d+=j;P+=N;K+=p;V+=w;c+=E;if(X<=v){ad+=N;T+=x;ae+=E;Y+=p}if(X==v){u=t-ah;L=a+k-Z;I=ah;ab=Z;B=I-ab;ag=Y-T;O=ae-ad;b=O-B;J=(b>=0?this.RESULTS_START1:this.RESULTS_START2);J+=" "+(O>=0?this.RESULTS_MIDDLE1:this.RESULTS_MIDDLE2)+" ";J+=(B>=0?this.RESULTS_END1:this.RESULTS_END2);J=KJE.replace("TOTAL_DIFF",g.dollars(b*(b>=0?1:-1)),J);J=KJE.replace("PAYMENT_DIFF",g.dollars(O*(O>=0?1:-1)),J);J=KJE.replace("INTEREST_DIFF",g.dollars(O*(O>=0?1:-1)),J);J=KJE.replace("EQUITY_DIFF",g.dollars(B*(B>=0?1:-1)),J);o=(b>=0?this.TITLE_MESSAGE1:this.TITLE_MESSAGE2);o=KJE.replace("YEARS_IN_HOME",g.number(Q),o);o=KJE.replace("TOTAL_DIFF",g.dollars(b*(b>=0?1:-1)),o)}if(F!=1&&R){this.addPointRow(G,X,E,p,Z,N,x,ah)}if((X%12)==0){if(X<=v){this.cats[U]=""+U;this.DS_POINTS_PRINCIPAL_BAL[U]=(ah);this.DS_PRINCIPAL_BAL[U]=(Z);U+=1}if(F==1&&R){this.addPointRow(G,Math.floor(X/12),c,K,Z,P,M,ah)}K=0;V=0;c=0;M=0;d=0;P=0}}var S=2;this.DS_INTEREST=KJE.FloatArray(S);this.DS_PRINCIPAL=KJE.FloatArray(S);this.DS_INTEREST[0]=(T);this.DS_PRINCIPAL[0]=((ad-T));this.DS_INTEREST[1]=(Y);this.DS_PRINCIPAL[1]=((ae-Y));this.DISCOUNT_POINTS_AMT=a;this.POINTS_MONTHLY_PI=H;this.POINTS_INTEREST_SAVINGS=s;this.DISCOUNT_POINTS_DIFFERENCE=C;this.POINTS_TAX_REDUCTION=z;this.POINTS_COST_AFTERTAX=l;this.POINTS_HOME_EQUITY_AT_MOVEOUT=u;this.POINTS_TOTAL_OF_PAYMENTS=ad;this.POINTS_INTEREST_PAID=T;this.DOWNPAYMENT_HOME_EQUITY_AT_MOVEOUT=L;this.DOWNPAYMENT_TOTAL_OF_PAYMENTS=ae;this.DOWNPAYMENT_INTEREST_PAID=Y;this.EQUITY_DIFFERENCE=B;this.INTEREST_DIFFERENCE=ag;this.TOTAL_DIFFERENCE=b;this.DOWNPAYMENT_MONTHLY_PI=W;this.DOWNPAYMENT_LOAN_AMOUNT=k;this.TITLE_MESSAGE=o;this.RESULTS_MESSAGE=J;this.POINTS_BALANCE_AT_MOVEOUT=I;this.DOWNPAYMENT_BALANCE_AT_MOVEOUT=ab;this.PAYMENTS_DIFFERENCE=O};KJE.MortgagePointsCalc.prototype.formatReport=function(b){var c=KJE;var a=this.iDecimal;var d=b;d=KJE.replace("POINTS_TAX_REDUCTION",c.dollars(this.POINTS_TAX_REDUCTION,2),d);d=KJE.replace("POINTS_COST_AFTERTAX",c.dollars(this.POINTS_COST_AFTERTAX,2),d);d=KJE.replace("POINTS_HOME_EQUITY_AT_MOVEOUT",c.dollars(this.POINTS_HOME_EQUITY_AT_MOVEOUT,2),d);d=KJE.replace("POINTS_TOTAL_OF_PAYMENTS",c.dollars(this.POINTS_TOTAL_OF_PAYMENTS,2),d);d=KJE.replace("POINTS_INTEREST_PAID",c.dollars(this.POINTS_INTEREST_PAID,2),d);d=KJE.replace("DOWNPAYMENT_HOME_EQUITY_AT_MOVEOUT",c.dollars(this.DOWNPAYMENT_HOME_EQUITY_AT_MOVEOUT,2),d);d=KJE.replace("DOWNPAYMENT_TOTAL_OF_PAYMENTS",c.dollars(this.DOWNPAYMENT_TOTAL_OF_PAYMENTS,2),d);d=KJE.replace("DOWNPAYMENT_INTEREST_PAID",c.dollars(this.DOWNPAYMENT_INTEREST_PAID,2),d);d=KJE.replace("EQUITY_DIFFERENCE",c.dollars(this.EQUITY_DIFFERENCE,2),d);d=KJE.replace("INTEREST_DIFFERENCE",c.dollars(this.INTEREST_DIFFERENCE,2),d);d=KJE.replace("TOTAL_DIFFERENCE",c.dollars(this.TOTAL_DIFFERENCE,2),d);d=KJE.replace("PAYMENTS_DIFFERENCE",c.dollars(this.PAYMENTS_DIFFERENCE,2),d);d=KJE.replace("DOWNPAYMENT_MONTHLY_PI",c.dollars(this.DOWNPAYMENT_MONTHLY_PI,2),d);d=KJE.replace("DOWNPAYMENT_LOAN_AMOUNT",c.dollars(this.DOWNPAYMENT_LOAN_AMOUNT,2),d);d=KJE.replace("YEARS_IN_HOME",c.number(this.YEARS_IN_HOME),d);d=KJE.replace("TERM",c.number(this.TERM),d);d=KJE.replace("POINTS_MONTHLY_PI",c.dollars(this.POINTS_MONTHLY_PI,2),d);d=KJE.replace("DISCOUNT_POINTS_DIFFERENCE",c.dollars(this.DISCOUNT_POINTS_DIFFERENCE,2),d);d=KJE.replace("POINTS_INTEREST_SAVINGS",c.dollars(this.POINTS_INTEREST_SAVINGS,2),d);d=KJE.replace("MARGINAL_TAX_RATE",c.percent(this.MARGINAL_TAX_RATE/100,2),d);d=KJE.replace("LOAN_AMOUNT",c.dollars(this.LOAN_AMOUNT,2),d);d=KJE.replace("INTEREST_RATE",c.percent(this.INTEREST_RATE/100,3),d);d=KJE.replace("DISCOUNT_POINTS_PERCENT",c.number(this.DISCOUNT_POINTS_PERCENT,3),d);d=KJE.replace("DISCOUNT_POINTS_AMT",c.dollars(this.DISCOUNT_POINTS_AMT,2),d);d=KJE.replace("DISCOUNT_POINTS_RATE",c.percent(this.DISCOUNT_POINTS_RATE/100,3),d);d=KJE.replace("TITLE_MESSAGE",this.TITLE_MESSAGE,d);d=KJE.replace("RESULTS_MESSAGE",this.RESULTS_MESSAGE,d);d=KJE.replace("POINTS_BALANCE_AT_MOVEOUT",c.dollars(this.POINTS_BALANCE_AT_MOVEOUT,2),d);d=KJE.replace("DOWNPAYMENT_BALANCE_AT_MOVEOUT",c.dollars(this.DOWNPAYMENT_BALANCE_AT_MOVEOUT,2),d);d=d.replace("**REPEATING GROUP**",this.sSchedule.getRepeat());this.sSchedule.clearRepeat();return d};KJE.MortgagePointsCalc.prototype.addPointsTitle=function(e,f,d,c,b,a,h,g){if(this.bShort){e.addHeader("&nbsp;",{sCell:KJE._sHeadingUnderline,sContent:e.sReportCol("Without Points Payment Schedule",8),sFormat:"COLSPAN=2"},{sCell:KJE._sHeadingUnderline,sContent:e.sReportCol("With Points Payment Schedule",9),sFormat:"COLSPAN=2"});e.addHeader(f,d,b,a,g)}else{e.addHeader("&nbsp;",{sCell:KJE._sHeadingUnderline,sContent:e.sReportCol("Without Points Payment Schedule",8),sFormat:"COLSPAN=3"},{sCell:KJE._sHeadingUnderline,sContent:e.sReportCol("With Points Payment Schedule",9),sFormat:"COLSPAN=3"});e.addHeader(f,d,c,b,a,h,g)}};KJE.MortgagePointsCalc.prototype.addPointRow=function(d,h,a,b,g,f,e,c){if(this.bShort){d.addRepeat(KJE.number(h),KJE.dollars(a,2),KJE.dollars(g,2),KJE.dollars(f,2),KJE.dollars(c,2))}else{d.addRepeat(KJE.number(h),KJE.dollars(a,2),KJE.dollars(b,2),KJE.dollars(g,2),KJE.dollars(f,2),KJE.dollars(e,2),KJE.dollars(c,2))}};KJE.CalcName="Mortgage Points Calculator";KJE.CalcType="mortgagepoints";KJE.CalculatorTitleTemplate="KJE1";KJE.parseInputs=function(a){a=KJE.replace("**TERM**",KJE.getMortgageTermDrop("TERM",30),a);return a};KJE.initialize=function(){KJE.CalcControl=new KJE.MortgagePointsCalc();KJE.GuiControl=new KJE.MortgagePoints(KJE.CalcControl)};KJE.MortgagePoints=function(n){var g=KJE;var c=KJE.gLegend;var h=KJE.inputs.items;this.MSG_GRAPH1=KJE.parameters.get("MSG_GRAPH1","Principal");this.MSG_GRAPH2=KJE.parameters.get("MSG_GRAPH2","Interest");this.MSG_GRAPH3=KJE.parameters.get("MSG_GRAPH3","Payment Number");this.MSG_GRAPH4=KJE.parameters.get("MSG_GRAPH4","Principal Balance by Year");this.MSG_GRAPH5=KJE.parameters.get("MSG_GRAPH5","Year Number");KJE.MortgageRateSlider("INTEREST_RATE","Interest rate");KJE.MortgageAmtSlider("LOAN_AMOUNT","Mortgage amount");KJE.NumberSlider("DISCOUNT_POINTS_PERCENT","Discount points",-25,25,3);KJE.PercentSlider("DISCOUNT_POINTS_RATE","Points rate",0,25,3);KJE.NumberSlider("YEARS_IN_HOME","Years in home",1,30,0);KJE.MortgageTermDropBoxSlider("TERM","Term in years");KJE.Label("DOWNPAYMENT_LOAN_AMOUNT","Loan amount");KJE.Radioboxes("BY_YEAR","Report amortization",true,"Annually","Monthly");var i=KJE.gNewGraph(KJE.gSTACKED,"GRAPH1",true,false,KJE.colorList[1],KJE.parameters.get("MSG_GRAPH_TITLE1","Totals after KJE1 years in your home."));i._legend.setVisible(true);i._legend._iOrientation=(c.TOP_RIGHT);var j=KJE.gNewGraph(KJE.gLINE,"GRAPH2",true,true,KJE.colorList[1],this.MSG_GRAPH4);j._titleXAxis.setText(this.MSG_GRAPH5);j._legend._iOrientation=(c.TOP_RIGHT);j._axisY._bAutoMinimum=true;j._axisY._bAutoMaximum=true;j._axisY._axisMinimum=0;var b=KJE.parameters.get("MSG_DROPPER_TITLE","Mortgage with points:");var e=KJE.parameters.get("MSG_DROPPER_CLOSETITLE","Monthly payment KJE1");var f=function(){return b+"|"+KJE.subText(KJE.getKJEReplaced(e,g.dollars(n.POINTS_MONTHLY_PI)),"KJERightBold")};KJE.addDropper(new KJE.Dropper("INPUTS",true,f,f),KJE.colorList[0]);var o=KJE.parameters.get("MSG_DROPPER2_TITLE","Mortgage without points:");var m=function(){return o+"|"+KJE.subText(KJE.getKJEReplaced(e,g.dollars(n.DOWNPAYMENT_MONTHLY_PI)),"KJERightBold")};KJE.addDropper(new KJE.Dropper("INPUTS2",true,m,m),KJE.colorList[0]);var a=KJE.parameters.get("MSG_DROPPER3_TITLE","Mortgage Points Calculator Inputs");var d=KJE.parameters.get("MSG_DROPPER3_CLOSETITLE","Calculate totals for KJE1 years in home, show amortization by KJE2");var k=function(){return a+KJE.subText(KJE.getKJEReplaced(d,h.YEARS_IN_HOME.getFormatted(),n.BY_YEAR?KJE.MSG_YEAR_LBL:KJE.MSG_MONTH_LBL),"KJECenter")};KJE.addDropper(new KJE.Dropper("INPUTS3",false,a,k),KJE.colorList[0])};KJE.MortgagePoints.prototype.setValues=function(b){var a=KJE.inputs.items;b.INTEREST_RATE=a.INTEREST_RATE.getValue();b.TERM=a.TERM.getValue();b.LOAN_AMOUNT=a.LOAN_AMOUNT.getValue();b.DISCOUNT_POINTS_RATE=a.DISCOUNT_POINTS_RATE.getValue();b.DISCOUNT_POINTS_PERCENT=a.DISCOUNT_POINTS_PERCENT.getValue();b.YEARS_IN_HOME=a.YEARS_IN_HOME.getValue();b.BY_YEAR=a.BY_YEAR.getValue()};KJE.MortgagePoints.prototype.refresh=function(e){var d=KJE;var b=KJE.inputs.items;var a=KJE.gGraphs[0];var c=KJE.gGraphs[1];KJE.setTitleTemplate(e.TITLE_MESSAGE);a.removeAll();a.setGraphCategories(e.totalpaid_cats);a.add(new KJE.gGraphDataSeries(e.DS_PRINCIPAL,this.MSG_GRAPH1,a.getColor(1),null));a.add(new KJE.gGraphDataSeries(e.DS_INTEREST,this.MSG_GRAPH2,a.getColor(2),null));a.setTitleTemplate(d.number(e.YEARS_IN_HOME));a.paint();c.removeAll();c.setGraphCategories(e.cats);c.add(new KJE.gGraphDataSeries(e.DS_POINTS_PRINCIPAL_BAL,e.totalpaid_cats[0],c.getColor(1),null,e.totalpaid_cats[0]+" "+this.MSG_GRAPH5));c.add(new KJE.gGraphDataSeries(e.DS_PRINCIPAL_BAL,e.totalpaid_cats[1],c.getColor(2),null,e.totalpaid_cats[1]+" "+this.MSG_GRAPH5));c.paint();b.DOWNPAYMENT_LOAN_AMOUNT.setText(d.dollars(e.DOWNPAYMENT_LOAN_AMOUNT))};KJE.InputScreenText=" <div id=KJE-D-INPUTS><div id=KJE-P-INPUTS>INPUTS</div></div> <div id=KJE-E-INPUTS> <div id=\"KJE-C-LOAN_AMOUNT\"><input id=\"KJE-LOAN_AMOUNT\" /></div> <div id=\"KJE-C-TERM\">**TERM**</div> <div id='KJE-C-DISCOUNT_POINTS_PERCENT'><input id='KJE-DISCOUNT_POINTS_PERCENT' /></div> <div id='KJE-C-DISCOUNT_POINTS_RATE'><input id='KJE-DISCOUNT_POINTS_RATE' /></div> <div id='KJE-C-POINTS_MONTHLY_PI'><div id='KJE-POINTS_MONTHLY_PI'></div></div> <div style=\"height:10px\"></div> </div> <div id=KJE-D-INPUTS2><div id=KJE-P-INPUTS2>INPUTS</div></div> <div id=KJE-E-INPUTS2 > <div id='KJE-C-DOWNPAYMENT_LOAN_AMOUNT'><div id='KJE-DOWNPAYMENT_LOAN_AMOUNT'></div></div> <div id=\"KJE-C-INTEREST_RATE\"><input id=\"KJE-INTEREST_RATE\" /></div> <div id='KJE-C-DOWNPAYMENT_MONTHLY_PI'><div id='KJE-DOWNPAYMENT_MONTHLY_PI'></div></div> <div style=\"height:10px\"></div> </div> <div id=KJE-D-INPUTS3><div id=KJE-P-INPUTS3>INPUTS</div></div> <div id=KJE-E-INPUTS3 > <div id='KJE-C-YEARS_IN_HOME'><input id='KJE-YEARS_IN_HOME' /></div> <div id=\"KJE-C-BY_YEAR\"><fieldset id='KJE-FS-BY_YEAR'><input id=\"KJE-BY_YEAR1\" type=radio name=BY_YEAR /><input id=\"KJE-BY_YEAR2\" type=radio name=BY_YEAR /></fieldset></div> <div style=\"height:10px\"></div> </div> **GRAPH1** **GRAPH2** ";KJE.DefinitionText=" <div id='KJE-D-TERM' ><dt>Term</dt><dd>Number of years for this mortgage. Most common terms are 15 years and 30 years.</dd></div> <div id='KJE-D-LOAN_AMOUNT' ><dt>Mortgage amount</dt><dd>Total balance for your mortgage. This calculation assumes that the cost of buying points is financed. The loan amount with points will be higher than the loan without points by the cost of the purchased points.</dd></div> <div id='KJE-D-INTEREST_RATE' ><dt>Interest rate</dt><dd>Annual interest rate for this mortgage without purchasing any discount points.</dd></div> <div id='KJE-D-YEARS_IN_HOME' ><dt>Years in home</dt><dd>The number of years you expect to live in this home or the number of years before you refinance your mortgage.</dd></div> <div id='KJE-D-MONTHLY_PI' ><dt>Principal and interest</dt><dd>Monthly principal and interest (PI) for this mortgage.</dd></div> <div id='KJE-D-DISCOUNT_POINTS_RATE' ><dt>Points rate</dt><dd>Annual interest rate for this mortgage with discount points.</dd></div> <div id='KJE-D-DISCOUNT_POINTS_PERCENT' ><dt>Points</dt><dd>The number of discount points you need to receive the lower rate. Each point costs 1% of your mortgage amount.</dd></div> ";KJE.ReportText=' <!--HEADING "Mortgage Points Calculator Results" HEADING--> <h2 class=\'KJEReportHeader KJEFontHeading\'>TITLE_MESSAGE</h2> RESULTS_MESSAGE This assumes that you stay in your home for YEARS_IN_HOME years without refinancing your mortgage. **GRAPH** <p> <div class=KJEReportTableDiv><table class=KJEReportTable><caption class=\'KJEHeaderRow KJEHeading\'>Loan with Points Summary</caption> <tbody class=\'KJEReportTBody\'> <tr class=KJEOddRow><th class="KJELabel KJECellBorder KJECell60" scope=\'row\'>Term</th><td class="KJECell KJECell40">TERM</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Loan amount*</th><td class="KJECell">LOAN_AMOUNT</td></tr> <tr class=KJEOddRow><th class="KJELabel KJECellBorder" scope=\'row\'>Monthly payment</th><td class="KJECell">POINTS_MONTHLY_PI</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Interest rate</th><td class="KJECell">DISCOUNT_POINTS_RATE</td></tr> <tr class=KJEOddRow><th class="KJELabel KJECellBorder" scope=\'row\'>Discount points</th><td class="KJECell">DISCOUNT_POINTS_PERCENT</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Discount points cost</th><td class="KJECell">DISCOUNT_POINTS_AMT</td></tr> <tr class=KJEOddRow><th class="KJELabel KJECellBorder" scope=\'row\'>Total payments (principal & interest)</th><td class="KJECell">POINTS_TOTAL_OF_PAYMENTS after YEARS_IN_HOME years</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Loan balance at move out</th><td class="KJECell">POINTS_BALANCE_AT_MOVEOUT after YEARS_IN_HOME years</td></tr> </tbody> </table> </div> <div class=KJEReportTableDiv><table class=KJEReportTable><caption class=\'KJEHeaderRow KJEHeading\'>Loan without Points Summary</caption> <tbody class=\'KJEReportTBody\'> <tr class=KJEOddRow><th class="KJELabel KJECellBorder KJECell60" scope=\'row\'>Term</th><td class="KJECell KJECell40">TERM</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Loan amount*</th><td class="KJECell">DOWNPAYMENT_LOAN_AMOUNT</td></tr> <tr class=KJEOddRow><th class="KJELabel KJECellBorder" scope=\'row\'>Monthly payment</th><td class="KJECell">DOWNPAYMENT_MONTHLY_PI</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Interest rate</th><td class="KJECell">INTEREST_RATE</td></tr> <tr class=KJEOddRow><th class="KJELabel KJECellBorder" scope=\'row\'>Total payments (principal & interest)</th><td class="KJECell">DOWNPAYMENT_TOTAL_OF_PAYMENTS after YEARS_IN_HOME years</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Loan balance at move out</th><td class="KJECell">DOWNPAYMENT_BALANCE_AT_MOVEOUT after YEARS_IN_HOME years</td></tr> </tbody> </table> </div> <div class="KJEInset"> *This calculation assumes that the cost of buying points is financed. The loan amount with points will be higher than the loan without points by the cost of the purchased points.</div> **GRAPH** <h2 class=\'KJEScheduleHeader KJEFontHeading\'>Payment Schedule</h2> **REPEATING GROUP** ';