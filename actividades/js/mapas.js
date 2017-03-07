/*global $*/
/*global google*/
/*global navigator*/
function cargarVerMapa(){
    var longitudPrincipio =parseFloat($(this).data('longitud'));
    var latitudPrincipio =parseFloat($(this).data('latitud'));
    
    function añadirMarcador(mapa, posicion){
        setTimeout(function(){
            var opcionesMarker = {
            position: posicion,
            map: mapa
        };
        var marcador = new google.maps.Marker(opcionesMarker);
        }, 4000);
        
    }
    
    function crearMapa(posicion){
        var coordenadas = {lat: posicion.latitude, lng: posicion.longitude};
        var mapOptions = {
            zoom: 15,
            center: coordenadas,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var contenedor = document.getElementById('mapaContainer');
        var mapa = new google.maps.Map(contenedor, mapOptions);
        var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(mapa);
        añadirMarcador(mapa, coordenadas);
    }
    
    function correcto(){
        var tuPosicion = {latitude: longitudPrincipio, longitude: latitudPrincipio};
        crearMapa(tuPosicion);
    }

    function error(error){
        $('.map').text(error.code + ' - ' + error.message);
    }

    var opciones = {
        enableHighAccuracy: false,
        timeout: 3000,
        maximumAge: 4000
    };

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(correcto, error, opciones);
    }else{
        alert ('Geolocalización no disponible.');
    }
}

function cargarEditarMapa(){
    var marcador = null;
    var longitudPrincipio =parseFloat($(this).data('longitud'));
    var latitudPrincipio =parseFloat($(this).data('latitud'));
    
    function añadirMarcador(mapa, posicion){
        var opcionesMarker = {
            position: posicion,
            map: mapa
        };
        if(marcador != null){
            marcador.setPosition(null);
        }
        
        marcador = new google.maps.Marker(opcionesMarker);
        mapa.panTo(posicion);
        $('#edLatitudAct').val(posicion.lat);
        $('#edLongitudAct').val(posicion.lng);
    }
    
    function crearMapa(posicion){
        var coordenadas = {lat: posicion.latitude, lng: posicion.longitude};
        var mapOptions = {
            zoom: 15,
            center: coordenadas,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var contenedor = document.getElementById('mapaModal');
        var mapa = new google.maps.Map(contenedor, mapOptions);
        if(marcador == null){
            añadirMarcador(mapa, coordenadas);
        }
        var trafficLayer = new google.maps.TrafficLayer();
        google.maps.event.addListener(mapa, "click", function (evento) {
            añadirMarcador(mapa, evento.latLng);
        });
    }
    
    function correcto(){
        var tuPosicion = {latitude: longitudPrincipio, longitude: latitudPrincipio};
        crearMapa(tuPosicion);
    }

    function error(error){
        $('#mapaModal').text(error.code + ' - ' + error.message);
    }

    var opciones = {
        enableHighAccuracy: true,
        timeout: 3000,
        maximumAge: 5000
    };

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(correcto, error, opciones);
    }else{
        alert ('Geolocalización no disponible.');
    }
}

function cargarAniadirMapa(){
    var marcador = null;
    
    function añadirMarcador(mapa, posicion){
        var opcionesMarker = {
            position: posicion,
            map: mapa
        };
        if(marcador != null){
            marcador.setPosition(null);
        }
        
        marcador = new google.maps.Marker(opcionesMarker);
        mapa.panTo(posicion);
        $('#addLatitudAct').val(posicion.lat);
        $('#addLongitudAct').val(posicion.lng);
    }
    
    function crearMapa(posicion){
        var coordenadas = {lat: posicion.latitude, lng: posicion.longitude};
        var mapOptions = {
            zoom: 15,
            center: coordenadas,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var contenedor = document.getElementById('mapaModalInsert');
        var mapa = new google.maps.Map(contenedor, mapOptions);
        añadirMarcador(mapa, coordenadas);
        var trafficLayer = new google.maps.TrafficLayer();
        google.maps.event.addListener(mapa, "click", function (evento) {
            añadirMarcador(mapa, evento.latLng);
        });
    }
    
    function correcto(){
        var longitudPrincipio = 37.161633;
        var latitudPrincipio = -3.591273;
        var tuPosicion = {latitude: longitudPrincipio, longitude: latitudPrincipio};
        crearMapa(tuPosicion);
    }

    function error(error){
        $('#mapaModalInsert').text(error.code + ' - ' + error.message);
    }

    var opciones = {
        enableHighAccuracy: true,
        timeout: 3000,
        maximumAge: 5000
    };

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(correcto, error, opciones);
    }else{
        alert ('Geolocalización no disponible.');
    }
}