var viewhideImg = document.getElementById("viewhideImg");
var isHidden = false;


viewhideImg.addEventListener('click', function(){
    if(isHidden === false)
    {
        document.getElementById('inputPass').type = 'text';
        viewhideImg.src = "hide.png";
        isHidden = true;
    }
    else if(isHidden === true){
        document.getElementById('inputPass').type = 'password';
        viewhideImg.src = "view.png";
        isHidden = false;
    }
});