const ip = document.getElementById("ip");
const btnSend = document.getElementById("send");
const ulList = document.getElementById("list");

btnSend.onclick = function () {
    let str = "https://ipapi.co/" + ip.value + "/json";

    fetch(str)
    .then(function (result) { return result.json(); })
    .then(function (data) {
    console.log(data);

    ulList.innerHTML = '';

    const fields = [
        "ip",
        "network",
        "version",
        "city",
        "region",
        "region_code",
        "country",
        "country_name",
        "country_code",
        "country_code_iso3",
        "country_capital",
        "country_tld",
        "continent_code",
        "in_eu",
        "postal",
        "latitude",
        "longitude",
        "timezone",
        "utc_offset",
        "country_calling_code",
        "currency",
        "currency_name",
        "languages",
        "country_area",
        "country_population",
        "asn",
        "org"
    ];

        fields.forEach(function (field) {
        var el = document.createElement("li");
        el.innerHTML = field + ": " + data[field];
        ulList.appendChild(el);
    });
    })
    .catch(function (error) 
    {
        console.error("Error fetching data:", error);
    });
};
