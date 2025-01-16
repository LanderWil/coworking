const apiKey = "fe1f492690074377b5c93110251601";
const city = "Gent";

// API URL's
const currentWeatherUrl = `http://api.weatherapi.com/v1/current.json?key=${apiKey}&q=${city}&aqi=no`;
const forecastUrl = `http://api.weatherapi.com/v1/forecast.json?key=${apiKey}&q=${city}&days=1&aqi=no&alerts=no`;

// Haal huidige weerdata op
fetch(currentWeatherUrl)
    .then(response => response.json())
    .then(data => {
        const location = data.location.name;
        const country = data.location.country;
        const temp = data.current.temp_c;
        const condition = data.current.condition.text;
        const icon = `https:${data.current.condition.icon}`;
        const wind = data.current.wind_kph;

        // Toon huidige weergegevens
        const currentWeatherDiv = document.getElementById('current-weather');
        currentWeatherDiv.innerHTML = `
        <h2>${location}, ${country}</h2>
        <p>Temperatuur: ${temp}°C</p>
        <p>Weer: ${condition} <img src="${icon}" alt="${condition}" /></p>
        <p>Wind: ${wind} km/u</p>
      `;
    })
    .catch(error => {
        console.error("Fout bij ophalen van huidige weergegevens:", error);
        document.getElementById('current-weather').innerHTML = "<p>Kon geen gegevens ophalen.</p>";
    });

// Haal weersvoorspelling op
fetch(forecastUrl)
    .then(response => response.json())
    .then(data => {
        const forecast = data.forecast.forecastday[0].day;
        const maxTemp = forecast.maxtemp_c;
        const minTemp = forecast.mintemp_c;
        const avgTemp = forecast.avgtemp_c;
        const condition = forecast.condition.text;
        const icon = `https:${forecast.condition.icon}`;

        // Toon weersvoorspelling
        const forecastWeatherDiv = document.getElementById('forecast-weather');
        forecastWeatherDiv.innerHTML = `
        <p>Maximale temperatuur: ${maxTemp}°C</p>
        <p>Minimale temperatuur: ${minTemp}°C</p>
        <p>Gemiddelde temperatuur: ${avgTemp}°C</p>
        <p>Weer: ${condition} <img src="${icon}" alt="${condition}" /></p>
      `;
    })
    .catch(error => {
        console.error("Fout bij ophalen van weersvoorspelling:", error);
        document.getElementById('forecast-weather').innerHTML = "<p>Kon geen gegevens ophalen.</p>";
    });