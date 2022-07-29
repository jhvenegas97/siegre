@extends('layouts.layoutInit')
@section('title','Inicio')
@section('content')
    <!--INCIO CARRUSEL-->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="font-size: 1.8rem;">
        <div class="carousel-inner">
            <div class="d-flex carousel-item active align-items-end">
                <img src="{{asset('images/egresadose.png')}}" class="d-block w-100" alt="egresados">
                <div class="carousel-caption d-none d-md-block text-star pb-0">
                <div class="infoSlider2">    
                    <h2 class="text-center">Bienvenidos a SIEGRES</h2>
                    <h4 class="text-center">Sistema de Información Web para Egresados</h4>
                    <h5 class="text-center">Para conocer más información regístrese <a href="{{route('login')}}">aquí</a></h5>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--FIN CARRUSEL-->


    <!--INICIO TEXTO-->
    <div class="container mt-3 mb-3">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">¿Qué es SIEGRES?</span></strong></h3>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        Es un sistema de información web creado para el beneficio de todos los egresados no titulados y graduados del programa Licenciatura en Informática de la Universidad de Nariño.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">¿Qué encontrarás en SIEGRES?</span></strong></h3>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <h5>Capacitaciones</h5>
                        <p>Encontrarás notificaciones de las capacitaciones que se pueden presentar momentaniamente y que pueden ser de gran interés e innovación para los egresados del programa Licenciatura en Informática.
                        </p>

                        <h5>Ofertas laborales</h5>
                        <p>Los Egresados tendrán la posibilidad de subir su hoja de vida al sistema de información para ser considerados como posibles candidatos ante las demandas
                            laborales externas. Además, podrán publicar ofertas laborales relacionadas con el perfil laboral del Licenciado en informática.
                           
                        </p>

                        <h5>Entretenimiento</h5>
                        <p>Se puede visualizar todos los artículos de la revista runin del programa, eventos académicos entre otros aspectos de interés.
                        </p>

                        <h5>Reconocimeinto al mérito</h5>
                        <p>Periódicamente se destacará a los egresados que tengan una experiencia académica y de formación continúa, con el ánimo de motivar a los demás a que sigan formandose.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN TEXTO-->

<style>
.infoSlider2 {
    background: rgba(36, 34, 21, 0.64);
    padding: 10px 0px 10px 25px;
    border-radius: 0px 0px 0px 0px;
}

.infoSlider2 h1 {
    font-size: 40px;
}

.infoSlider2 a {
    text-decoration: none;
    color: #ffffff;
    font-size: 20px;
    background: rgba(255,255,255,0.3);
    padding: 3px;
}

.infoSlider2 a:hover {
    background: rgba(255,255,255,0.5);
}
</style>
@endsection
