const surname     = document.getElementById("surname");
const name        = document.getElementById("name");
const date        = document.getElementById("date");
const sex         = document.getElementById("sex");
const city        = document.getElementById("city");

const btnGenerate = document.getElementById("generate");

btnGenerate.addEventListener("click", function(){
    var surnameVal = surname.value.toUpperCase();
    var nameVal = name.value.toUpperCase();
    var dateVal = date.value.toUpperCase();
    var sexVal = sex.value.toUpperCase();
    var cityVal = city.value.toUpperCase();

    surnameVal = separate(surnameVal);

    nameVal = separate(nameVal);

    data = new Date(dateVal);
    var day = data.getDate();
    var month = data.getMonth() + 1;
    var year = data.getFullYear();

    var meseIniziale;

switch (month) {
    case 1:
        // Gennaio
        meseIniziale = "G";
        break;
    case 2:
        meseIniziale = "F";
        break;
    case 3:
        meseIniziale = "M";
        break;
    case 4:
        meseIniziale = "A";
        break;
    case 5:
        meseIniziale = "M";
        break;
    case 6:
        meseIniziale = "G";
        break;
    case 7:
        meseIniziale = "L";
        break;
    case 8:
        meseIniziale = "A";
        break;
    case 9:
        meseIniziale = "S";
        break;
    case 10:
        meseIniziale = "O";
        break;
    case 11:
        meseIniziale = "N";
        break;
    case 12:
        meseIniziale = "D";
        break;
    default:
        meseIniziale = "Mese non valido";
    }
    
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
    while (count < 3) 
    {
        result += "X"
        count++;
    }

    if (count > 3)
        return null;

    return result;
}
