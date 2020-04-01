<!doctype html>
<html>
<head>
<style>
#test{
border-style: solid;
border-width: 5px;
}
</style>
</head>
<body>
<canvas id='test' width='1333' height='600' onload="startgame()" onmousedown="mousestuff(event)" onmouseup="resem(event)" onmousemove="graim(event)"></canvas>
<script>
var canvas = document.getElementById('test');
var context = canvas.getContext('2d');
canvas.oncontextmenu = function (e) {
    e.preventDefault();
};
var x = 40;
var y= 40;
var xtrue = 0;
var xltrue = 0;
var xrtrue = 0;
var ytrue = 0;
var gravity = 0.5; 
var yspe = 0;
var yspee = 0;
var gyspe = 0;
yutrue = 0;
xspe = 0;
rspe = 0.8;
lspe = 0.8;
spe = 0.8;
jspee = 17;
var objects= [];
var enemies= [];
xwidth = 30;
yheight = 30;
time = 0;
angle = 270;
ygtrue=0;
shoot = 0;
gspe = 12;
gx = -100;
gy = -100;
takeo = 0;
dg = 0;
land = 0;
ygltrue = 0;
ygrtrue = 0;
gyspe = 0;
a = 0;
b=0;
c=0;
bc = 0;
d = 0;
e = 0;
f = 0;
p=0;
xxspe = 0;
xmom = 0;
espaw = 0;
health = 100;
waves = 0;
spaw = 0;
start = 0;
dead = 0;
xa = 0;
ya = 0;
monkey = -2;
bat = -4;
bosshp = 3;
var i;
setInterval(updates,16);
setInterval(supper,1);
function mousestuff(event){
   var xx = event.clientX;
   var yy = event.clientY;
   if(event.button == 2){
   var box = { coor:[xx-40,yy-40,50,50]};
   objects.push(box);
   }
   if(event.button ==0){
      shoot = 1;
   } else{
   shoot = 0;
   }
}
function resem(event){
   if(event.button == 0){
      shoot = 0;
   }
}

function updates(){
var player = { coor:[x,y,xwidth,yheight]};
objects[0] = player;

if(y + yheight+1> canvas.height){
   xspe = 0;
}
if(xrtrue>0){
    xxspe+=spe;
}
  
if(xltrue<0){
   xxspe+=-spe;
}
if(xxspe > 6){
   xxspe = 6;
}
if(xxspe < -6){
   xxspe = -6;
}
if(land == 0){
if(xltrue == 0 && xrtrue == 0){
if(xxspe == 0){
   xxspe = 0
} else{
if (bc == 0){
   bc = xspe / 0.4;
}
if(b >= bc){
   xxspe = 0;
   b = 0;
   bc = 0;
} else{
   xxspe -= Math.sign(xxspe)*0.4
   b++;
}
}
}
if(xltrue == -1 && xrtrue ==1){
if (bc == 0){
   bc = xspe / 0.4;
}
if(xxspe == 0){
   xxspe = 0
} else{
if(b >= bc){
   xxspe = 0;
   b = 0;
   bc=0;
} else{
   xxspe -= Math.sign(xxspe)*0.4
   b++;
}
}
}
}
if(xspe ==0){
   d=0;
}
if(xspe > 0 || xspe < 0){
   if(d == 0){
   xspe = xxspe;
   d++;
   }
   xxspe = 0;
   if(xrtrue>0){
    xspe+=spe/3;
}
  
if(xltrue<0){
   xspe+=-spe/3;
}
}

if(yspee + gravity >= 0){
   yspee = 0;
} else {
yspee += gravity;
}
yspe += gravity;
if(land == 1){

} else if(y + yheight >= canvas.height){
   yspe = 0 
} 
if (y + 30 == canvas.height){
} else if(land == 1){
 if(y + yheight + yspe> canvas.height){
   y=canvas.height - yheight;
   yspe = 0;
   if(land == 0){
      xspe = 0;
   } else {
      
   }
   }
} else if(y + yheight + yspe> canvas.height){
   y=canvas.height - yheight;
   yspe = 0;
   if(land == 0){
      xspe = 0;
   } else {
      
   }
}
if (x+xspe+xxspe+xwidth > canvas.width){
   xspe = 0; 
   xxspe = 0;
}
if (x+xspe+xxspe < -4){
   xspe = 0;
   xxspe = 0; 
}
if(x < 0){
   x++
}
if(land == 1){
if(yutrue < 0){
      yspe -= spe/2;
}
if(ytrue > 0){
   yspe += spe/2;
}
}
if(y+yheight >= canvas.height){
if(land == 0){
yspee = yutrue * jspee
}
}
if(ygrtrue ==1 && takeo == 0){
   angle +=2;
}
if(ygltrue ==1 && takeo == 0){
   angle -=2;
}
if(xspe < -10 ){
   xspe = -10;
}
if(xspe > 10){
   xspe = 10;
}
if(xspe > 0){
   xspe -= 0.05;
}
if(xspe < 0){
   xspe += 0.05;
}
if(shoot == 1 && land == 1){
   a= 0;
   gx = -100;
   gy = -100;
   takeo = 0;
   land = 0;
   shoot = 0;
}
if(land == 0 && takeo == 0){
   xan = x - xa - 10;
   yan = ya - y - 10;
 angle = Math.atan2(xan,yan) * 180 / Math.PI; 
 }
if(health <= 0){
   dead = 1;
}
xmom = xspe + xxspe;
x += xmom;
y += yspe + yspee + gyspe;
gyspe = 0;
return redrawAll(objects);
}




function redrawAll(objects){
context.clearRect(0,0,canvas.width,canvas.height)
   for (var i = 0; i < objects.length; i++){
         context.fillStyle = 'blue';
         if(dead == 0){ 
         redraw(objects[0]);
         } else{
         context.fillStyle = "black";
   context.font = "30px Arial";
   context.fillText((`You died, after having reached wave ${waves}.`),(canvas.width)/2 - 300 , (canvas.height)/2);
         }
         }
         for (var i = 1; i < objects.length; i++){
         context.fillStyle = 'red'; 
         redraw(objects[i]);
         collcheck(objects[i]);
      }
         for (var i = 0; i< enemies.length; i++){
         var id = enemies[i].coor;
            id[6] = i;
            if(enemies.length > 0){
            rdraw(enemies[i]);
            }
            if(enemies.length > 0){
            aien(enemies[i]);
            }
            if(enemies.length > 0){
            attcheck(enemies[i]); 
            }
            if(enemies.length > 0){
            collicheck(enemies[i])
            }
         }
         if(espaw == 1){
         if(e<1){
          enemy();
          e++ 
         } 
         }
         if(espaw == 0){
            if(e>0){
               e = 0;
            }
         }
         if(dead== 0){
   context.fillStyle = "black";
   context.font = "30px Arial";
   context.fillText(`Hp:${health}`,10,40);
   if(waves == 10){
   context.fillText(`BossHp:${bosshp}`,canvas.width - 140, 40);
   }
   }
  grapple();
  wave();
}
function graim(event){
   if(takeo == 0 && land== 0){
   rect = canvas.getBoundingClientRect(); 
   xa = event.clientX - rect.left;
   ya = event.clientY - rect.top;
   }
}
   function wave(){
   if(start == 1){
   spaw == 0;
   if(enemies.length == 0){
   spaw = 1;
   waves++;
   word = waves*0.7;
   monkey++;
   mord = monkey*0.55;
   bat++;
   bord = bat*0.8;
   if(waves == 10){
      bossmy();
   } else {
   for (var i = 0; i< word; i++){
    enemy();
   }
   for(var i = 0; i < mord; i++){
    enenmy();
   }  
   for(var i = 0; i < bord; i++){
   batmy();
   }
   }
   }
   }
}
   function aien(enemy){
   var coorddd = enemy.coor;
   eyspe = coorddd[5];
      espe = 4;
      eyspe += gravity;
      coorddd[5] = eyspe;
      if(coorddd[1]+coorddd[5] + coorddd[3] >canvas.height ){
         var tspe = coorddd[5];
         coorddd[5]=0;
         coorddd[1] = canvas.height - coorddd[3];
         if(coorddd[7] == 0){
         coorddd[4] = coorddd[4]/2;
         coorddd[5] -=Math.floor(Math.random() * 10)+5;
         coorddd[4] -= Math.sign(coorddd[0] - x)*Math.floor(Math.random() * espe);
         }
         if(coorddd[7] == 1){
          coorddd[5] -= 10 + tspe/3;
          coorddd[4] -= Math.sign(coorddd[0]-x)*2;  
         }
      }
      if(coorddd[7] == 3){
         if(coorddd[1] + coorddd[3] == canvas.height){
            if(f < 100){
               f++;
               coorddd[4] = 0;
            } else {
                coorddd[5] -=Math.floor(Math.random() * 20)+5;
                coorddd[4] -= Math.sign(coorddd[0] - x)*Math.floor(Math.random() * 15);
                f = 0;
            }
         }
      }
      if(coorddd[0] + coorddd[4] + coorddd[2] > canvas.width){
      if(coorddd[7] == 0 || coorddd[7] == 2){
         coorddd[4] = 0;
         }
      if(coorddd[7] == 1){
         coorddd[4] = -coorddd[4];
      }
         coorddd[0] = canvas.width - coorddd[2];
         
      }
      if(coorddd[0] + coorddd[4] < 0){
      if(coorddd[7] == 0|| coorddd[7] == 2){
         coorddd[4] = 0;
         }
      if(coorddd[7] == 1){
         coorddd[4] = -coorddd[4];
      }
         coorddd[0] = 0;
      }
      coorddd[1] +=eyspe;
      coorddd[0] +=coorddd[4];
      tes = Math.floor(Math.random() * 2) 
      if(coorddd[4] == 0){
         if(tes == 1){
         coorddd[4] = (Math.sign(coorddd[0] - x)*0.4);
         }
         if(tes == 0){
         coorddd[4] = -(Math.sign(coorddd[0] - x)*0.4);   
         }
      }
      if(coorddd[7] == 2){
         coorddd[5] -= gravity;
         coorddd[4] -= (Math.sign(coorddd[0] - x)* 0.3);
         coorddd[5] += (Math.sign(y - coorddd[1])* 0.3);
      }
      if(coorddd[7] == 3){
      if(enemies.length < 2){
         batmyn();
         }
      }
      
   }
   function attcheck(enemy){
      var cords = enemy.coor;
      if(cords[0] + cords[4] + cords[2]> x && cords[0] + cords[4] < x + xwidth && cords[1] + cords[5] < y + yheight  && cords[1] + cords[5] + cords[3] > y ){
      xche = (cords[0]+cords[2]/2) - (x+xwidth/2);
      yche = (cords[1]+cords[3]/2) - (y+yheight/2);
      if(xche < 0){
         xche = xche*-1;
      }
       if(yche < 0){
         yche = yche*-1;
      }
      if(xche > yche){
         spe1 = cords[4];
         spe2= yspe + yspee;
         if(cords[0]-x > 0){
            cords[0] = x + xwidth;
              if(cords[7]==0 || cords[7]==1){
       health -=10;
       }
       if(cords[7]==2){
       health -= 5;
       }
         } else {
          cords[0] = x - cords[2]
            if(cords[7]==0 || cords[7]==1){
       health -=10;
       }
       if(cords[7]==2){
       health -= 5;
       }
         }
         xspe = spe1/3;
         cords[4] = -spe1;
      } 
      if(yche > xche){
         yspe1 = cords[5];
         yspe2= yspe + yspee;
         if(cords[1]-y > 0){
            cords[1] = y + yheight + 1;
            yspe += yspe1;
            cords[5] = -yspe1;
            if(cords[7] == 3){
               bosshp -=1;
            xspe += Math.sign((canvas.width)/2 - x) * 10;
            yspe -= 20;
            if(bosshp == 0){
               var die = cords[6];
          enemies.splice(die,1);
          health += 10;
            }
            } else { 
            var die = cords[6];
          enemies.splice(die,1);
          health += 10;
          }
         } else {
       yspee = 0;
       yspe = 0;
       cords[5]= 0;
     if(cords[7] == 0){
         cords[5] -=Math.floor(Math.random() * 3)+5;
         cords[4] -= Math.sign(cords[0] - x)*Math.floor(Math.random() * espe);
         }
         if(cords[7] == 1){
          cords[5] -= 10;
          cords[4] -= Math.sign(cords[0]-x)*2;  
         }   
if(cords[7] == 3){
   cords[5] -=Math.floor(Math.random() * 30)+5;
         cords[4] -= Math.sign(cords[0] - x)*Math.floor(Math.random() * 10);
         health -= 20;
}
       cords[1] = y - cords[3] - 1;
       if(cords[7]==0 || cords[7]==1){
       health -=10;
       }
       if(cords[7]==2){
       health -= 5;
       }
         }
      }
   }
       for (var i = 1; i < objects.length; i++){
         context.fillStyle = 'red'; 
        colche(enemy,objects[i])
      }
      for (var i = 0; i< enemies.length; i++){
            if(i == cords[6]){
               
            } else {
            eone(enemy,enemies[i])
            }
         }
       if(-Math.sin(angle*Math.PI / 180)*30 +gx > cords[0] && -Math.sin(angle*Math.PI / 180)*30 + gx  < cords[0] + cords[2]  && Math.cos(angle*Math.PI / 180)*30 +gy  > cords[1] && Math.cos(angle*Math.PI / 180)*30+gy  < cords[1] + cords[2]){
       var die = cords[6];
       if(cords[7] !== 3){
          enemies.splice(die,1);
          }
       }
   }
   function eone(enemy, enenmy){
    var cords = enemy.coor;
    var cordi = enenmy.coor; 
      if(cords[0] + cords[4] + cords[2]> cordi[0] && cords[0] + cords[4] < cordi[0] + cordi[2] && cords[1] + cords[5] < cordi[1] + cordi[3]  && cords[1] + cords[5] + cords[3] > cordi[1] ){
      xche = (cords[0]+cords[2]/2) - (cordi[0]+cordi[2]/2);
      yche = (cords[1]+cords[3]/2) - (cordi[1]+cordi[3]/2);
      if(xche < 0){
         xche = xche*-1;
      }
       if(yche < 0){
         yche = yche*-1;
      }
      if(xche > yche){
         spe1 = cords[4];
         spe2= cordi[4];
         if(cords[0]-cordi[0] > 0){
            cords[0] = cordi[0] + cordi[2];
         } else {
          cords[0] = cordi[0] - cords[2]
         }
         if(cordi[7] ==1 && cords[7] == 1){
         cordi[4] = spe1;
         cords[4] = spe2;
         } else if(cordi[7] == 1 || cords[7] == 1){
          cords[4] = -spe1;
          cordi[4] = Math.sign(spe1)*spe2;
          } else if(cordi[7] == 3){
            cords[4] = -spe1;
          } else if(cords[7] == 3){
          cordi[4] = -spe2;
          } else{
         cordi[4] = spe1;
         cords[4] = spe2;
         }
         
      } 
      if(yche > xche){
         yspe1 = cords[5];
         yspe2= cordi[5];
         if(cords[1]-cordi[1] > 0){
            cords[1] = cordi[1] + cordi[3] + 1;
         } else {
          cords[1] = cordi[1] - cords[3] - 1;
         }
          if(cordi[7] == 1 || cords[7] == 1){
          cords[5] = -yspe1;
          cordi[5] = Math.sign(yspe1)*yspe2;
          } else if(cordi[7] == 3){
            var die = cords[6];
          enemies.splice(die,1);
          } else if(cords[7] == 3){
          var die = cordi[6];
          enemies.splice(die,1);
          } else{
         cordi[5] = yspe1;
         cords[5] = yspe2;
         }
      }
   }
   }
   function colche(enemy,objects){
      var coordd = objects.coor;
      var cords = enemy.coor;
        if(cords[0] + cords[4] + cords[2] > coordd[0] && cords[0] < coordd[0] + 7  && cords[1] + cords[3] > coordd[1]+7 && cords[1] < coordd[1] + 45){
        if(cords[7] == 1){
         cords[0] = coordd[0] - cords[2];
         cords[4] = -cords[4];
        } 
        if(cords[7] == 0){
         cords[0] = coordd[0] - cords[2];
         cords[4] = 0;
        }
  }
  if(cords[0] + cords[4]  < coordd[0] + 50 && cords[0] > coordd[0] + 43 && cords[1] + cords[3] > coordd[1]+7 && cords[1] < coordd[1] + 45){
   cords[0] = coordd[0] + 50;
   if(cords[7] == 1){
   cords[4] = -cords[4];
   }
   if(cords[7] == 0){
   cords[4] = 0;
   }
  } 
  if(cords[1] + cords[5]/2 + cords[3]  > coordd[1] && cords[0] < coordd[0] +50  && cords[0] + cords[2]> coordd[0] && cords[1] < coordd[1]){
  if(cords[7] == 0){
  cords[5] = 0;
         cords[5] -=Math.floor(Math.random() * 3)+9;
         cords[4] -= Math.sign(cords[0] - x)*Math.floor(Math.random() * espe);
         cords[1] = coordd[1]-cords[3];
         }
         if(cords[7] == 1){
         cords[1] = coordd[1]-cords[3];
          cords[5] -= 10;
          cords[4] -= Math.sign(cords[0]-x)*2;  
         }
  }
  if(cords[1] + cords[5] < coordd[1] + 50 && cords[0] < coordd[0] +50 && cords[0] + cords[2]> coordd[0] && cords[1] > coordd[1]){
  if(cords[7] ==1 || cords[7] == 0){
  cords[1] = coordd[1] + 50;
   cords[5] = 0;
   }
  }
}
  function rdraw(enemy){
   var coorddd = enemy.coor;
if(coorddd[7] == 0){
   context.fillStyle = "#ADFF2F";
   }
if(coorddd[7] == 1){
   context.fillStyle = "#00FFFF";
}
if(coorddd[7] == 2){
   context.fillStyle = "#616587";
}
if(coorddd[7] == 3){
   context.fillStyle = "#EE82EE";
}
   context.fillRect(coorddd[0],coorddd[1],coorddd[2],coorddd[3])
  }
  function redraw(theobject){
   var coord = theobject.coor;
   context.fillRect(coord[0],coord[1],coord[2],coord[3])
   
  }
  function collcheck(tobject){
   var coordd = tobject.coor;
  if(x + xspe + xwidth + xxspe > coordd[0] && x < coordd[0] + 7  && y + yheight > coordd[1]+7 && y < coordd[1] + 45){
   x = coordd[0] - xwidth;
   rspe = 0;
   xspe = 0;
   xxspe = 0;
  } else {
   rspe = 6
  }
  if(x + xspe +xxspe  < coordd[0] + 50 && x > coordd[0] + 43 && y + yheight > coordd[1]+7 && y < coordd[1] + 45){
   x = coordd[0] + 50;
   lspe = 0;
   xspe = 0;
   xxspe = 0;
   
  } else{
   lspe = 6
  }
  if(y + yspe/2 + yheight  > coordd[1] && x < coordd[0] +50  && x + xwidth> coordd[0] && y < coordd[1]){
  y = coordd[1]-yheight;
   yspe = 0;
   if(land == 0){
      xspe = 0;
   }
  }
  if(y + yheight +1  > coordd[1] && x < coordd[0] +50  && x + xwidth> coordd[0] && y < coordd[1]){
  if(land == 0){
   xspe = 0;
   }
  }
  if(y + yspee + yspe < coordd[1] + 50 && x < coordd[0] +50 && x + xwidth> coordd[0] && y > coordd[1]){
  y = coordd[1] + 50;
   yspee = 0;
   yspe = 0;
  }
  if(y +yheight >= coordd[1]&& x < coordd[0] +49 && x + xwidth -1> coordd[0] && y < coordd[1]){
  if(land == 0){
  yspee = yutrue * jspee
  }
  }
    if(-Math.sin(angle*Math.PI / 180)*30 +gx > coordd[0] && -Math.sin(angle*Math.PI / 180)*30 + gx  < coordd[0] + 50  && Math.cos(angle*Math.PI / 180)*30 +gy  > coordd[1] && Math.cos(angle*Math.PI / 180)*30+gy  < coordd[1] + 50 ){
  land = 1;
  gspe = 0;

} else {
   gspe = 12;
}
}
function collicheck(enemiees){
   var cordi = enemiees.coor;
     if(x + xspe + xwidth + xxspe > cordi[0] && x + xxspe + xspe < cordi[0] + cordi[2] && y + yspe + yspee < cordi[1] + cordi[3]  && y + yspee + yheight + yspe > cordi[1] ){
      xche = (x+xwidth/2) - (cordi[0]+cordi[2]/2);
      yche = (y+yheight/2) - (cordi[1]+cordi[3]/2);
      if(xche < 0){
         xche = xche*-1;
      }
       if(yche < 0){
         yche = yche*-1;
      }
      if(xche > yche){
         spe1 = xspe + xxspe;
         spe2= cordi[4];
         if(x-cordi[0] > 0){
            x = cordi[0] + cordi[2];
            xspe = 0;
            xxspe = 0;
         } else {
          x = cordi[0] - xwidth;
          xspe = 0;
          xxspe = 0;
         }
         cordi[4] = -spe2;
         xspe += spe2/3;
      } 
      if(yche > xche){
         yspe1 = y + yspe + yspee;
         yspe2= cordi[5];
         if(y-cordi[1] > 0){
            y = cordi[1] + cordi[3] + 1;
            yspe = 0;
            yspee = 0;
         } else {
          y = cordi[1] - yheight - 1;
          yspe = 0;
          yspee = 0;
           if(cordi[7] == 3){
               bosshp -=1;
            xspe += Math.sign((canvas.width)/2 - x) * 10;
            yspe -= 20;
            if(bosshp == 0){
               var die = cordi[6];
          enemies.splice(die,1);
          health += 10;
            }
            } else { 
            var die = cordi[6];
          enemies.splice(die,1);
          health += 10;
          }
         }
         cordi[5] = -yspe2;
         yspe += yspe2/3;
      }
   }   
}

function supper(){
if(land == 0){
   if(ytrue == 1){
      time += 1;
   } 
   }
   if(time == 100){
   x -= 5;
      xwidth += 10;
      yheight -= 5;
      y+=5;
   }
   if(time == 200){
   x-=5;
      xwidth += 10;
      yheight -= 5;
      y+=5;
   }
   if(time == 300){
   x-=5;
      xwidth += 10;
      yheight -= 5;
      y+=5;
   }
   if(time == 400){
      time = 301;
   }
 
   if(time > 0 && ytrue < 1 && ytrue > -1){
      if(time > 100 && time < 200){
      yspe = 0;
         y-=6;
         yspee = -20;
         x+=5;
      }
      if(time > 200 && time < 300){
      yspe = 0;
         y-=11;
         yspee = -23;
         x+=10;
        
         
      }
      if(time > 300){
      yspe = 0;
         y-=16;
         yspee = -27;
         x+=15;
         
      }
      time = 0;
      
   }
    if(time == 0){
      xwidth = 30;
      yheight = 30;
   }
} 
function grapple(gtar){
if(takeo == 0){
dg = 0;

if(shoot == 1 && land == 0){
   gx = x +25;
   gy = y +25;
   takeo = 1;
   }

}
   if (takeo == 1 && land == 0){
   dg +=1;
   gx -= Math.sin(angle*Math.PI / 180)*gspe;
   gy += Math.cos(angle*Math.PI / 180)*gspe;
    context.save();
      context.fillStyle = 'gray'; 
      context.translate(gx,gy);
      context.rotate(angle * Math.PI / 180);
      if(dead == 0){
      context.fillRect(0,0,5,40);
      }
      context.restore();
      context.beginPath();
      context.moveTo(x+xwidth/2,y+yheight/2);
      context.lineTo(gx,gy);
      context.stroke();
      context.fillRect(-Math.sin(angle*Math.PI / 180)*30+gx,Math.cos(angle*Math.PI / 180)*30 +gy,5,5);
      if(land == 1){
         
      }else if(dg >= 75){
         takeo = 0;
         dg = 0;
      }
      
 
}else if(land == 1){
if(a < 150){
      context.save();
      context.fillStyle = 'gray'; 
      context.translate(gx,gy);
      context.rotate(angle * Math.PI / 180);
      if(dead == 0){
      context.fillRect(0,0,5,40);
      }
      context.restore();
      context.beginPath();
      context.moveTo(x+xwidth/2,y+yheight/2);
      context.lineTo(gx,gy);
      context.stroke();
   gspe = 0;
   gxx = gx-x;
   gyy = y - gy ;
   if(gxx*Math.sign(gxx) < 3  && gyy*Math.sign(gyy) < 3){
      a= 0;
      gx = -100;
      gy = -100;
      takeo = 0;
      land = 0;
   } 
   glx = gxx * gxx;
   gly = gyy * gyy;
   locx = glx + gly;
   locg = Math.sqrt(locx);
   
   xspe += (gxx/locg) * 1.2;
   yspe -= (gyy/locg) * 1.2;
   a++;
} else {
a= 0;
gx = -100;
gy = -100;
takeo = 0;
land = 0;
}
} else {
       context.save();
      context.fillStyle = 'gray'; 
      context.translate(x+xwidth/2,y+yheight/2);
      context.rotate(angle * Math.PI / 180);
      if(dead == 0){
      context.fillRect(0,0,5,40);
      }
      context.restore();
}
}
function enemy(){
var tus = Math.floor(Math.random()*2);
if (tus == 0){
 var xe = Math.floor(Math.random() * (canvas.width - x - 150));
 }
 if(tus==1){
 var xe = Math.floor(Math.random() * x + 150) + canvas.width - x - 150; 
 }
 var ye = Math.floor(Math.random() * canvas.height);
 if(espaw == 1){
   var enem =  { coor :[xe-15,ye-15,30,30,0,0,0,0]};
   enemies.push(enem);
   }
 if(spaw == 1){
   var enem =  { coor :[xe-15,ye-15,30,30,0,0,0,0]};
   enemies.push(enem);
 }
}
function enenmy(){
   var tus = Math.floor(Math.random()*2);
if (tus == 0){
 var xe = Math.floor(Math.random() * (canvas.width - x - 150));
 }
 if(tus==1){
 var xe = Math.floor(Math.random() * x + 150) + canvas.width - x - 150; 
 }
 var ye = Math.floor(Math.random() * canvas.height); 
   var ye = Math.floor(Math.random() * canvas.height);
 if(spaw == 1){
   var enem =  { coor :[xe-15,ye-15,30,30,0,0,0,1]};
   enemies.push(enem);
 } 
}
function batmy(){
   var tus = Math.floor(Math.random()*2);
if (tus == 0){
 var xe = Math.floor(Math.random() * (canvas.width - x - 150));
 }
 if(tus==1){
 var xe = Math.floor(Math.random() * x + 150) + canvas.width - x - 150; 
 }
 var ye = Math.floor(Math.random() * canvas.height); 
   var ye = Math.floor(Math.random() * canvas.height);
 if(spaw == 1){
   var enem =  { coor :[xe-5,ye-5,13,13,0,0,0,2]};
   enemies.push(enem);
 } 
}
function batmyn(){
var corm = enemies[0].coor;
 
   var xe = Math.floor(Math.random() * canvas.width);
   var ye = Math.floor(Math.random() * canvas.height);
 if(spaw == 1){
 for(var i = 0; i < 5; i++){
   var enem =  { coor :[xe-5,ye-5,13,13,0,0,0,2]};
   enemies.push(enem);
   }
 } 
}
function bossmy(){
   var tus = Math.floor(Math.random()*2);
if (tus == 0){
 var xe = Math.floor(Math.random() * (canvas.width - x - 150));
 }
 if(tus==1){
 var xe = Math.floor(Math.random() * x + 150) + canvas.width - x - 150; 
 }
 var ye = Math.floor(Math.random() * canvas.height); 
   var ye = Math.floor(Math.random() * canvas.height);
 if(spaw == 1){
   var enem =  { coor :[xe-100,ye-100,200,200,0,0,0,3]};
   enemies.push(enem);
 } 
}
document.addEventListener('keydown', function(event){
var toe=event.key;
var tog= objects.coor;
if(toe === 'ArrowRight' || toe ==='d'){
   xrtrue = 1;
}
if(toe === 'ArrowLeft'|| toe ==='a'){
   xltrue = -1;
}
if(toe === 'ArrowDown'|| toe ==='s'){
   ytrue = 1 ;
}

if(toe === 'ArrowUp'|| toe ==='w'){
   yutrue = -1 ;
}
if(toe ==='q'){
   ygltrue = 1
}
if(toe ==='e'){
   ygrtrue = 1
}
if(toe === ' '){
   shoot = 1
}
if(toe ==='p'){
   espaw = 1;
}
if(toe ==='o'){
   start = 1;
}
if(toe ==='i'){
   waves = 9;
}
});
document.addEventListener('keyup', function(event){
var toe=event.key;
if(toe === 'ArrowRight'|| toe ==='d'){ 
 xrtrue = 0;
}
if(toe === 'ArrowLeft'|| toe ==='a'){
   xltrue = 0;
}
if(toe === 'ArrowDown'|| toe ==='s'){
   ytrue = 0 ;
}
if(toe === 'ArrowUp'|| toe ==='w'){
   yutrue = 0 ;
}
if(toe ==='q'){
   ygltrue = 0
}
if(toe ==='e'){
   ygrtrue = 0
}
if(toe === ' '){
   shoot = 0
}
if(toe === 'p'){
   espaw = 0; 
}
});
</script>
</body>
</html>