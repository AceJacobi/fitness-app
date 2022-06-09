
function loadDoc() {
    
    let objectT = document.getElementById('username-area');
    
    let printS = document.getElementById('uname-check');

    let params = 'users=' + String(objectT.value);    
    
  var xhttp = new ajaxRequest();
    
  xhttp.onreadystatechange = function() {
      
    if (this.readyState == 4 && this.status == 200) {
        
     printS.innerHTML = this.responseText;
    
    }
  };
    
  xhttp.open("POST", "check.php", true);
    
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
  xhttp.send(params);
}




function ajaxRequest() {

    try {
        
        var request = new XMLHttpRequest()
        
    } catch (e1) {
        
        try {
            
            request = new ActiveXObject("Msxml2.XMLHTTP")
            
        } catch (e2) {
            
            try {
                
                request = new ActiveXObject("Microsoft.XMLHTTP")
                
            } catch (e3) {
                
                request = false;
                
            }
        }
    }

    return request
}



function verify(){
    
    let fName = document.getElementById('fname').value;
    
    let uName = document.getElementById('username-area').value;
    
    let emailF = document.getElementById('efield').value;
    
    let passF = document.getElementById('pfield').value;
    
    
   if(/[^a-zA-Z\s]/.test(fName) === true){
       
       alert('Error in full name. Only a-z characters allowed!');
       
       return false;       
   }
    
    if(/[^a-zA-Z0-9_-]/.test(uName) === true){
       
        alert('Error in username. Only alphanumeric, underscore, and dash characters allowed!');
       
        return false;
    }
    
    if(/[^a-zA-Z0-9.@_-]/.test(emailF) === true){
        
        alert('Error in email!');
       
        return false;
    }
    
    if(/[^a-zA-Z0-9.@_-]/.test(passF) === true){
        
        alert('Error in password field!');
       
        return false;
    }
        
    return true;
    
}


function validNumbers(){
    
    let w = document.getElementById('weightF').value;
    
    let a = document.getElementById('ageF').value;
    
    let h = document.getElementById('heightF').value;
    
    let m = document.getElementById('maleB');
    
    let f = document.getElementById('femaleB');
    
    if(m.checked){
        console.log('Male was selected!');
    }
    
    if(f.checked){
        console.log('Female was selected!');
    }    
    
    if(/[^\d]/.test(w) === true){
        
        alert('Invalid character in weight field.');
        
        return false;
    }
    
    if(/[^\d]/.test(a) === true){
        
        alert('Invalid character in age field.');
        
        return false;
    }
    
    if(/[^0-9.]/.test(h) === true){
        
        alert('Invalid character in height field.');
        
        return false;
    }
    
    
    return true;
}



function validNumbers2(){
    
    let c = document.getElementById('calor').value;
    
    let p = document.getElementById('prot').value;
    
    let f = document.getElementById('fa').value;
    
    let s = document.getElementById('su').value;
    
    let cho = document.getElementById('cho').value;    
        
    
    if(/[^\d]/.test(c) === true){
        
        alert('Invalid character in weight field.');
        
        return false;
    }
    
    if(/[^\d]/.test(p) === true){
        
        alert('Invalid character in age field.');
        
        return false;
    }
    
    if(/[^\d]/.test(f) === true){
        
        alert('Invalid character in height field.');
        
        return false;
    }
    
    if(/[^\d]/.test(s) === true){
        
        alert('Invalid character in height field.');
        
        return false;
    }
    
    if(/[^\d]/.test(cho) === true){
        
        alert('Invalid character in height field.');
        
        return false;
    }
        
    return true;
}



function openForm(){
    
    let fDiv = document.getElementById('reset-form-div');
    
    if(fDiv.style.display === 'none'){
        
        fDiv.style.display = 'flex';
        
        let div2 = document.getElementById('new-form-hidden');
        
        div2.style.display = 'none';        
    }
    else {
        
        fDiv.style.display = 'none';
        
    }
}



function openAddForm() {    
    
    let tD = document.getElementById('new-form-hidden');
    
    if(tD.style.display === 'none'){
    
    
    tD.style.display = 'block';
    
    let div1 = document.getElementById('reset-form-div');
    
    div1.style.display = 'none';
        
    }
    else {
        
        tD.style.display = 'none';
        
    }
    
    
}


function closeThisDiv(divname){
    
    let a = divname;
    
    let selector = document.getElementById(a);
    
    selector.style.display = 'none';
        
}



function closeThisDiv2(divname){
    
    let a = divname;
    
    let selector = document.getElementById(a);
    
    selector.style.display = 'none';
    
    let specific = document.getElementById('add-formB');
    
    specific.style.display = 'block';   
    
}


function openExtrasDiv() {
    
    let div1 = document.getElementById('nav-link-id');
    
    if(div1.style.display != 'flex'){
    
        div1.style.display = 'flex';  

        let div2 = document.getElementById('reset-form-div');

        if(div2.style.display != 'block'){  
            
            div2.style.display = 'block';
            
        }
        
    }else {
        
        let d1 = document.getElementById('nav-link-id');
        
        let d2 = document.getElementById('reset-form-div');
        
        let d3 = document.getElementById('new-form-hidden');        
        
        d1.style.display = 'none';
        
        d2.style.display = 'none';
        
        d3.style.display = 'none';       
        
    }
    
}



function changePasswordForm(){
    
    window.location = './simchange.php?grab=y';   
    
}



function logout(){
    
    window.location = './exits.php';
    
}


function openClose(targ){
    
    let d = document.getElementById(targ);
    
    if(d.style.display === 'none'){
        
        d.style.display = 'flex';
        
    }
    else {
        
        d.style.display = 'none';
       
    }
    
}
