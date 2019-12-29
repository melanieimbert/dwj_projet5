$(document).ready(() => {
    // API prevision-meteo
    const url = "https://www.prevision-meteo.ch/services/json/lyon/lat=45.754lng=4.838";
    new Ajax(url, function(reponse) {
        weather = JSON.parse(reponse)
            $('#weather_city_date').text(weather.city_info.name + " - " + weather.current_condition.date);
            $('#weather_icon').attr('src', weather.current_condition.icon);
            $('#weather_condition').text(weather.current_condition.condition + " - " + weather.current_condition.tmp + "°C");
    });
    
    // Mise en place du Caroussel
    const images = ['Asset/images/slider1.jpg', 'Asset/images/slider2.jpg', 'Asset/images/slider3.jpg', 'Asset/images/slider4.jpg']; 
    let emplacement= $('#slidesShow');
    new SlidesShow(images, 8000, emplacement);

    // mise en page dynamique tableau 
    $('#folders_state').DataTable({
        "language": {
            "lengthMenu": "Dossier _MENU_ par page",
            "zeroRecords": "Aucune information à afficher.",
            "info": "Voir page _PAGE_ of _PAGES_",
            "infoEmpty": "Aucune information à afficher.",
            "infoFiltered": "(filtrer from _MAX_ total records)", 
            "search":         "Recherche:",
            "paginate": {
                "first":      "Première",
                "last":       "Dernière",
                "next":       "Suivante",
                "previous":   "Précédente"
            },
        }
    });
   
});