window.onload = function(){
    var lbtn = document.querySelector('#lookup');
    var rdiv = document.querySelector('#result')
    var xhr;
    
    lbtn.onclick = function(element){
        element.preventDefault();

        xhr = new XMLHttpRequest();
        var country = document.querySelector('#country').value;
        
        var url = "world.php?country=" + country;
        xhr.onreadystatechange = printInfo;
        xhr.open("GET", url);

        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // xhr.send('country=' + encodeURIComponent(country));
        xhr.send();

    }


    function printInfo(){
        if( (xhr.readyState === 4)){
            console.log("Done");
            if (xhr.status === 200){
                console.log("200 OKAY");
                var response = xhr.responseText;
                console.log(response);
                rdiv.innerHTML = response;
            }
            else {
                console.log("Else");
            }
        }
    }
}