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

    surnameVal = separate(surnameVal, false);
    if(surnameVal == null){alert("Cognome non valido");return;}

    nameVal = separate(nameVal, true);
    if(nameVal == null){alert("Nome non valido");return;}

    var data = new Date(dateVal);
    if (isNaN(data)) {
        alert("Data non valida");
        return;
    }
    var day = data.getDate();
    var month = data.getMonth() + 1;
    var year = data.getFullYear();

    if(day < 10)
    {
        day = "0" + day;
    }
    var meseIniziale = findMonth(month);
    year = year.toString().substr(-2);

    cityVal = findCity(cityVal);
    if(cityVal == null){alert("Città non valida");return;}

    if (sexVal == "woman") {
        day += 40;
    }

    var codicefiscale = surnameVal + nameVal + year + meseIniziale + day + cityVal;
    codicefiscale += calculateCodiceControllo(codicefiscale);


    alert(codicefiscale);
});


function separate(str, name)
{
    let result = '';
    let count = 0;
    for (let i = 0; i < str.length; i++) 
    {
        if (str[i] != 'A' && str[i] != 'E' && str[i] != 'I' && str[i] != 'O' && str[i] != 'U') 
        {
            count++;
            result += str[i];
        }
    }

    if(name)
    {
        if (count >= 4)
        {
        result = result[0] + result[2] + result[3];
        } 
    }
    if (count >= 3)
    {
        result = result[0] + result[1] + result[2];
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
    

    while (count < 3)
    {
        result += 'X';
    }

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
        case "A":
            city += "944";
            break;
        case "E":
            city += "526";
            break;
        default:
            return null;
    }
    return city;
}

function calculateCodiceControllo(input) 
{
    const evenTable = 
    {
        'A': 0, 'F': 5, 'K': 10, 'P': 15, 'U': 20,
        'B': 1, 'G': 6, 'L': 11, 'Q': 16, 'V': 21,
        'C': 2, 'H': 7, 'M': 12, 'R': 17, 'W': 22,
        'D': 3, 'I': 8, 'N': 13, 'S': 18, 'X': 23,
        'E': 4, 'J': 9, 'O': 14, 'T': 19, 'Y': 24,
        'Z': 25, '0': 0, '1': 1, '2': 2, '3': 3, '4': 4,
        '5': 5, '6': 6, '7': 7, '8': 8, '9' : 9
    };

    const oddTable = 
    {
        'A': 1, 'F': 13, 'K': 2, 'P': 3, 'U': 16,
        'B': 0, 'G': 15, 'L': 4, 'Q': 6, 'V': 10,
        'C': 5, 'H': 17, 'M': 18, 'R': 8, 'W': 22,
        'D': 7, 'I': 19, 'N': 20, 'S': 12, 'X': 25,
        'E': 9, 'J': 21, 'O': 11, 'T': 14, 'Y': 24,
        'Z': 23, '0': 1, '1': 0, '2': 5, '3': 7, '4': 9,
        '5': 13, '6': 15, '7': 17, '8': 19, '9': 21
    };

    const checkDigitTable = 
    {
        0: 'A', 1: 'B', 2: 'C', 3: 'D', 4: 'E',
        5: 'F', 6: 'G', 7: 'H', 8: 'I', 9: 'J',
        10: 'K', 11: 'L', 12: 'M', 13: 'N', 14: 'O',
        15: 'P', 16: 'Q', 17: 'R', 18: 'S', 19: 'T',
        20: 'U', 21: 'V', 22: 'W', 23: 'X', 24: 'Y',
        25: 'Z'
    }; 


    var sum = 0;
    for (let i = 1; i <= 15; i++) 
    {
        if (i % 2 === 0) 
        {
            sum += evenTable[input[i - 1]];
        }
        else 
        {
            sum += oddTable[input[i - 1]];
        }

    }
    var remainder = sum % 26;
    return checkDigitTable[remainder];
}