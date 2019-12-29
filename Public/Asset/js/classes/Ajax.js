class Ajax { 
    constructor (url, callback) { // Prend en paramètres l'URL cible et la fonction callback appelée en cas de succès
        this.url=url;  
        this.callback=callback;
        this.req = new XMLHttpRequest();
        this.etatServeur()
    }
    etatServeur() {        
        this.req.open("GET", this.url);
        this.req.addEventListener("load", ()=> {
            if (this.req.status >= 200 && this.req.status < 400) { // serveur atteint + demande traité (entre 200 et 400)
                this.callback(this.req.responseText); // Appelle la fonction callback en lui passant la réponse de la requête
            }else {
                console.error(this.req.status + " " + this.req.statusText + " " + this.url);   // serveur atteint mais requête non traité 
            }
        });
        this.req.addEventListener("error", ()=> console.error("Erreur réseau avec l'URL " + this.url));
        this.req.send(null);
    }
}