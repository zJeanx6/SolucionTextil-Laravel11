@extends('layouts.appIndex')

@section('title', 'Sobre Nosotros')

@section('content')

<section class="sobreNosotros" style="height: 90vh; display: flex; align-items: center;">
    <div class="container d-flex justify-content-center align-items-center" style="flex: 1;">
        <div class="row w-100">
                <!-- Proyecto -->
                <x-sNosotros :image="asset('img/SolucionesTextilesLogo.jpg')" :title="'Proyecto'">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio, nobis assumenda corporis quia atque doloremque voluptas reiciendis repellat sunt a temporibus debitis quis reprehenderit ratione.
                </x-sNosotros>
                
                <!-- Misión -->
                <x-sNosotros :image="asset('img/index/mision.jpg')" :title="'Misión'">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et iusto quam nobis dolore inventore. Quae quaerat tenetur corrupti, sunt cumque natus ratione blanditiis. Magni at ea harum. Exercitationem, praesentium aliquid.
                </x-sNosotros>
                
                <!-- Visión -->
                <x-sNosotros :image="asset('img/index/vision.jpg')" :title="'Visión'">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, quos exercitationem! Labore soluta nostrum odit illo commodi ducimus, minima quo architecto exercitationem amet, earum accusamus quidem? Molestias amet eaque reprehenderit!
                </x-sNosotros>
                
                <!-- Valores -->
                <x-sNosotros :image="asset('img/index/valores.jpg')" :title="'Valores'">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia minus natus odit voluptatibus tempora expedita nesciunt reprehenderit voluptates obcaecati dolorum sint maiores, cum saepe. Quisquam neque assumenda sapiente voluptate odio?
                </x-sNosotros>
            </div>
        </div>
    </section>

@endsection
