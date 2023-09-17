const surname     = document.getElementById("surname");
const name        = document.getElementById("name");
const date        = document.getElementById("date");
const sex         = document.getElementById("sex");
const city        = document.getElementById("city");

const btnGenerate = document.getElementById("generate");

btnGenerate.addEventListener("click", function()
{
    var surnameVal = surname.value.toUpperCase();
    var nameVal = name.value.toUpperCase();
    var dateVal = date.value.toUpperCase();
    var sexVal = sex.value;
    var cityVal = city.value;

    surnameVal = separate(surnameVal);
    if(surnameVal == null){alert("Cognome non valido");return;}

    nameVal = separate(nameVal);
    if(nameVal == null){alert("Nome non valido");return;}

    var data = new Date(dateVal);
    if (isNaN(data)) {
        alert("Data non valida");
        return;
    }
    var day = data.getDate();
    var month = data.getMonth() + 1;
    var year = data.getFullYear();

    var meseIniziale = findMonth(month);
    year = year.toString().substr(-2);

    cityVal = findCity(cityVal);
    if(cityVal == null){alert("Città non valida");return;}

    if (sexVal == "woman") {
        day += 40;
    }

    var codiceControllo;
    var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    codiceControllo = letters.charAt(Math.floor(Math.random() * letters.length));
    codiceControllo.toUpperCase();


    var codicefiscale = surnameVal + nameVal + day + meseIniziale + year + cityVal + codiceControllo; 

    alert(codicefiscale);
});


function separate(str)
{
    let result = '';
    let count = 0;
    for (let i = 0; i < str.length; i++) 
    {
        if (str[i] != 'A' && str[i] != 'E' && str[i] != 'I' && str[i] != 'O' && str[i] != 'U') 
        {
            result += str[i];
            count++;
            if (count == 3)
                break;
        }
    }
    if (count < 3)
    {
        for (let i = 0; i < str.length; i++)
        {
            if (str[i] == 'A' || str[i] == 'E' || str[i] == 'I' || str[i] == 'O' || str[i] == 'U')
            {
                result += str[i];
                count++;
                if (count == 3)
                    break;
            }
        }
    }
    

    if (count == 0)
        return null;

    return result;
}

function findMonth(month)
{
    var meseIniziale = "";
    switch (month) 
    {
        case 1:
            meseIniziale = "A";
            break;
        case 2:
            meseIniziale = "B";
            break;
        case 3:
            meseIniziale = "C";
            break;
        case 4:
            meseIniziale = "D";
            break;
        case 5:
            meseIniziale = "E";
            break;
        case 6:
            meseIniziale = "H";
            break;
        case 7:
            meseIniziale = "L";
            break;
        case 8:
            meseIniziale = "M";
            break;
        case 9:
            meseIniziale = "P";
            break;
        case 10:
            meseIniziale = "R";
            break;
        case 11:
            meseIniziale = "S";
            break;
        case 12:
            meseIniziale = "T";
            break;
        default:
            return null;
            break;
    }
    return meseIniziale;
}

function findCity(city)
{
    city = city.substr(0, 1); 
    
    switch (city)
    {
        case "B":
            city += "157";
            break;
        case "M":
            city += "189";
            break;
        default:
            return null;
    }
    return city;
}