function validate()
{
    var fname,lname,email,password,cpassword,phone;
    var x =document.getElementById('password').value;
    var y =document.getElementById('cpassword').value;
    fname=document.getElementById('fname').value;
    lname=document.getElementById('lname').value;
    email=document.getElementById('email').value;
    phone=document.getElementById('phone').value;
    password=document.getElementById('password').value;
    cpassword=document.getElementById('cpassword').value;
    //firstname
    if(fname=="")
    {
        document.getElementById('fname_error').innerHTML="Enter your first name";
        document.getElementById('fname_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('fname_error').style.display="none";
    }
    if(/^[a-zA-Z]+$/.test(fname) == false)
    {  
        document.getElementById('fname_error').innerHTML="Please enter a valid first name";
        document.getElementById('fname_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('fname_error').style.display="none";
    }

    //last name
    if(lname=="")
    {
        document.getElementById('lname_error').innerHTML="Enter your last name";
        document.getElementById('lname_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('lname_error').style.display="none";
    }
    if(/^[a-zA-Z]+$/.test(lname) == false)
    {  
        document.getElementById('lname_error').innerHTML="Please enter a valid last name";
        document.getElementById('lname_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('lname_error').style.display="none";
    }
    //phone check
    if(phone=="")
    {
        document.getElementById('phone_error').innerHTML="Enter your phone number";
        document.getElementById('phone_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('phone_error').style.display="none";
    }
    if(/^[6-9]\d{9}$/.test(phone)==false) 
    {
        document.getElementById('phone_error').innerHTML="Enter a valid phone number";
        document.getElementById('phone_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('phone_error').style.display="none";
    }
    //email check
    if(email=="")
    {
        document.getElementById('email_error').innerHTML="Enter an email id";
        document.getElementById('email_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('email_error').style.display="none";
    }
    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
    {
        document.getElementById('email_error').innerHTML="Enter a valid email id";
        document.getElementById('email_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('email_error').style.display="none";
    }
    //password check
    if(password=="")
    {
        document.getElementById('password_error').innerHTML="Password cannot be empty";
        document.getElementById('password_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('password_error').style.display="none";
    }

    if(password.length<8 || password.length>16)
    {
        document.getElementById('password_error').innerHTML="Password should have length between 8 and 16";
        document.getElementById('password_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('password_error').style.display="none";
    }
    if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$/.test(password)==false)
    {
        document.getElementById('password_error').innerHTML="Password must have minimum 8 and maximum 16 characters, at least one uppercase letter, one lowercase letter, one number and one special character";
        document.getElementById('password_error').style.display="block";
        return false;
    }
    else
    {
        document.getElementById('password_error').style.display="none";
    }
    if (x === y) 
     { 
         text="";
        document.getElementById('cpassword_error').innerHTML = text;
        return true;
    }
    else 
    {
        text="Password does not match";
        document.getElementById('cpassword_error').innerHTML = text;
            return false;
    }
}