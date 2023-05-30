const loadingDiv = document.querySelector(".loading");

const sendJson  = (toSend,type) =>{
    const jsonString = JSON.stringify(toSend);
    const xhr = new XMLHttpRequest();
    if (type =="measurement"){
        console.log(toSend);
        xhr.open("POST" , "php/send/sendMeasurement.php");
    }else if(type=="plans"){
        xhr.open("POST" , "php/send/sendPlans.php");
    }else if(type=="history"){
        xhr.open("POST" , "php/send/sendHistory.php");
    }

    loadingDiv.classList.add("active__loading");
    setTimeout(()=>{
        loadingDiv.classList.remove("active__loading");
    },1000);
    console.log("dziaa");
    xhr.setRequestHeader("Content-Type" , "application/json");
    xhr.send(jsonString);
};