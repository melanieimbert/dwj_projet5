class SlidesShow {
    constructor(images, delai, emplacement) {
        this.images = images;
        this.delai = delai;
        this.position = 0;
        this.emplacement=emplacement;
        this.initSlider();
    }
    switch(next = true) { // next : diaporama dans le sens normal du tableau
        if (next) { // si on va dans le sens normal  
            if (this.position < this.images.length-1) {
                this.position++;
            } else {
                this.position = 0;
            }
        } else { // on va dans le sens inverse du tableau
            if (this.position > 0) { 
                this.position--;
            } else {
                this.position = this.images.length-1;
            }
        }
        this.setImage();
    }
    setImage() {
        this.emplacement.attr('src', this.images[this.position]);
    }
    initSlider() {
        this.setImage();
        let myVar = setInterval(()=> {
            this.switch(true) // Image suivante s'affiche toutes les 5s
        }, this.delai); 
        $('#fleche_droite').click(() => this.switch(true)); // Image suivante au clic fleche droite
        $('#fleche_gauche').click(() => this.switch(false)); // Image précédente au clic fleche gauche
        // Image suivante-précédente selon fleche sur clavier
        document.addEventListener("keydown", e => {
            if (e.keyCode == 37) {
                this.switch();
            } else if (e.keyCode == 39) {
                this.switch(false);
            } 
        });
        // Stoper le diaporama au clic sur pause
        $('#bouton_pause').click(e => clearInterval(myVar));
        // remise en marche du diaporama au clic sur play
        $('#bouton_play').click(e => {
            setInterval(() => {
                this.switch(false);
            }, this.delai)
        });
    }
}