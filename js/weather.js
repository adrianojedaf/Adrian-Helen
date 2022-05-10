function showWeather() {
    let xhr = new XMLHttpRequest();
    
    xhr.open('GET', 'https://api.openweathermap.org/data/2.5/weather?lat=49.006889&lon=8.403653&appid=3d0b3437db60fa5f845f94406dd41b88&units=metric');
    
    xhr.onload = function() {
      if(xhr.status == 200) {
        console.log('success');
  
        let weather = JSON.parse(this.response);
        console.log(weather);
        let weatherCard = document.createElement('p');
        weatherCard.innerHTML = weather.main.temp + " °C";
        
        let feed = document.getElementById('feed');
        feed.appendChild(weatherCard);
  
        let note = document.getElementById('note');
  
        if(weather.main.temp <= 3) {
          note.innerHTML = "Seien Sie vorsichtig! Fahren Sie Scooter mit Bedacht.";
        } else if (weather.main.temp < 10) {
          note.innerHTML = "Halte dich warm, bevor du mit dem Scooter fährst!";
        } else {
          note.innerHTML = "Das Wetter ist großartig! Viel Spaß beim Fahren mit dem Scooter";
        }
      }
    }
    
    xhr.send()
    
  }
  
  showWeather();
  