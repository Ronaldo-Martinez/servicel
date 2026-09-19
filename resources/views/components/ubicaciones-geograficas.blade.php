<!-- Separador Distintivo y Moderno: Nuestras Ubicaciones -->
<div class="separator-ubicaciones-bar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center gap-3">
            <div class="separator-icon-badge">
                <x-icon name="location_on" />
            </div>
            <h2 class="separator-heading-text">Nuestras Ubicaciones</h2>
        </div>
    </div>
</div>

<!-- Contenedor de Mapas y Ubicaciones -->
<div class="container my-5">
    <div class="row g-4 justify-content-center">
        <!-- Ubicación El Salvador -->
        <div class="col-12 col-lg-6">
            <div class="ubicacion-card-v2">
                <!-- Encabezado de la Tarjeta -->
                <div class="card-v2-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flag-avatar-wrapper">
                            <img src="{{ asset('img/sv.webp') }}" alt="Bandera de El Salvador" class="flag-avatar-img">
                        </div>
                        <div>
                            <h3 class="country-name-v2">El Salvador</h3>
                            <div class="country-city-tag">
                                <x-icon name="pin_drop" class="text-warning" />
                                <span>Santa Tecla, La Libertad</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="tel:+50322882451" class="btn-quick-call" title="Llamar a sede El Salvador">
                        <x-icon name="call" />
                        <span class="d-none d-sm-inline">+503 2288 - 2451</span>
                    </a>
                </div>

                <!-- Ventana del Mapa -->
                <div class="card-v2-map">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d969.2171858308552!2d-89.28018473048105!3d13.665744202309032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDM5JzU2LjciTiA4OcKwMTYnNDYuNCJX!5e0!3m2!1ses!2ssv!4v1691469682252!5m2!1ses!2ssv" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Mapa El Salvador">
                    </iframe>
                </div>

                <!-- Pie de Tarjeta con Datos y Acción -->
                <div class="card-v2-footer">
                    <div class="address-snippet">
                        <span class="address-label">Dirección</span>
                        <span class="address-text">Santa Tecla, La Libertad, El Salvador</span>
                    </div>
                    <a href="https://maps.google.com/?q=13.665744,-89.280185" target="_blank" rel="noopener noreferrer" class="btn-open-maps" title="Abrir en Google Maps">
                        <span>Ver en Google Maps</span>
                        <x-icon name="arrow_forward" />
                    </a>
                </div>
            </div>
        </div>

        <!-- Ubicación Guatemala -->
        <div class="col-12 col-lg-6">
            <div class="ubicacion-card-v2">
                <!-- Encabezado de la Tarjeta -->
                <div class="card-v2-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flag-avatar-wrapper">
                            <img src="{{ asset('img/gt.webp') }}" alt="Bandera de Guatemala" class="flag-avatar-img">
                        </div>
                        <div>
                            <h3 class="country-name-v2">Guatemala</h3>
                            <div class="country-city-tag">
                                <x-icon name="pin_drop" class="text-warning" />
                                <span>Escuintla, Guatemala</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="tel:+50254674528" class="btn-quick-call" title="Llamar a sede Guatemala">
                        <x-icon name="call" />
                        <span class="d-none d-sm-inline">+502 5467 - 4528</span>
                    </a>
                </div>

                <!-- Ventana del Mapa -->
                <div class="card-v2-map">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1933.7350366547232!2d-90.73635650632048!3d14.225778619049937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8588fcdd5acf3b99%3A0x42843213332f485b!2sParque%20Industrial%20Tecnopark!5e0!3m2!1ses!2ssv!4v1691471069036!5m2!1ses!2ssv" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Mapa Guatemala">
                    </iframe>
                </div>

                <!-- Pie de Tarjeta con Datos y Acción -->
                <div class="card-v2-footer">
                    <div class="address-snippet">
                        <span class="address-label">Dirección</span>
                        <span class="address-text">Parque Industrial Tecnopark, Escuintla</span>
                    </div>
                    <a href="https://maps.google.com/?q=Parque+Industrial+Tecnopark+Escuintla+Guatemala" target="_blank" rel="noopener noreferrer" class="btn-open-maps" title="Abrir en Google Maps">
                        <span>Ver en Google Maps</span>
                        <x-icon name="arrow_forward" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
