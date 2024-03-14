let Idea1 = document.getElementById('idea1');
let Idea2 = document.getElementById('idea2');
let Idea3 = document.getElementById('idea3');
var i = 0;
const len = 2;
function idea1(){
 i++;
 if( i++ == len) {
    i = 0;
 }
}
function CurrentSlide(){
    document.getElementsByClassName('main-info-item-box')[i].style.display="block";
}

/*function idea2(){
    document.getElementById('idea2').style.display="none";
   }

   function idea3(){
    document.getElementById('idea3').style.display="none";
   }
*/
