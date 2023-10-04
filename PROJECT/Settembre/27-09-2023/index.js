const btnLoad = document.getElementById("Load");
const ulList = document.getElementById("list");
btnLoad.onclick = function () 
{
    fetch('https://jsonplaceholder.typicode.com/users')
        .then(function(result){return result.json();})
        .then(function(j){
            console.log(j);
            for (i = 0;  i < j.length; i++)
            {
                var el = document.createElement("li");
                el.innerHTML = j[i].email + " => " + j[i].company.name
                ulList.appendChild(el)
            }
        })  
}