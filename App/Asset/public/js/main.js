$(document).ready(() => {
    // Mise en place du Caroussel
    const images = ['App/Asset/images/slider1.jpg', 'App/Asset/images/slider2.jpg', 'App/Asset/images/slider3.jpg', 'App/Asset/images/slider4.jpg']; 
    let emplacement= $('#slidesShow');
    new SlidesShow(images, 5000, emplacement);

    const url = "https://www.prevision-meteo.ch/services/json/lyon/lat=45.754lng=4.838";
    new Ajax(url, function(reponse) {
        
        weather = JSON.parse(reponse)
        $('#weather_city_date').text(weather.city_info.name + " - " + weather.current_condition.date);
        $('#weather_icon').attr('src', weather.current_condition.icon);
        $('#weather_condition').text(weather.current_condition.condition + " - " + weather.current_condition.tmp + "°C");
    });
});