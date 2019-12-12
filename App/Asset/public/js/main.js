$(document).ready(() => {
    // Mise en place du Caroussel
    const images = ['App/Asset/images/slider1.jpg', 'App/Asset/images/slider2.jpg', 'App/Asset/images/slider3.jpg', 'App/Asset/images/slider4.jpg']; 
    let emplacement= $('#slidesShow');
    new SlidesShow(images, 5000, emplacement);

    const url = "https://www.prevision-meteo.ch/services/json/lat=46.259lng=5.235";
    new Ajax(url, function(reponse) {
        
        weather = JSON.parse(reponse)
        console.log(weather)
    });
});