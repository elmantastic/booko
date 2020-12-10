
var boxes = document.getElementsByClassName('popular-category');
var gradients = [];

function generate() {

    var hexValues = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e"];
    
    function populate(a) {
      for ( var i = 0; i < 6; i++ ) {
        var x = Math.round( Math.random() * 14 );
        var y = hexValues[x];
        a += y;
      }
      return a;
    }
    
    for(var j=0; j<4; j++){
        var newColor1 = populate('#');
        var newColor2 = populate('#');
        // var angle = Math.round( Math.random() * 360 );
        
        var gradient = "linear-gradient(324deg, " + newColor1 + ", " + newColor2 + ")";

        gradients.push(gradient);
    }
    
    // document.getElementsByClassName("popular-category").style.background = gradient;
    // document.getElementById("output").innerHTML = gradient;
    
    console.log(gradients);

}

generate();

for(var i = 0; i < boxes.length; i++){
    boxes[i].style.background = gradients[i];
}