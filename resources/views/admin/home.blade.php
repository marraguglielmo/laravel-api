@extends('layouts.admin')

@section('content')
    <h1>Admin Home</h1>
    <h4>Nella dashboard sono presenti {{ $count_projects }} progetti</h4>
    <h5 class="my-4">Ultimo progetto: <span
            class="fw-bold text-bg-info py-2 px-3 rounded-2">{{ $last_project->title }}</span> </h5>
    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, reprehenderit totam. Atque, neque assumenda
        architecto deserunt corporis dolores nulla nam ipsum ut beatae? Dolorum modi eligendi, cumque nobis
        voluptatum voluptates accusamus odio similique expedita repudiandae corporis quia quo, deleniti id possimus
        ullam dolorem ratione aliquid nisi repellat alias esse est. Voluptate, quasi velit facilis sint
        necessitatibus reprehenderit repudiandae, possimus distinctio cupiditate vel laborum doloremque vero aut
        eligendi animi recusandae corrupti praesentium molestiae. Reiciendis a adipisci soluta quidem porro nobis
        rem culpa perspiciatis? Ducimus voluptatum quo aliquid dolores totam! Quaerat non cumque cum earum quae
        repellat sint quam doloribus ratione obcaecati, corrupti, excepturi nostrum sequi fugit. Velit omnis nulla
        est sequi architecto, molestiae quasi repudiandae sapiente obcaecati commodi quidem nihil nostrum adipisci
        doloremque odit laudantium iure.
    </p>
@endsection
