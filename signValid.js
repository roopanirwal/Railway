function validation() 
{
    
   var x = document.signform.elements[1].value;
   var y = document.signform.elements[2].value;
    if(x!=y){
        alert("Please correct your password");
       return false;   
    }
    var z = document.signform.elements[10].value.length;
    if(z>10 || z<10){
        alert("Please enter a valid mobile no.");
        return false;
    }
    
    
    
}
