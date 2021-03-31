<script>
var cur_i=-1;var cur_ii=-1;
var arm=0;
var cell= new Array(8);
var cell_av= new Array(8);
for(var i=0;i<8;i++)
	{
	cell[i]=new Array(8);
	cell_av[i]=new Array(8);
	for(var ii=0;ii<8;ii++){cell[i][ii]=0;cell_av[i][ii]=0;}
	}

cell[0][0]=1;cell[0][7]=1;//белая ладья
cell[0][1]=2;cell[0][6]=2;//белый конь
cell[0][2]=3;cell[0][5]=3;//белый слон
cell[0][3]=4;//белый ферзь
cell[0][4]=5;//белый король
for(var ii=0;ii<8;ii++)cell[1][ii]=11;//белые пешки

cell[7][0]=101;cell[7][7]=101;//чёрная ладья
cell[7][1]=102;cell[7][6]=102;//чёрный конь
cell[7][2]=103;cell[7][5]=103;//чёрный слон
cell[7][3]=104;//чёрный ферзь
cell[7][4]=105;//чёрный король
for(var ii=0;ii<8;ii++)cell[6][ii]=111;//чёрные пешки

</script>

<p style="position:absolute; top:9%; left:37.5%">

<h1 id="ch_res" style="position:absolute; top:9%; left:37.5%"></h1>
<p>
<h3 style="position:absolute;top:10%; left:50%; color:#6A5ACD;"> Ваш цвет фигур:</h3>
<select id=ch_col style="position:absolute;top:12.4%; left:57.7%">
    <option value="100">Белые</option>
    <option selected value="0">Чёрные</option>
   </select>
<h3 style="position:absolute;top:10%; left:37%; color:#8B0000;"> Играть с компьютером  <input   type=checkbox id=ch_ai> </h3>
</p>
<button id=cancel_m style="position:absolute;top:80%; left:54.5%"
onclick="
		if(arm!=0)
			{
			 cell[cur_i][cur_ii]=arm;
			 arm=0;
			for(var i=0;i<8;i++)
			  for(var ii=0;ii<8;ii++)
				{cell_av[i][ii]=0;
				var i_r=i-0+1;var i_c=ii-0+1;
				if(cell[i][ii]==0)
					document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='';
					else document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/cp'+cell[i][ii]+'.png height=45>';
				}
			cur_i=-1;cur_ii=-1;	
			}
		"

>Вернуть фигуру</button> 

<button id=btn_next_move style="position:absolute;top:80%; left:38.5%"
onclick="var i_move=0;var eat_king = -1;var mm=new Array();
		for(var i=0;i<8;i++)
			for(var ii=0;ii<8;ii++)
				if((cell[i][ii]-0>document.getElementById('ch_col').value-0)
					&&(cell[i][ii]-0<document.getElementById('ch_col').value-0+100))
					{
					 var i_r=i+1;var ii_c=ii+1;
								 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+ii_c-1)+i_r).onclick();
					 for(var i1=0;i1<8;i1++)
						for(var ii1=0;ii1<8;ii1++)
							if(cell_av[i1][ii1]==1)
								{var i_r1=i1+1;var ii_c1=ii1+1;
								 
								mm[i_move]=new Array(4);
								 mm[i_move][0]=i;
								 mm[i_move][1]=ii;
								 mm[i_move][2]=i1;
								 mm[i_move][3]=ii1;
								 
								if(cell[i1][ii1]==105)
								 eat_king = i_move;
							    if(cell[i1][ii1]==5)
								 eat_king = i_move;
								if(cell[i1][ii1]==104)
								 eat_king = i_move;
								if(cell[i1][ii1]==4)
								 eat_king = i_move;
								if(cell[i1][ii1]==103)
								 eat_king = i_move;
								if(cell[i1][ii1]==3)
								 eat_king = i_move;
								if(cell[i1][ii1]==102)
								 eat_king = i_move;
								if(cell[i1][ii1]==2)
								 eat_king = i_move;
								if(cell[i1][ii1]==101)
								 eat_king = i_move;
								if(cell[i1][ii1]==1)
								 eat_king = i_move;
								if(cell[i1][ii1]==111)
								 eat_king = i_move;
								if(cell[i1][ii1]==11)
								 eat_king = i_move;
								
							 i_move++;
								}
					 document.getElementById('cancel_m').onclick();
			}
//ИИ
if (eat_king == -1)
	var i_m=Math.floor(Math.random()*i_move);
else

	var i_m = eat_king
//конец ИИ
var i_r=mm[i_m][0]+1;var i_c=mm[i_m][1]+1;
document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).onclick();
var i_r=mm[i_m][2]+1;var i_c=mm[i_m][3]+1;
document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).onclick();

"
>
Ход компьютера
</button>
<input id=c_from style="width:50;"><input id=c_to style="width:50;">
<h3  style="color:blue;position:absolute;right: 6;bottom: 2;">Разработал<br>
<a href="../Miklyaev4/individ_ed.php?id=20&amp;fam=Емельянов&amp;name=Сергей&amp;s_name=Валерьевич&amp;group=IT_7_2020&amp;adr_s=Emelyanov/tablici.php&amp;btn_s=Добавить" style="color:yellow;">Сергей Валерьевич</a></h3>
<img src="closeup-shot-of-chess-figurines-on-a-chessboard-with-a-blurred-white-background_181624-2777.jpg" style="position:absolute;right: 0;width:100%;top: 0;height: 100%;z-index: -1;">
<h1 id=head_chess style="color:black;position: absolute;left: 45.5%;top: 2;">Шахматы</h1>

<?php
echo "<table style=\"position: absolute;left: 35%;top: 18%;\">";
for($i=0;$i<10;$i++)//строка
	{
	echo "<tr>";
	for($ii=0;$ii<10;$ii++)//столбик
		{
		echo "<td id=td_".chr(ord("a")-1+$ii).$i;
		if(($ii!=0)&&($ii!=9)&&($i!=0)&&($i!=9))
			{
			echo " onclick=\"
							if(arm==0)
								{//берём фигуру в руку
								 if(cell[".($i-1)."][".($ii-1)."]!=0)
								 {cur_i=".($i-1).";cur_ii=".($ii-1).";
								 arm=cell[".($i-1)."][".($ii-1)."];
								 cell[".($i-1)."][".($ii-1)."]=0;
								 this.innerHTML='<img id=cp_arm src=chess_img/cp'+arm+'.png height=45>';
								 document.getElementById('cp_arm').style.opacity=0.3;
								 if(arm==11)//белая пешка
									 {
									  if(cell[".($i)."][".($ii-1)."]==0) 	 
										  {
										  cell_av[".($i)."][".($ii-1)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii).($i+1)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  
										  if((".$i."==2)&&(cell[".($i+1)."][".($ii-1)."]==0))	 
											  {
											  cell_av[".($i+1)."][".($ii-1)."]=1;
											  document.getElementById('td_".chr(ord("a")-1+$ii).($i+2)."').innerHTML='<img src=chess_img/dot.png height=15> ';
											  
											  
											  }
										  }
									  if(cell[".($i)."][".($ii)."]>100) 	 
										  {
										  cell_av[".($i)."][".($ii)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+1).($i+1)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
									  if(cell[".($i)."][".($ii-2)."]>100) 	 
										  {
										  cell_av[".($i)."][".($ii-2)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-1).($i+1)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
									 }
								if((arm==1)||(arm==4)||(arm==5))//белая ладья или ферзь или король
									{//вниз
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."+i_l<8)&&(cell[".($i-1)."+i_l][".($ii-1)."]>100))
											{cell_av[".($i-1)."+i_l][".($ii-1)."]=1;
											 var i_r=".($i)."-0+i_l;
											 document.getElementById('td_".chr(ord("a")-1+$ii)."'+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."+i_l>7)||(cell[".($i-1)."+i_l][".($ii-1)."]!=0))
											  break;
										  cell_av[".($i-1)."+i_l][".($ii-1)."]=1;
										  var i_r=".($i)."-0+i_l;
										  document.getElementById('td_".chr(ord("a")-1+$ii)."'+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==5)break;
										 }
									//вверх
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."-i_l>=0)&&(cell[".($i-1)."-i_l][".($ii-1)."]>100))
											{cell_av[".($i-1)."-i_l][".($ii-1)."]=1;
											 var i_r=".($i)."-0-i_l;
											 document.getElementById('td_".chr(ord("a")-1+$ii)."'+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."-i_l<0)||(cell[".($i-1)."-i_l][".($ii-1)."]!=0))
											  break;
										  cell_av[".($i-1)."-i_l][".($ii-1)."]=1;
										  var i_r=".($i)."-0-i_l;
										  document.getElementById('td_".chr(ord("a")-1+$ii)."'+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==5)break;
										 }
									//вперёд
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($ii-1)."+i_l<8)&&(cell[".($i-1)."][".($ii-1)."+i_l]>100))
											{cell_av[".($i-1)."][".($ii-1)."+i_l]=1;
											 var i_c=".($ii)."-0+i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+'".$i."').innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($ii-1)."+i_l>7)||(cell[".($i-1)."][".($ii-1)."+i_l]!=0))
											  break;
										  cell_av[".($i-1)."][".($ii-1)."+i_l]=1;
										  var i_c=".($ii)."-0+i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+'".$i."').innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==5)break;
										 }
									//назад
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($ii-1)."-i_l>=0)&&(cell[".($i-1)."][".($ii-1)."-i_l]>100))
											{cell_av[".($i-1)."][".($ii-1)."-i_l]=1;
											 var i_c=".($ii)."-0-i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+'".$i."').innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($ii-1)."-i_l<0)||(cell[".($i-1)."][".($ii-1)."-i_l]!=0))
											  break;
										  cell_av[".($i-1)."][".($ii-1)."-i_l]=1;
										  var i_c=".($ii)."-0-i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+'".$i."').innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==5)break;
										 }
									}
								if((arm==101)||(arm==104)||(arm==105))//чёрная ладья или ферзь или король
									{//вниз
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."+i_l<8)&&(cell[".($i-1)."+i_l][".($ii-1)."]>0)&&(cell[".($i-1)."+i_l][".($ii-1)."]<100))
											{cell_av[".($i-1)."+i_l][".($ii-1)."]=1;
											 var i_r=".($i)."-0+i_l;
											 document.getElementById('td_".chr(ord("a")-1+$ii)."'+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."+i_l>7)||(cell[".($i-1)."+i_l][".($ii-1)."]!=0))
											  break;
										  cell_av[".($i-1)."+i_l][".($ii-1)."]=1;
										  var i_r=".($i)."-0+i_l;
										  document.getElementById('td_".chr(ord("a")-1+$ii)."'+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==105)break;
										 }
									//вверх
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."-i_l>=0)&&(cell[".($i-1)."-i_l][".($ii-1)."]>0)&&(cell[".($i-1)."-i_l][".($ii-1)."]<100))
											{cell_av[".($i-1)."-i_l][".($ii-1)."]=1;
											 var i_r=".($i)."-0-i_l;
											 document.getElementById('td_".chr(ord("a")-1+$ii)."'+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."-i_l<0)||(cell[".($i-1)."-i_l][".($ii-1)."]!=0))
											  break;
										  cell_av[".($i-1)."-i_l][".($ii-1)."]=1;
										  var i_r=".($i)."-0-i_l;
										  document.getElementById('td_".chr(ord("a")-1+$ii)."'+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==105)break;
										 }
									//вперёд
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($ii-1)."+i_l<8)&&(cell[".($i-1)."][".($ii-1)."+i_l]>0)&&(cell[".($i-1)."][".($ii-1)."+i_l]<100))
											{cell_av[".($i-1)."][".($ii-1)."+i_l]=1;
											 var i_c=".($ii)."-0+i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+'".$i."').innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($ii-1)."+i_l>7)||(cell[".($i-1)."][".($ii-1)."+i_l]!=0))
											  break;
										  cell_av[".($i-1)."][".($ii-1)."+i_l]=1;
										  var i_c=".($ii)."-0+i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+'".$i."').innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==105)break;
										 }
									//назад
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($ii-1)."-i_l>=0)&&(cell[".($i-1)."][".($ii-1)."-i_l]>0)&&(cell[".($i-1)."][".($ii-1)."-i_l]<100))
											{cell_av[".($i-1)."][".($ii-1)."-i_l]=1;
											 var i_c=".($ii)."-0-i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+'".$i."').innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($ii-1)."-i_l<0)||(cell[".($i-1)."][".($ii-1)."-i_l]!=0))
											  break;
										  cell_av[".($i-1)."][".($ii-1)."-i_l]=1;
										  var i_c=".($ii)."-0-i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+'".$i."').innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==105)break;
										 }
									}
								if((arm==3)||(arm==4)||(arm==5))//белый слон или ферзь или король
									{//вниз и вперёд
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."+i_l<8)&&(".($ii-1)."+i_l<8)&&(cell[".($i-1)."+i_l][".($ii-1)."+i_l]>100))
											{cell_av[".($i-1)."+i_l][".($ii-1)."+i_l]=1;
											 var i_r=".($i)."-0+i_l;var i_c=".($ii)."-0+i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."+i_l>7)||(".($ii-1)."+i_l>7)||(cell[".($i-1)."+i_l][".($ii-1)."+i_l]!=0))
											  break;
										  cell_av[".($i-1)."+i_l][".($ii-1)."+i_l]=1;
										  var i_r=".($i)."-0+i_l;var i_c=".($ii)."-0+i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==5)break;
										 }
									//вверх и назад
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."-i_l>=0)&&(".($ii-1)."-i_l>=0)&&(cell[".($i-1)."-i_l][".($ii-1)."-i_l]>100))
											{cell_av[".($i-1)."-i_l][".($ii-1)."-i_l]=1;
											 var i_r=".($i)."-0-i_l;var i_c=".($ii)."-0-i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."-i_l<0)||(".($ii-1)."-i_l<0)||(cell[".($i-1)."-i_l][".($ii-1)."-i_l]!=0))
											  break;
										  cell_av[".($i-1)."-i_l][".($ii-1)."-i_l]=1;
										  var i_r=".($i)."-0-i_l;var i_c=".($ii)."-0-i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==5)break;
										 }
									//вперёд и вверх
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."-i_l>=0)&&(".($ii-1)."+i_l<8)&&(cell[".($i-1)."-i_l][".($ii-1)."+i_l]>100))
											{cell_av[".($i-1)."-i_l][".($ii-1)."+i_l]=1;
											 var i_r=".($i)."-0-i_l;var i_c=".($ii)."-0+i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."-i_l<0)||(".($ii-1)."+i_l>7)||(cell[".($i-1)."-i_l][".($ii-1)."+i_l]!=0))
											  break;
										  cell_av[".($i-1)."-i_l][".($ii-1)."+i_l]=1;
										  var i_r=".($i)."-0-i_l;var i_c=".($ii)."-0+i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==5)break;
										 }
									//назад и вниз
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."+i_l<8)&&(".($ii-1)."-i_l>=0)&&(cell[".($i-1)."+i_l][".($ii-1)."-i_l]>100))
											{cell_av[".($i-1)."+i_l][".($ii-1)."-i_l]=1;
											 var i_r=".($i)."-0+i_l;var i_c=".($ii)."-0-i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."+i_l>7)||(".($ii-1)."-i_l<0)||(cell[".($i-1)."+i_l][".($ii-1)."-i_l]!=0))
											  break;
										  cell_av[".($i-1)."+i_l][".($ii-1)."-i_l]=1;
										  var i_r=".($i)."-0+i_l;var i_c=".($ii)."-0-i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==5)break;
										 }
									}
								if((arm==103)||(arm==104)||(arm==105))//чёрный слон или ферзь или король
									{//вниз и вперёд
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."+i_l<8)&&(".($ii-1)."+i_l<8)&&(cell[".($i-1)."+i_l][".($ii-1)."+i_l]>0)&&(cell[".($i-1)."+i_l][".($ii-1)."+i_l]<100))
											{cell_av[".($i-1)."+i_l][".($ii-1)."+i_l]=1;
											 var i_r=".($i)."-0+i_l;var i_c=".($ii)."-0+i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."+i_l>7)||(".($ii-1)."+i_l>7)||(cell[".($i-1)."+i_l][".($ii-1)."+i_l]!=0))
											  break;
										  cell_av[".($i-1)."+i_l][".($ii-1)."+i_l]=1;
										  var i_r=".($i)."-0+i_l;var i_c=".($ii)."-0+i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==105)break;
										 }
									//вверх и назад
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."-i_l>=0)&&(".($ii-1)."-i_l>=0)&&(cell[".($i-1)."-i_l][".($ii-1)."-i_l]>0)&&(cell[".($i-1)."-i_l][".($ii-1)."-i_l]<100))
											{cell_av[".($i-1)."-i_l][".($ii-1)."-i_l]=1;
											 var i_r=".($i)."-0-i_l;var i_c=".($ii)."-0-i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."-i_l<0)||(".($ii-1)."-i_l<0)||(cell[".($i-1)."-i_l][".($ii-1)."-i_l]!=0))
											  break;
										  cell_av[".($i-1)."-i_l][".($ii-1)."-i_l]=1;
										  var i_r=".($i)."-0-i_l;var i_c=".($ii)."-0-i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==105)break;
										 }
									//вперёд и вверх
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."-i_l>=0)&&(".($ii-1)."+i_l<8)&&(cell[".($i-1)."-i_l][".($ii-1)."+i_l]>0)&&(cell[".($i-1)."-i_l][".($ii-1)."+i_l]<100))
											{cell_av[".($i-1)."-i_l][".($ii-1)."+i_l]=1;
											 var i_r=".($i)."-0-i_l;var i_c=".($ii)."-0+i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."-i_l<0)||(".($ii-1)."+i_l>7)||(cell[".($i-1)."-i_l][".($ii-1)."+i_l]!=0))
											  break;
										  cell_av[".($i-1)."-i_l][".($ii-1)."+i_l]=1;
										  var i_r=".($i)."-0-i_l;var i_c=".($ii)."-0+i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==105)break;
										 }
									//назад и вниз
									 for(var i_l=1;i_l<8;i_l++)
										 {
										  if((".($i-1)."+i_l<8)&&(".($ii-1)."-i_l>=0)&&(cell[".($i-1)."+i_l][".($ii-1)."-i_l]>0)&&(cell[".($i-1)."+i_l][".($ii-1)."-i_l]<100))
											{cell_av[".($i-1)."+i_l][".($ii-1)."-i_l]=1;
											 var i_r=".($i)."-0+i_l;var i_c=".($ii)."-0-i_l;
											 document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML+='<img src=chess_img/dot.png height=15> ';
											}
										  if((".($i-1)."+i_l>7)||(".($ii-1)."-i_l<0)||(cell[".($i-1)."+i_l][".($ii-1)."-i_l]!=0))
											  break;
										  cell_av[".($i-1)."+i_l][".($ii-1)."-i_l]=1;
										  var i_r=".($i)."-0+i_l;var i_c=".($ii)."-0-i_l;
										  document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/dot.png height=15> ';
										 if(arm==105)break;
										 }
									}
								if((arm==2)||(arm==102))//конь
									 {
										if((".($i+1)."<8)&&(".($ii)."<8)&&(cell[".($i+1)."][".($ii)."]==0))
										  {//2 точка
										  cell_av[".($i+1)."][".($ii)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+1)."'+'".($i+2)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i+1)."<8)&&(".($ii)."<8)&&(cell[".($i+1)."][".($ii)."]*(cell[".($i+1)."][".($ii)."]-100)*(arm-100)<0)) 	 
										  {
										  cell_av[".($i+1)."][".($ii)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+1)."'+'".($i+2)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i)."<8)&&(".($ii+1)."<8)&&(cell[".($i)."][".($ii+1)."]==0)) 	 
										  {
										  cell_av[".($i)."][".($ii+1)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+2)."'+'".($i+1)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i)."<8)&&(".($ii+1)."<8)&&(cell[".($i)."][".($ii+1)."]*(cell[".($i)."][".($ii+1)."]-100)*(arm-100)<0))	 
										  {
										  cell_av[".($i)."][".($ii+1)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+2)."'+'".($i+1)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i)."<8)&&(".($ii-3).">=0)&&(cell[".($i)."][".($ii-3)."]==0)) 	 
										  {
										  cell_av[".($i)."][".($ii-3)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-2)."'+'".($i+1)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i)."<8)&&(".($ii-3).">=0)&&(cell[".($i)."][".($ii-3)."]*(cell[".($i)."][".($ii-3)."]-100)*(arm-100)<0)) 	 
										  {
										  cell_av[".($i)."][".($ii-3)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-2)."'+'".($i+1)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i+1)."<8)&&(".($ii-2).">=0)&&(cell[".($i+1)."][".($ii-2)."]==0)) 	 
										  {
										  cell_av[".($i+1)."][".($ii-2)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-1)."'+'".($i+2)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i+1)."<8)&&(".($ii-2).">=0)&&(cell[".($i+1)."][".($ii-2)."]*(cell[".($i+1)."][".($ii-2)."]-100)*(arm-100)<0))	 
										  {
										  cell_av[".($i+1)."][".($ii-2)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-1)."'+'".($i+2)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
									 
										if((".($i-3).">=0)&&(".($ii)."<8)&&(cell[".($i-3)."][".($ii)."]==0))
										  {
										  cell_av[".($i-3)."][".($ii)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+1)."'+'".($i-2)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i-3).">=0)&&(".($ii)."<8)&&(cell[".($i-3)."][".($ii)."]*(cell[".($i-3)."][".($ii)."]-100)*(arm-100)<0)) 	 
										  {
										  cell_av[".($i-3)."][".($ii)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+1)."'+'".($i-2)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i-2).">=0)&&(".($ii+1)."<8)&&(cell[".($i-2)."][".($ii+1)."]==0)) 	 
										  {
										  cell_av[".($i-2)."][".($ii+1)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+2)."'+'".($i-1)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i-2).">=0)&&(".($ii+1)."<8)&&(cell[".($i-2)."][".($ii+1)."]*(cell[".($i-2)."][".($ii+1)."]-100)*(arm-100)<0))	 
										  {
										  cell_av[".($i-2)."][".($ii+1)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+2)."'+'".($i-1)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i-2).">=0)&&(".($ii-3).">=0)&&(cell[".($i-2)."][".($ii-3)."]==0)) 	 
										  {
										  cell_av[".($i-2)."][".($ii-3)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-2)."'+'".($i-1)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i-2).">=0)&&(".($ii-3).">=0)&&(cell[".($i-2)."][".($ii-3)."]*(cell[".($i-2)."][".($ii-3)."]-100)*(arm-100)<0)) 	 
										  {
										  cell_av[".($i-2)."][".($ii-3)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-2)."'+'".($i-1)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i-3).">=0)&&(".($ii-2).">=0)&&(cell[".($i-3)."][".($ii-2)."]==0)) 	 
										  {
										  cell_av[".($i-3)."][".($ii-2)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-1)."'+'".($i-2)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  }
										if((".($i-3).">=0)&&(".($ii-2).">=0)&&(cell[".($i-3)."][".($ii-2)."]*(cell[".($i-3)."][".($ii-2)."]-100)*(arm-100)<0))	 
										  {
										  cell_av[".($i-3)."][".($ii-2)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-1)."'+'".($i-2)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
									 }
									 
								 if(arm==111)//чёрная пешка
									 {if(cell[".($i-2)."][".($ii-1)."]==0) 	 
										  {
										  cell_av[".($i-2)."][".($ii-1)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii)."'+'".($i-1)."').innerHTML='<img src=chess_img/dot.png height=15> ';
										  
										  if((".$i."==7)&&(cell[".($i-3)."][".($ii-1)."]==0))	 
												  {
												  cell_av[".($i-3)."][".($ii-1)."]=1;
												  document.getElementById('td_".chr(ord("a")-1+$ii)."'+'".($i-2)."').innerHTML='<img src=chess_img/dot.png height=15> ';
												  
												  
												  }	
											}  
									 if((cell[".($i-2)."][".($ii)."]>0)&&(cell[".($i-2)."][".($ii)."]<100)) 	 
										  {
										  cell_av[".($i-2)."][".($ii)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii+1)."'+'".($i-1)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
									  if((cell[".($i-2)."][".($ii-2)."]>0)&&(cell[".($i-2)."][".($ii-2)."]<100)) 	 
										  {
										  cell_av[".($i-2)."][".($ii-2)."]=1;
										  document.getElementById('td_".chr(ord("a")-1+$ii-1)."'+'".($i-1)."').innerHTML+='<img src=chess_img/dot.png height=15> ';
										  }
									 }
								
								 }
								}
								else{//ставим фигуру в ячейку поля
									if(cell_av[".($i-1)."][".($ii-1)."]==1)
										{
										if(document.getElementById('ch_col').value == 0)
										{
										if(cell[".($i-1)."][".($ii-1)."]==5)
											document.getElementById('head_chess').innerHTML='Победа';
										if(cell[".($i-1)."][".($ii-1)."]==105)
											document.getElementById('head_chess').innerHTML='Поражение';
										}
                                        if(document.getElementById('ch_col').value == 100)    
										{
									    if(cell[".($i-1)."][".($ii-1)."]==5)
											document.getElementById('head_chess').innerHTML='Поражение';
										if(cell[".($i-1)."][".($ii-1)."]==105)
											document.getElementById('head_chess').innerHTML='Победа';
										}
										if((arm==11)&&(".$i."==8))arm=4;
										if((arm==111)&&(".$i."==1))arm=104;
										cell[".($i-1)."][".($ii-1)."]=arm;
										this.innerHTML='<img src=chess_img/cp'+arm+'.png height=45> ';
										var cur_ir=cur_i+1;
										document.getElementById('c_from').value=String.fromCharCode('a'.charCodeAt()+cur_ii)+cur_ir;
										document.getElementById('c_to').value='".chr(ord("a")-1+$ii)."'+".($i).";
										arm=0;
										for(var i=0;i<8;i++)
											for(var ii=0;ii<8;ii++)
											{cell_av[i][ii]=0;
											var i_r=i-0+1;var i_c=ii-0+1;
											if(cell[i][ii]==0)
												document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='';
												else document.getElementById('td_'+String.fromCharCode('a'.charCodeAt()+i_c-1)+i_r).innerHTML='<img src=chess_img/cp'+cell[i][ii]+'.png height=45>';
											}
										cur_i=-1;cur_ii=-1;	
										
										if((document.getElementById('ch_ai').checked)
											&&!(((cell[".($i-1)."][".($ii-1)."]-0>document.getElementById('ch_col').value-0)
											   &&(cell[".($i-1)."][".($ii-1)."]-0<document.getElementById('ch_col').value-0+100))))
											document.getElementById('btn_next_move').onclick();
										}
									}
								\"";
			}
		echo " align=center style=\"width:50;height:50;border-style:solid;border-width:1;";
		

   
            if(($ii!=0)&&($ii!=9)&&($i!=0)&&($i!=9)&&(($i+$ii)%2==0))
			echo "background-color:#FAF0E6;";
	
			else if(($ii!=0)&&($ii!=9)&&($i!=0)&&($i!=9))
				
					echo "background-color:#6A5ACD;";
					else echo "background-color:#8B0000;";

		echo "\">";
		if((($ii==0)||($ii==9))&&($i!=0)&&($i!=9))echo "<h3>".$i."</h3>";
		if((($i==0)||($i==9))&&($ii!=0)&&($ii!=9))echo "<h3>".chr(ord("A")-1+$ii)."</h3>";
		//белые фигуры
		if(($i==1)&&(($ii==1)||($ii==8)))echo "<img src=\"chess_img/cp1.png\" height=45>";
		if(($i==1)&&(($ii==2)||($ii==7)))echo "<img src=\"chess_img/cp2.png\" height=45>";
		if(($i==1)&&(($ii==3)||($ii==6)))echo "<img src=\"chess_img/cp3.png\" height=45>";
		if(($i==1)&&($ii==4))echo "<img src=\"chess_img/cp4.png\" height=45>";
		if(($i==1)&&($ii==5))echo "<img src=\"chess_img/cp5.png\" height=45>";
		if(($i==2)&&($ii!=0)&&($ii!=9))echo "<img src=\"chess_img/cp11.png\" height=45>";
		//чёрные фигуры
		if(($i==8)&&(($ii==1)||($ii==8)))echo "<img src=\"chess_img/cp101.png\" height=45>";
		if(($i==8)&&(($ii==2)||($ii==7)))echo "<img src=\"chess_img/cp102.png\" height=45>";
		if(($i==8)&&(($ii==3)||($ii==6)))echo "<img src=\"chess_img/cp103.png\" height=45>";
		if(($i==8)&&($ii==4))echo "<img src=\"chess_img/cp104.png\" height=45>";
		if(($i==8)&&($ii==5))echo "<img src=\"chess_img/cp105.png\" height=45>";
		if(($i==7)&&($ii!=0)&&($ii!=9))echo "<img src=\"chess_img/cp111.png\" height=45>";
		
		echo "</td>";
		}
	echo "</tr>";
	}
echo "</table>";	
?>
