/*function getBotResponse(input) {
    

    // Simple responses
    if (input == "hello"||"hi"||"Hello"||"Hi") {
        return "Hello there!How are you?";
    }
    else if (input == "goodbye") {
        return "Talk to you later!";
    }
    else {
        return "Try asking something else!";
    }
    
}*/
function getBotResponse(input) {
    if(input=="Fine"){
        return "Great,Have you Registered in our website";
    }
    if (input == "Yes") {
        return "Thankyou!"+
        "Who are you,(type)Student or Intern or Employee";
    } else if (input == "No") {
        return "Register,it's free";
    } else if (input == "Ok") {
        return "Thankyou";
    }
    {
        if(input=="Student"){
        return "Where are you studying?";
    }else if(input=="Intern"){
        return "Where are you working?";
    }else if(input=="Employee"){
        return "Where are you working and what is your working expereince?";
    }
}
    // Simple responses
    if (input == "Hi") {
        return "Hello there!How are you?";
    } 
    else {
        return "Try asking something else!"+
               "<br> If your doubt is not cleared,please click the call button for assist and you can enter your doubt in the given gmail form";
    }
}