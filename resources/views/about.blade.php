@extends('layouts.layoutInit')
@section('title','Acerca de')
@section('content')
    <div class="container text-center p-4">
      <div class="container-fluid d-flex justify-content-center minh-100 align-items-center">
        <div class="row d-flex align-items-center">
          <div class="col-sm d-flex justify-content-center align-items-center">
            <div class="card card-mod" style="width: 18rem;">
              <div class="card-body">
                <h4><span class="badge bg-secondary btn-new card-title">Capacitaciones</span></h1>
                <p class="card-text text-justify">Encontrarás notificaciones de las capacitaciones que se pueden presentar momentaniamente y que pueden ser de gran interés e innovación para los egresados del programa Licenciatura en Informática.</p>
                <img src=images/cp.png width="80" height="80" class="img-responsive" alt="">
              </div>
            </div>
          </div>

          <div class="col-sm d-flex justify-content-center align-items-center">
            <div class="card card-mod" style="width: 18rem;">
              <div class="card-body">
                <h4><span class="badge bg-secondary btn-new card-title">Ofertas laborales</span></h1>
                <p class="card-text text-justify">Se subiran al sistema de información web todas las vacantes que requieran personal con el perfil ocupacional de un licenciado en informática, de igual forma, podran visualizar los perfiles publicos para realizar un contacto con los egresados.</p>
                <img src=images/ol.png width="80" height="80" class="img-responsive" alt="">
              </div>
            </div>
          </div>

          <div class="col-sm d-flex justify-content-center align-items-center">
            <div class="card card-mod" style="width: 18rem;">
              <div class="card-body">
                <h4><span class="badge bg-secondary btn-new card-title">Entretenimiento</span></h1>
                <p class="card-text text-justify">Se puede visualisar todos los eventos academicos y sociales que se presenten en el programa de Licenciatura en Informática de la Universidad de Nariño acreditada en alta calidad.</p>
                <img src=images/rm.png width="80" height="80" class="img-responsive" alt="">
              </div>
            </div>
          </div>

          <div class="col-sm d-flex justify-content-center align-items-center">
            <div class="card card-mod" style="width: 18rem;">
              <div class="card-body">
                <h4><span class="badge bg-secondary btn-new card-title">Reconocimiento al mérito</span></h1>
                <p class="card-text text-justify">Se actualizará y reconocerá a los egresados que se distingan por sus logros academicos dejando en alto el nombre del programa Licenciatura en Informática y de la Universida de Nariño.</p>
                <img src=images/rm.png width="80" height="80" class="img-responsive" alt="">
              </div>
            </div>
          </div>

          

        

        
        </div>
        
      </div>

    </div>
@endsection
