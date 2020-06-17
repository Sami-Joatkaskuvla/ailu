<!doctype html>
<html>
<head>
<style>
#test{
border-style: solid;
border-width: 5px;
background-image: url("backat.png");
}
</style>
</head>
<body>
<canvas id='test' width='1333' height='600' onload="startgame()" onmousedown="mousestuff(event)" onmouseup="resem(event)" onmousemove="graim(event)"></canvas>
<div style="display:none";> 
<img id="srcc" src="98874.png" height="512" width="512">
<img id="slice" src="1238.png" height="302" width="948">
</div>
<script>
//Canvas defining.
var canvas = document.getElementById('test');
var context = canvas.getContext('2d');
var sprite = document.getElementById('srcc');
var slic = document.getElementById('slice');
//Denies right licks (Copied from internet, so i have no clue how it works.)
canvas.oncontextmenu = function (e) {
    e.preventDefault();
};
//variable list (Way to many variables. Used and unused.)
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
xwidth = 32;
yheight = 32;
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
bosshp = 5;
var i;
	swidth = 32;
	sheight = 32;
   sloicce = 0;
   n = 0;
   slicec = 0;
   hm = 1;
   adva = 0;
   coins = 0;
   hit = 0;
//Interval  times
setInterval(updates,16);
//Box placement, also mousebutton checks
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

//Some kind of mouse button check? (This is why i am organizing everything)
function resem(event){
   if(event.button == 0){
      shoot = 0;
   }
}
//Begginning of main code.
function updates(){
//Player 
var player = { coor:[x,y,xwidth,yheight]};
objects[0] = player;
//Player canvas collision
if(y + yheight+1> canvas.height){
   xspe = 0;
}
//Player movement
if(xrtrue>0){
    xxspe+=spe;
}
  
if(xltrue<0){
   xxspe+=-spe;
}
//Player movement limiters
if(xxspe > 6){
   xxspe = 6;
}
if(xxspe < -6){
   xxspe = -6;
}
//No clue. But its probably the movement after using grappling hook and staying in air.
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
//Excuse me what is this? What have i written?
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
//Gravity functions
if(yspee + gravity >= 0){
   yspee = 0;
} else {
yspee += gravity;
}
yspe += gravity;
if(land == 1){
//More canvas collisions
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
//Jump checks (Also falls under canvas collisions)
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
//This seems to be the old grappling hook aiming system. Dont know if i should keep this around but just in case the mouse breaks i'll leave it.
//This seems to be the xspe limiter, as opposed to the xxspe limiter.
if(xspe < -10 ){
   xspe = -10;
}
if(xspe > 10){
   xspe = 10;
}
//Xspe decelerator
if(xspe > 0){
   xspe -= 0.05;
}
if(xspe < 0){
   xspe += 0.05;
}
 if(ygltrue > 0){
   angle -= 1;
 } 
  if(ygrtrue > 0){
   angle += 1;
 }
//This looks like a grappling hook reset. (Could probably condense the code in it to a function since its used so often in diffrent places)
/*
if(shoot == 1 && land == 1){
   a= 0;
   gx = -100;
   gy = -100;
   takeo = 0;
   land = 0;
   shoot = 0;
}
*/
//This seems to be the grappling hook mouse aiming system (Still needs improvement)
if(sloicce == 0){
   xan = x - xa + 16;
   yan = ya - y + 16;
 angle = Math.atan2(xan,yan) * 180 / Math.PI; 
 }
 
 //Death event.
if(health <= 0){
   dead = 1;
}
//Movement execution.  
xmom = xspe + xxspe;
x += xmom;
y += yspe + yspee + gyspe;
gyspe = 0;
return redrawAll(objects);
}



//Redrawing function
function redrawAll(objects){
//Clears the canvas.
context.clearRect(0,0,canvas.width,canvas.height)
//Drawing player
   for (var i = 0; i < objects.length; i++){
         context.fillStyle = 'blue';
         if(dead == 0){ 
         redraw(objects[0]);
         } else{
//Player has died.
         context.fillStyle = "black";
   context.font = "30px Arial";
   context.fillText((`You died, after reaching wave ${waves}.`),(canvas.width)/2 - 300 , (canvas.height)/2);
         }
         }
//More redrawing.(Redrawing placeable boxes, (And future objects aswell.))
         for (var i = 1; i < objects.length; i++){
         context.fillStyle = 'red'; 
         redraw(objects[i]);
         collcheck(objects[i]);
      }
//This code is a bit confusing. But it seems that all it does is set and id for enemies? But it definitely draws the enemies.
         for (var i = 0; i< enemies.length; i++){
         var id = enemies[i].coor;
            id[6] = i;
            if(enemies.length > 0){
            aien(enemies[i]);
            }
            if(enemies.length > 0){
            attcheck(enemies[i]); 
            }
            if(enemies.length > 0){
            collicheck(enemies[i]);
            }
            if(enemies.length > 0){
               swordcoll(enemies[i]);
               }
            
            if(enemies.length > 0){
            rdraw(enemies[i]);
            }
            if(enemies.length >0){
               deat(enemies[i]);
            }
         }
//Enemy spawning?
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
//Seems like this is the drawing of Hp and boss Hp when fighting a boss.
         if(dead== 0){
   context.fillStyle = "black";
   context.font = "30px Arial";
   context.fillText(`Hp:${health} Coin:${coins}`,10,40);
   }
//Grapple is just the grappling function, meanwhile the wave function is for the wave mechanic ingame.
// grapple();
  wave();
  sword();
  sloice();
}
//No clue if this is even used. but it seems like this has to do with the grappling hook mouse aim?

function graim(event){
   rect = canvas.getBoundingClientRect(); 
   xa = event.clientX - rect.left;
   ya = event.clientY - rect.top - 32;
}

//Wave function.
   function wave(){
      hm = 0.2 * (waves + 0.0001);
   if(start == 1){
   spaw == 0;
   if(enemies.length == 0){
   if(adva == 1){
   spaw = 1;
   waves++;
//Word is normal enemy spawnrate.
   word = waves*0.4;
   monkey++;
//Monkey spawns the blue fast ones.
   mord = monkey*0.32;
   bat++;
//Bat is for the flying blackblue ones.
   bord = bat*0.30;
//In wave 10 a boss spawns (Currently difficulty of getting to wave 10 is way too high. The boss is still really rough around the edges aswell.)
   if(waves == 10){
      bossmy();
   } else {
   for (var i = 0; i< word; i++){
    enemy();
//Just checking when to spawn enemies.
   }
   for(var i = 0; i < mord; i++){
//Here it uses a diffrent function to spawn the blue boxes. (I am thinking that i have too many diffrent functions doing diffrent things.)
    enenmy();
   }  
   for(var i = 0; i < bord; i++){
//Here it spawns the bats.
   batmy();
   }
   }
   }else if(dead == 0){
   context.fillStyle = "black";
   context.font = "30px Arial";
   context.fillText((`Press x to advance to wave ${waves + 1}.`),(canvas.width)/2 - 270 , (canvas.height)/2);
   context.fillText((`Press c to buy full heal for ${(100 - health)*2} coins.`),(canvas.width)/2 - 300 , 50 + (canvas.height)/2);
   }
   
   }
   }
   console.log(enemies.length);
}
//Ai function for the enemy hence aien-emy.
   function aien(enemy){
   var coorddd = enemy.coor;
   //Gravity, speed, canvas collisions..
   eyspe = coorddd[5];
      espe = 4;
      eyspe += gravity;
      coorddd[5] = eyspe;
      if(coorddd[1]+coorddd[5] + coorddd[3] >canvas.height ){
         var tspe = coorddd[5];
         coorddd[5]=0;
         coorddd[1] = canvas.height - coorddd[3];
//The coorddd[7] here is the enemy type. So based on the number the enemy gets drawn with the diffrent attributes. 
//0 = normal, 1 = Blue fast one, 2 = bat, 3= boss. 
//(Thinking of adding more of these, but its alot of work and i have alot of stuff to polish)
         if(coorddd[7] == 0){
         coorddd[4] = coorddd[4]/2;
         if( coorddd[10] < 30){
         coorddd[10]++
         } else {
         coorddd[5] -=Math.floor(Math.random() * 10)+5;
         coorddd[4] -= Math.sign(coorddd[0] - x)*Math.floor(Math.random() * espe);
         coorddd[10] = 0;
         }
         }
//Again, checking the attribute of the blue boxes this time.
         if(coorddd[7] == 1){
          coorddd[5] -= 10 + tspe/3;
          coorddd[4] -= Math.sign(coorddd[0]-x)*2;  
         }
      }
//Checking the boss attributes.
      if(coorddd[7] == 3){
      coorddd[2] = 38 * coorddd[11];
      coorddd[3] = 38 * coorddd[11];
         if(coorddd[1] + coorddd[3] == canvas.height){
            if(coorddd[10] < 20*coorddd[11]){
               coorddd[10]++;
               coorddd[4] = 0;
            } else {
                coorddd[5] -=Math.floor(Math.random() * 20)+5;
                coorddd[4] -= Math.sign(coorddd[0] - x)*Math.floor(Math.random() * 15);
                coorddd[10] = 0;
            }
         }
      }
//This seems to be the true canvas collision detection for enemies.
      if(coorddd[0] + coorddd[4] + coorddd[2] > canvas.width){
      if(coorddd[7] == 0 || coorddd[7] == 2 || coorddd[7] == 3){
         coorddd[4] = 0;
         coorddd[0] = canvas.width - coorddd[2];
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
      if(coorddd[0] + coorddd[4] < 0){
         if(coorddd[7] == 1){
            coorddd[4] = -coorddd[4];
         } else {
            coorddd[4] = 0;
         }
         coorddd[0] = 0;
      }
//Enemy movement execution.
      coorddd[1] +=eyspe;
      coorddd[0] +=coorddd[4];
//This is a function for a random movement to lodge stuck enemies loose if they loose all speed.
      tes = Math.floor(Math.random() * 2) 
      if(coorddd[4] == 0){
         if(tes == 1){
         coorddd[4] = (Math.sign(coorddd[0] - x)*0.4);
         }
         if(tes == 0){
         coorddd[4] = -(Math.sign(coorddd[0] - x)*0.4);   
         }
      }
//Bat attribute check.
      if(coorddd[7] == 2){
         coorddd[5] -= gravity;
         coorddd[4] -= (Math.sign(coorddd[0] - x)* 0.3);
         coorddd[5] += (Math.sign(y - coorddd[1])* 0.3);
      }
//Here is the way the boss spawns bat enemies to help him out (Currently kind of a bad system. Needs work)
      
      
   }
//Collision checks (I hate these, i swear, these are the sole reason i cant spend much time developing new things. cause new things always break something with collisions.)
//This collisioncheck checks for enemies attacking and colliding with the player.
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
//These health minueses mean that the player has collided with a enemy.
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
               cords[11] -=1;
               bossmy(cords[11],cords[0],cords[1],cords[4],cords[5]);
            xspe += Math.sign((canvas.width)/2 - x) * 10;
            yspe -= 20;
            } else { 
           cords[1]--;
          health += 10;
          }
         } else {
       yspee = 0;
       yspe = 0;
       cords[5]= 0;
//This is the enemies movement after colliding with the player from the top. 
     if(cords[7] == 0){
         cords[5] -=Math.floor(Math.random() * 3)+5;
         cords[4] -= Math.sign(cords[0] - x)*Math.floor(Math.random() * espe);
         }
         if(cords[7] == 1){
          cords[5] -= 10;
          cords[4] -= Math.sign(cords[0]-x)*2;  
         } 
//Boss move after player collision from the top.
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
       if(cords[7] == 3){
         yspe +=1;
         xspe = cords[4]/2;
         cords[4] = -xspe; 
       }
         }
      }
   }
//For some reason the enemies to object and enemy to enemy collision test is hidden within the enemy player collision check.
       for (var i = 1; i < objects.length; i++){
         context.fillStyle = 'red'; 
        colche(enemy,objects[i])
      }
//This seems to be some kind of a id check.
      for (var i = 0; i< enemies.length; i++){
            if(i == cords[6]){
               
            } else {
//This seems to be the check for enemy to enemy collision. Also the code above makes sure that it isnt testing for collisions with itself.
            eone(enemy,enemies[i])
            }
         }

   }
//Enemy to enemy collision checks.
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
          } else{
         cordi[5] = yspe1;
         cords[5] = yspe2;
         }
      }
   }
   }
//Enemy to object collision checks.
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
  //Here is the function for how enemies move when colliding on top of red boxes.
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
//For some reason the redrawing of enemies is actually hidden all the way down here.
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
//Sprite animations
if(coorddd[9]>-100){
if(coorddd[7] == 0){
        if(coorddd[1]+coorddd[5] + coorddd[3] < canvas.height ){
        coorddd[10]++
        if(coorddd[10] == 2 ){
         coorddd[8] = 8;
         coorddd[9] = 9;
        }
        if(coorddd[10] == 4){
         coorddd[8] = 9;
         coorddd[9] = 9;
         }
            if(coorddd[10] == 6){
         coorddd[8] = 10;
         coorddd[9] = 9;
         }
            if(coorddd[10] == 8){
         coorddd[8] = 11;
         coorddd[9] = 9;
         }
         if(coorddd[10] == 10){
            coorddd[10] = 0;
         }
        } else if(coorddd[10] < 17 ){
      coorddd[8] = 0;
      coorddd[9] = 1;
      if (coorddd[10] > 12){
      coorddd[8] = 1;
      coorddd[9] = 9;  
      }
   } else{
   coorddd[8] = 2;
   coorddd[9] = 9;
   }
   }
   if(coorddd[7] == 1){
      if(coorddd[1]+coorddd[5] + coorddd[3] + 10 > canvas.height ){
         coorddd[8] = 8;
         coorddd[9] = 10;
      } else {
       coorddd[8] = 0;
       coorddd[9] = 2; 
       if(x < coorddd[0]){
         coorddd[8] = 3;
         coorddd[9] = 10;
       } else {
         coorddd[8] = 5;
         coorddd[9] = 10;
       }
      }
   }
   if(coorddd[7] == 2){
   if (coorddd[10] < 2){
   coorddd[8] = 5;
   coorddd[9] = 14;
   }
    coorddd[10]++   
      if(coorddd[10] >=4){
         coorddd[8]++
         coorddd[10] = 2;
      }
      if (coorddd[8] >= 12){
         coorddd[8] = 4;
      }
   }
   if(coorddd[7] == 3){
   if(coorddd[1]+coorddd[5] + coorddd[3] + 10 > canvas.height ){
         if(coorddd[10] > 25){
            coorddd[8] = 6;
            coorddd[9] = 8;
         } else {
         coorddd[8] = 7;
         coorddd[9] = 8;
         }
      } 
      if(coorddd[1]+coorddd[5] + coorddd[3] + 10 < canvas.height ){ 
         coorddd[8] = 7 + Math.floor(coorddd[10]);
         coorddd[9] = 8;
         coorddd[10] += 0.5;
         if(Math.floor(coorddd[10]) >= 3){
            coorddd[10] = 0;
         }
      } 
   }
var pos1= coorddd[8]*swidth;
var pos2= coorddd[9]*sheight;
//Sprite drawing
 context.drawImage(sprite, pos1, pos2, swidth, sheight, coorddd[0], coorddd[1], coorddd[2], coorddd[3]);
 /*
 context.fillStyle = "black";
 context.font = "30px Arial";
 context.fillText(coorddd[6],coorddd[0],coorddd[1]);
 */
} else{
   context.fillRect(coorddd[0],coorddd[1],coorddd[2],coorddd[3])
  }
  }
//This seems to be the redrawing of red boxes.
  function redraw(theobject){
   var coord = theobject.coor;
   context.fillRect(coord[0],coord[1],coord[2],coord[3])
   
  }
//Player to box collision check (Currently has a few bugs where the player can clip through boxes using the squeeze from the super jump)
  function collcheck(tobject){
   var coordd = tobject.coor;
  if(x + xspe + xwidth + xxspe > coordd[0] && x + xwidth < coordd[0] + 7  && y + yheight > coordd[1]+7 && y < coordd[1] + 45){
   x = coordd[0] - xwidth;
   rspe = 0;
   xspe = 0;
   xxspe = 0;
  } else {
   rspe = 6
  }
  if(x + xspe +xxspe  < coordd[0] + coordd[2] && x > coordd[0] + coordd[2] - 7 && y + yheight > coordd[1]+7 && y < coordd[1] + 45){
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
//plyer to enemy collision check.
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
//There some hp stuff against the boss going on around of here and kill events on normal enemies..
               cordi[11] -=1;
               bossmy(cordi[11],cordi[0],cordi[1],cordi[4],cordi[5]);
            xspe += Math.sign((canvas.width)/2 - x) * 10;
            yspe -= 20;
            } else { 
          cordi[11]--;
          health += 10;
          yspee -=16;
          }
         }
         cordi[5] = -yspe2;
         yspe += yspe2/3;
      }
   }   
} 
function swordcoll(enemy){
   var cord = enemy.coor;
   if (sloicce == 1){ 
    var ux = (x + 16 -Math.sin(angle* Math.PI / 180)*25) - (cord[0] + (cord[2]/2));
    var uy = (y + 16 + Math.cos(angle * Math.PI / 180)*20) - (cord[1] + (cord[3]/2));
    var distance = Math.sqrt(ux*ux+uy*uy);
    if(distance < 37 + (cord[2]/2 + cord[3]/2)) {
    if(cord[12] == 0 && cord[7] != 3){
       cord[11]--;
       cord[12] = 1;
       cord[4] -= Math.sign((cord[1]+cord[2]/2)-(x+xwidth/2))*7;
       cord[5] -= 7;
       //context.fillRect(0,0,10000,10000);
       
    } else if(cord[7] == 3 && hit == 0) {
      cord[11] -=1;
      cord[4] -= Math.sign((cord[1]+cord[2]/2)-(x+xwidth/2))*20;
      cord[5] -= 20;
      if(cord[11] > 0){
      bossmy(cord[11],cord[0],cord[1],cord[4],cord[5]);
      }
      hit = 1;
    }
    }
    } else {
      cord[12] = 0;
      hit = 0;
    }
    }
 function sword(){
 if(slicec <= 0){
      if (shoot == 1) { 
      /* 
       context.fillStyle = 'red' 
       context.save();
       context.translate(x+16,y+16);
       context.rotate(angle*Math.PI / 180);
       context.drawImage(slic,0,310*n,132,310, -25, 15,70,30);
       context.restore();
       */
       sloicce = 1
   } /*else {
   context.fillStyle = 'gray';
   }
   */
   /*
   context.save();
   context.translate(x+16,y+16);
   context.rotate(angle * Math.PI / 180);
   context.fillRect(-35,30,70,30);
   context.restore();
   context.save();
   context.translate(x + 16 -Math.sin(angle* Math.PI / 180)*25 , y + 16 + Math.cos(angle * Math.PI / 180)*20);
   context.beginPath();
   context.arc(0,0,37,0,2*Math.PI)
   context.stroke();
   context.restore();
   context.fillRect(x + 16 -Math.sin(angle* Math.PI / 180)*25 , y + 16 + Math.cos(angle * Math.PI / 180)*25,1,1)
   */
 
} else {
   slicec--; 
}
}
function sloice(){
   if(sloicce == 1){
       context.save();
       context.translate(x+16,y+16);
       context.rotate(angle*Math.PI / 180);
       context.drawImage(slic,0,158*Math.floor(n),302,158, -50, 15,100,50);
       context.restore();
       n += 0.5;
       if(n >= 6){
         sloicce = 0;
         slicec = 30;
         n = 0;
       }
   }
}
function deat(enemy){
   var cord = enemy.coor; 
   if(cord[7] == 3){
        if(cord[11] <= 0){
          var die = cord[6];
          enemies.splice(die,1);
          coins += 100;
   }
   } else if(cord[11] <= 0){
      var die = cord[6];
      enemies.splice(die,1)
      coins += 10;
   }
}
//The grappling hook function.
//May be scrapped, or reworked.
/*
function grapple(gtar){
//Its been a while since i worked with the grappling hook, but it basically uses takeo land and shoot to check if certain conditions are met for different situations.
if(takeo == 0){
dg = 0;

if(shoot == 1 && land == 0){
   gx = x +25;
   gy = y +25;
   takeo = 1;
   }

}
   if (takeo == 1 && land == 0){
   dg +=1;''
   gx -= Math.sin(angle*Math.PI / 180)*gspe;
   gy += Math.cos(angle*Math.PI / 180)*gspe;
    context.save();
      context.fillStyle = 'gray'; 
      context.translate(gx,gy);
//Also uses angles to rotate the image of the grappling hook.
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
*/
//Underneath is the insanity of trying to spawn enemies the right way.
//Basically a combination of randoms deciding where the enemy spawns.
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
   var oi = 1*hm;
   var enem =  { coor :[xe-15,ye-15,32,32,0,0,0,0,0,1,0,1*oi,0]};
   enemies.push(enem);
   }
 if(spaw == 1){
 var oi = 1*hm;
   var enem =  { coor :[xe-15,ye-15,32,32,0,0,0,0,0,1,0,1*oi,0]};
   enemies.push(enem);
 }
}
//Blue enemy spawning.
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
   var enem =  { coor :[xe-15,ye-15,32,32,0,0,0,1,0,2,0,1*hm,0]};
   enemies.push(enem);
 } 
}
//Bat enemy spawning
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
   var enem =  { coor :[xe-5,ye-5,24,24,0,0,0,2,0,3,0,1*hm*0.5,0]};
   enemies.push(enem);
 } 
}
//Bat enemy for bass battle spawning.
function batmyn(){
var corm = enemies[0].coor;
 
   var xe = Math.floor(Math.random() * canvas.width);
   var ye = Math.floor(Math.random() * canvas.height);
 if(spaw == 1){
 for(var i = 0; i < 5; i++){
   var enem =  { coor :[xe-5,ye-5,24,24,0,0,0,2,0,3,0,1*hm,0]};
   enemies.push(enem);
   }
 } 
}
//Boss spawning.
function bossmy(){
if(arguments[0] === undefined){
 var hep = 5;
} else {
var hep = arguments[0];
}
if(arguments[1] === undefined){
   var loca = 1;
} else {
   var loca = arguments[1];
}
if(arguments[2] === undefined){
   var locy = 1;
} else {
   var locy = arguments[2];
}
if(arguments[3] === undefined){
   var locs = 1;
} else {
   var locs = arguments[3];
}
if(arguments[4] === undefined){
   var locsy = 1;
} else {
   var locsy = arguments[4];
}
   var tus = Math.floor(Math.random()*2);
if (tus == 0){
 var xe = Math.floor(Math.random() * (canvas.width - x - 150));
 }
 if(tus==1){
 var xe = Math.floor(Math.random() * x + 150) + canvas.width - x - 150; 
 }
 var ye = Math.floor(Math.random() * canvas.height); 
   var ye = Math.floor(Math.random() * canvas.height);
 if(spaw == 1 && arguments[0] > 0){
   var enem =  { coor :[1*loca,1*locy,192,192,1*locs,1*locsy,0,3,0,0,0,1*hep,0]};
   enemies.push(enem);
 } else if(spaw == 1){
   var enem =  { coor :[xe-100,ye-100,192,192,0,0,0,3,0,0,0,1*hep,0]};
   enemies.push(enem);
 } 
}
//This is the key checker. Basically just checks what key is being pressed down and sends up the result upwards using variables.
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
if(toe === 'x'){
   adva = 1;
}
if(toe === 'c'){
   if(coins >= (100 - health)){
   coins -= (100 - health)*2;
   health = 100;
   } 
   
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
if(toe === 'x'){
   adva = 0;
}
});
//Due to running into alot of gameplay problems i am thinking of reworking the combat system. Upgrading it from just jumping ontop of enemies.
//I would like to add some complexity in the style of the game with the use of cool animations when using swords, and maybe some cool music aswell. (The game doesnt even have swords yet so that is now on the list of development)
//Another thing that must be changed is the organization of some of the variables. (probably 20% arent even being used.) and organization of function placements and such.
//I would also like to make alot of the code alot more compact. But that probably wont happen. And if i try it will probably require alot of effort.
//Boss requires polish and rework after the sword system comes to play.
//Currently figuring out how to add the sword along side the grappling hook is gonna be challenging (Might end up scrapping the grappling hook entirely.)
//The red placeable boxes carry far to little impact currently (This needs work)
//If i do end up getting the sword system to work i might end up reworking the wave system to also harbor a shop for buying upgrades and such.
//If the shop ends up being a thing the game would need to start feeling fresh after a few waves. (This probably means instead of using too much time creating many different types of enemies, i will instead focus on making core enemy types and writing code that generates variations of them with diffrent properties.)
//Also i am being way to optimistic and probably biting more than i can chew with all of these big plans. (But then again i thought making the game wave based and having different enemy types was too optimistic)
//I should refer to this place when i am out of ideas, or when i feel like developing new stuff.
</script>
</body>
</html>